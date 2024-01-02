<?php

namespace Focus599Dev\GKO\Factories\Make;

use Focus599Dev\GKO\Factories\Make\traits\UteisMake;
use stdClass;

class MakeP0053 extends Make{
    use UteisMake;

    private $campos = null;

    const TPSERVICO = 'impdados';

    const CDINTEGRACAO = 'P53';

    public function __construct()
    {
        
        parent::__construct(self::TPSERVICO, self::CDINTEGRACAO);
    }

    public function fieldCampos(stdClass $std){

        $possible = ['DSITEM', 'CDITEM'];
        
        $std = $this->equilizeParameters($std, $possible);

        $this->campos = $this->dom->createElement('Campos');

        $this->dom->addChild(
            $this->campos,
            "DSITEM",
            $std->DSITEM,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "CDITEM",
            $std->CDITEM,
            true,
            ""
        );
    }

    
    public function monta(){

        $this->makeStructureDefault($this->campos);

        $this->dom->appendChild($this->GKO);

        $this->xml = $this->dom->saveXML();
        
        return true;

    }
    
}