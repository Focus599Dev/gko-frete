<?php

namespace Focus599Dev\GKO\Factories\Make;

use Focus599Dev\GKO\Factories\Make\traits\UteisMake;
use stdClass;

class MakeLogout extends Make{
    use UteisMake;

    private $logout = null;

    private $idSessao = null;

    const TPSERVICO = 'app';

    public function __construct($idSessao)
    {

        $this->idSessao = $idSessao;

        parent::__construct(self::TPSERVICO, self::TPSERVICO);

    }

    public function fieldCampos(){

        $login = $this->dom->createElement('login');

        $login->setAttribute('TpLogin', 'logout');

        $this->logout = $login;
    }

    
    public function monta(){

        $this->makeStructureLogin($this->logout);

        $Servico = $this->GKO->getElementsByTagName('Servico');
        
        if ($Servico->length){
            $Servico->item(0)->setAttribute('idsessao', $this->idSessao);
        }

        $this->dom->appendChild($this->GKO);

        $this->xml = $this->dom->saveXML();
        
        return true;

    }
    
}