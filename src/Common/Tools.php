<?php 

namespace Focus599Dev\GKO\Common;

use Focus599Dev\GKO\Exception\DocumentsException;
use Focus599Dev\GKO\Factories\Make\MakeLogin;
use Focus599Dev\GKO\Http\HttpCurl;

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
            $xml = preg_replace('/(idsessao="")/', 'idsessao="'. $this->idSessao .'"', $xml);
        } else {
            try {
                
                $xml->Servico['idsessao'] = $this->idSessao;

            } catch (\Exception $e) {
                
            }
        }

        return $xml;
    }

}