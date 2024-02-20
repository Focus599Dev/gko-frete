<?php 

namespace Focus599Dev\GKO\Common;

use DOMDocument;
use Focus599Dev\GKO\Http\HttpCurl;
use Focus599Dev\GKO\Factories\Make\MakeLogin;
use Focus599Dev\GKO\Factories\Make\MakeLogout;
use Focus599Dev\GKO\Exception\DocumentsException;

class Tools {

    public $lastResponse = null;

    public $lastRequest = null;

    protected $url;
    
    protected $idSessao;

    private $dataLogin;
    
    private $pathwsfiles;

    private $urlService;

    private $http = null;

    public function __construct($dataLogin){
        
        $dataDefault = array(
            'Database' => '',
            'Usuario'  => '',
            'Senha' 	=> '',
            'AplicacaoCliente' => ''
        );

        if (!is_array($dataLogin))
            throw DocumentsException::wrongDocument(3, '');

        $data = array_merge($dataDefault, $dataLogin);

        $this->dataLogin = $data;

        $this->pathwsfiles = realpath(
            __DIR__ . '/../../storage'
        ).'/';
    }

    public function execLogin(){

        if ( $this->idSessao )
            return true;
        
        $service = 'login';

        $make = new MakeLogin();

        $make->fieldCampos((object) $this->dataLogin);

        $make->monta();

        $xml = $make->getXML();

        $this->lastResponse = $this->send($service, $xml);

        $resp = simplexml_load_string($this->lastResponse);

        if (!(String)$resp->Servico->attributes()['idsessao']){

            throw DocumentsException::wrongDocument(2, '');

        }

        $this->idSessao = (String) $resp->Servico->attributes()['idsessao'];

    }

    public function send($servico , $xml){

        $this->servico($servico);

        if (!$this->urlService)
            throw DocumentsException::wrongDocument(1, $servico);
            
        if (!$this->http)
            $this->createHttp();

        return $this->http->sendRequest($this->urlService, $xml);
    }

    private function createHttp(){
        $this->http = new HttpCurl();
    }

    /**
     * Recover path to xml data base with list of soap services
     * @return string
     */
    protected function getXmlUrlPath(){
        $file = $this->pathwsfiles
            . "wsgko.xml";

        return file_get_contents($file);
    }

    protected function servico(
        $service
    ) {

        $webs = new Webservices($this->getXmlUrlPath());
       
        $url = $webs->get($service);

        if ($url)
            $this->urlService = $url;

    }

    protected function setSessaoXML($xml){

        if (is_string($xml)){
            $xml = preg_replace('/idsessao=""/', 'idsessao="'. $this->idSessao .'"', $xml);
            
            $xml = preg_replace('/idsessao="([0-9]{1,})"/', 'idsessao="'. $this->idSessao .'"', $xml);

        } else {
            try {
                
                $xml->Servico['idsessao'] = $this->idSessao;

            } catch (\Exception $e) {
                
            }
        }

        return $xml;
    }

    public function defaultRequest($service, $xml, $retry = 0)
    {

        $excludeService = array('login', 'logout');

        if ( !$this->idSessao ){

            try{

                $this->execLogin();

            } catch(DocumentsException $e){


            }

        }

        $xml = $this->setSessaoXML($xml);
        
        $this->lastRequest = $xml;

        $this->lastResponse = $this->send($service, $xml);

        if (!in_array($service, $excludeService) && $this->lastResponse){

            // fluxo para validar se idSessao é valido
            if ($this->checkResponseHasError('7791', $this->lastResponse)){

                $this->idSessao = null;

                if ($retry < 4)
                    return $this->defaultRequest($service, $xml, $retry+1);
            }
            
        }

        return $this->lastResponse;

    }

    public function checkResponseHasError($erro, $res){
        
        try{
            $dom = new DOMDocument();
        
            $dom->loadXML($res);

            $Mensagens = $dom->getElementsByTagName('Mensagens');
                        
            if ($Mensagens->length){

                foreach($Mensagens as $mensagem){
                    
                    $cdMessagem = $mensagem->getElementsByTagName('cdMensagem');

                    if ($cdMessagem->length){
                        if ($cdMessagem->item(0)->nodeValue == $erro){

                            return true;

                        }
                    }
                }
            }
        } catch(\Exception $e){


        }

        return false;
    }

    public function logout(){

        if ( $this->idSessao ){

            $service = 'login';

            $make = new MakeLogout($this->idSessao);

            $make->fieldCampos();

            $make->monta();

            $xml = $make->getXML();

            $this->lastResponse = $this->send($service, $xml);

            $resp = simplexml_load_string($this->lastResponse);

            $this->idSessao = null;

        }
    }

    public function setIdSessao($idSessao){
        $this->idSessao = $idSessao;
    }

    public function getIdSessao(){
        return $this->idSessao;
    }
}