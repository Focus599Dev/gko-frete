<?php

namespace Focus599Dev\GKO\Factories\Make;

use Focus599Dev\GKO\Factories\Make\traits\UteisMake;
use stdClass;

class MakeIntCtbProv1 extends Make{
    use UteisMake;

    private $filtros = null;

    const TPSERVICO = 'impdados';

    const CDINTEGRACAO = 'INTCTBLPROV';

    public function __construct()
    {
        
        parent::__construct(self::TPSERVICO, self::CDINTEGRACAO);
    }

    public function fieldCampos(stdClass $std){
  
        $possible = [
            'PARRESPONSAVELFRETE_NOCGCCPF',
            'QTDDIASGERDOCCONTABIL'
        ];
        
        $std = $this->equilizeParameters($std, $possible);

        $this->filtros = $this->dom->createElement('Filtros');

        if ($std->PARRESPONSAVELFRETE_NOCGCCPF){
            
            $filtro = $this->dom->createElement('Filtro');

            $filtro->setAttribute('Campo', 'PARRESPONSAVELFRETE_NOCGCCPF');

            $filtro->setAttribute('Valor', $std->PARRESPONSAVELFRETE_NOCGCCPF);

            $this->dom->appChild($this->filtros, $filtro);

        }

        if ($std->QTDDIASGERDOCCONTABIL){

            $filtro = $this->dom->createElement('Filtro');

            $filtro->setAttribute('Campo', 'QTDDIASGERDOCCONTABIL');

            $filtro->setAttribute('Valor', $std->QTDDIASGERDOCCONTABIL);

            $this->dom->appChild($this->filtros, $filtro);

        }

        
    }

    
    public function monta(){

        $this->makeStructureDefault($this->filtros);

        $this->dom->appendChild($this->GKO);

        $this->xml = $this->dom->saveXML();
        
        return true;

    }

}