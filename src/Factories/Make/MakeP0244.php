<?php

namespace Focus599Dev\GKO\Factories\Make;

use Focus599Dev\GKO\Factories\Make\traits\UteisMake;
use stdClass;

class MakeP0244 extends Make{
    use UteisMake;

    private $filtros = null;

    const TPSERVICO = 'impdados';

    const CDINTEGRACAO = 'INTDOCFISC';

    const QTDLIMITREGINICIAIS = 10;

    public function __construct()
    {
        
        parent::__construct(self::TPSERVICO, self::CDINTEGRACAO);
    }

    public function fieldCampos(stdClass $std){

        $possible = ['IDFATURA'];
        
        $std = $this->equilizeParameters($std, $possible);

        $this->filtros = $this->dom->createElement('Filtros');

        $filtro = $this->dom->createElement('Filtro');

        $filtro->setAttribute('Campo', 'IDFATURA');

        $filtro->setAttribute('Valor', $std->IDFATURA);

        $this->dom->appChild($this->filtros, $filtro);
        
    }

    
    public function monta(){

        $this->makeStructureDefault($this->filtros);

        $impDados = $this->GKO->getElementsByTagName('ImpDados');
        
        if ($impDados->length){
            $impDados->item(0)->setAttribute('QtdLimiteRegIniciais', 10);
        }

        $this->dom->appendChild($this->GKO);

        $this->xml = $this->dom->saveXML();
        
        return true;

    }

}