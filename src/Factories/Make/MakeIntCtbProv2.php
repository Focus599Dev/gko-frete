<?php

namespace Focus599Dev\GKO\Factories\Make;

use Focus599Dev\GKO\Factories\Make\traits\UteisMake;
use stdClass;

class MakeIntCtbProv2 extends Make{
    use UteisMake;

    private $campos = null;

    const TPSERVICO = 'impdados';

    const CDINTEGRACAO = 'INTCTBPROV';

    CONST STCONFIRMARINTEGRACAO = 1;

    public function __construct()
    {
        
        parent::__construct(self::TPSERVICO, self::CDINTEGRACAO);
    }

    public function fieldCampos(stdClass $std){
  
        $possible = [
            'CDDOCCONTABIL',
        ];
        
        $std = $this->equilizeParameters($std, $possible);

        $this->campos = $this->dom->createElement('Campos');

        $this->dom->addChild(
            $this->campos,
            "CDDOCCONTABIL",
            $std->CDDOCCONTABIL,
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