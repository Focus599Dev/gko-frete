<?php

namespace Focus599Dev\GKO\Factories\Make;

use Focus599Dev\GKO\Factories\Make\traits\UteisMake;
use stdClass;

class MakeIntCtbPag2 extends Make{
    use UteisMake;

    private $campos = null;

    const TPSERVICO = 'impdados';

    const CDINTEGRACAO = 'INTCTBLPAG';

    CONST STCONFIRMARINTEGRACAO = 1;

    public function __construct()
    {
        
        parent::__construct(self::TPSERVICO, self::CDINTEGRACAO);
    }

    public function fieldCampos(stdClass $std){
  
        $possible = [
            'IDFATURA',
            'IDPARTRANSPORTADORA',
            'IDTRANSPORTADORA',
            'PARTRANSPORTADORA_NOCGCCPF',
            'PARTRP_SISCORPORATIVO',
            'CDFATURA',
            'CDSERIE',
            'NOCONTROLE',
        ];

        $std = $this->equilizeParameters($std, $possible);

        $this->campos = $this->dom->createElement('Campos');

        $this->dom->addChild(
            $this->campos,
            "IDFATURA",
            $std->IDFATURA,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "IDPARTRANSPORTADORA",
            $std->IDPARTRANSPORTADORA,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "IDTRANSPORTADORA",
            $std->IDTRANSPORTADORA,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "PARTRANSPORTADORA_NOCGCCPF",
            $std->PARTRANSPORTADORA_NOCGCCPF,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "PARTRP_SISCORPORATIVO",
            $std->PARTRP_SISCORPORATIVO,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "CDFATURA",
            $std->CDFATURA,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "CDSERIE",
            $std->CDSERIE,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "NOCONTROLE",
            $std->NOCONTROLE,
            true,
            ""
        );
        
    }

    
    public function monta(){

        $this->makeStructureDefault($this->campos);

        $impDados = $this->GKO->getElementsByTagName('ImpDados');

        if ($impDados->length){
            $impDados->item(0)->setAttribute('StConfirmarIntegracao', self::STCONFIRMARINTEGRACAO);
        }

        $this->dom->appendChild($this->GKO);

        $this->xml = $this->dom->saveXML();
        
        return true;

    }

}