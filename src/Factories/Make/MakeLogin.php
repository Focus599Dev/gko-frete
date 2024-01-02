<?php

namespace Focus599Dev\GKO\Factories\Make;

use Focus599Dev\GKO\Factories\Make\traits\UteisMake;
use stdClass;

class MakeLogin extends Make{
    use UteisMake;

    private $login = null;

    const TPLOGIN = 'login_sem_menu';

    const TPSERVICO = 'app';

    public function __construct()
    {
        
        parent::__construct(self::TPSERVICO, self::TPSERVICO);

    }

    public function fieldCampos(stdClass $std){

        $possible = ['Database', 'Usuario', 'Senha', 'AplicacaoCliente'];
        
        $std = $this->equilizeParameters($std, $possible);

        $login = $this->dom->createElement('login');

        $login->setAttribute('TpLogin', 'login_sem_menu');

        $this->dom->addChild(
            $login,
            "Database",
            $std->Database,
            true,
            ""
        );

        $this->dom->addChild(
            $login,
            "Usuario",
            $std->Usuario,
            true,
            ""
        );

        $this->dom->addChild(
            $login,
            "Senha",
            $std->Senha,
            true,
            ""
        );

        $this->dom->addChild(
            $login,
            "AplicacaoCliente",
            $std->AplicacaoCliente,
            true,
            ""
        );

        $this->login = $login;
    }

    
    public function monta(){

        $this->makeStructureLogin($this->login);

        $this->dom->appendChild($this->GKO);

        $this->xml = $this->dom->saveXML();
        
        return true;

    }
    
}