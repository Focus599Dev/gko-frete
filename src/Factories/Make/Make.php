<?php

namespace Focus599Dev\GKO\Factories\Make;

use stdClass;
use Focus599Dev\GKO\Common\DOMImproved as Dom;

abstract class Make{

    public $tpServico = null;

    public $CdIntegraca = null;
    
    public $idsessao = null;

    public $dom = null;

    public $GKO = null;

    protected $xml = null;

    protected $argsDadosTabela = null;

    public function __construct($tpServico, $CdIntegraca , $idsessao = null, $argsDadosTabela = array())
    {
        
        $this->dom = new Dom('1.0', 'UTF-8');
        
        $this->dom->preserveWhiteSpace = false;
        
        $this->dom->formatOutput = false;

        $this->tpServico = $tpServico;

        $this->CdIntegraca = $CdIntegraca;
        
        $this->idsessao = $idsessao;

        $this->argsDadosTabela = $argsDadosTabela;

    }

    protected function makeStructureDefault($campos, $relacionamentosData = array()){

        $this->GKO = $this->dom->createElement('GKO');

        $servico = $this->dom->createElement('Servico');

        $Relacionamentos = $this->dom->createElement('Relacionamentos');

        $DadosTabela = $this->dom->createElement('DadosTabela');

        if ($this->argsDadosTabela){
            foreach($this->argsDadosTabela as $key => $argValue){
                $DadosTabela->setAttribute($key, $argValue);
            }
        }

        $servico->setAttribute('tpServico', $this->tpServico);

        $servico->setAttribute('idsessao', $this->idsessao);

        $impDados = $this->dom->createElement('ImpDados');

        $impDados->setAttribute('CdIntegracao', $this->CdIntegraca);

        $Linha = $this->dom->createElement('Linha');

        $this->dom->appChild($Linha, $campos);

        if ($relacionamentosData){

            foreach($relacionamentosData as $relat){
                
                $this->dom->appChild($Relacionamentos, $relat);

            }

            $this->dom->appChild($Linha, $Relacionamentos);

        }

        $this->dom->appChild($DadosTabela, $Linha);

        $this->dom->appChild($impDados, $DadosTabela);

        $this->dom->appChild($servico, $impDados);

        $this->dom->appChild($this->GKO, $servico);

    }

    protected function makeStructureLogin($login){

        $this->GKO = $this->dom->createElement('GKO');

        $servico = $this->dom->createElement('Servico');

        $servico->setAttribute( 'tpServico', $this->tpServico);

        $this->dom->appChild($servico, $login);

        $this->dom->appChild($this->GKO, $servico);

    }

     /**
     * Returns xml string and assembly it is necessary
     * @return string
     */
    public function getXML()
    {
        return $this->xml;
    }

    abstract function monta();
}