<?php

namespace Focus599Dev\GKO\Factories\Make;

use Focus599Dev\GKO\Factories\Make\traits\UteisMake;
use stdClass;

class MakeIntCtbPag extends Make{
    use UteisMake;

    private $filtros = null;

    const TPSERVICO = 'impdados';

    const CDINTEGRACAO = 'INTCTBLPAG';

    const QTDLIMITREGINICIAIS = 10;


    public function __construct()
    {
        
        parent::__construct(self::TPSERVICO, self::CDINTEGRACAO);
    }

    public function fieldCampos(stdClass $std){
  
        $possible = [
            'PARTRANSPORTADORA_NOCGCCPF',
            'PARCOMPANHIA_NOCGCCPF',
            'DTLIBERACAOINI',
            'DTLIBERACAOFIM',
            'IDFATURA',
            'QTDDIASLIBERACAO',
        ];
        
        $std = $this->equilizeParameters($std, $possible);

        $this->filtros = $this->dom->createElement('Filtros');

        if ($std->PARTRANSPORTADORA_NOCGCCPF){
            
            $filtro = $this->dom->createElement('Filtro');

            $filtro->setAttribute('Campo', 'PARTRANSPORTADORA_NOCGCCPF');

            $filtro->setAttribute('Valor', $std->PARTRANSPORTADORA_NOCGCCPF);

            $this->dom->appChild($this->filtros, $filtro);

        }

        if ($std->PARCOMPANHIA_NOCGCCPF){

            $filtro = $this->dom->createElement('Filtro');

            $filtro->setAttribute('Campo', 'PARCOMPANHIA_NOCGCCPF');

            $filtro->setAttribute('Valor', $std->PARCOMPANHIA_NOCGCCPF);

            $this->dom->appChild($this->filtros, $filtro);

        }

        if ($std->DTLIBERACAOFIM){

            $filtro = $this->dom->createElement('Filtro');

            $filtro->setAttribute('Campo', 'DTLIBERACAOFIM');

            $filtro->setAttribute('Valor', $std->DTLIBERACAOFIM);

            $this->dom->appChild($this->filtros, $filtro);

        }

        if ($std->DTLIBERACAOINI){

            $filtro = $this->dom->createElement('Filtro');

            $filtro->setAttribute('Campo', 'DTLIBERACAOINI');

            $filtro->setAttribute('Valor', $std->DTLIBERACAOINI);

            $this->dom->appChild($this->filtros, $filtro);

        }

        if ($std->IDFATURA){

            $filtro = $this->dom->createElement('Filtro');

            $filtro->setAttribute('Campo', 'IDFATURA');

            $filtro->setAttribute('Valor', $std->IDFATURA);

            $this->dom->appChild($this->filtros, $filtro);

        }

        if ($std->QTDDIASLIBERACAO){

            $filtro = $this->dom->createElement('Filtro');

            $filtro->setAttribute('Campo', 'QTDDIASLIBERACAO');

            $filtro->setAttribute('Valor', $std->QTDDIASLIBERACAO);

            $this->dom->appChild($this->filtros, $filtro);

        }
        
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