<?php 

namespace Focus599Dev\GKO\Factories;

use Focus599Dev\GKO\Factories\Parse;

class ParseP0072 extends Parse{

    public function __construct(){
        
        parent::__construct('P0072');
        
    }

    public function Entity0($std){
    }

    public function EntityA($std){
        $this->make->fieldCampos($std);
    }

    public function EntityB($std){

        $this->make->createRelationshipItem($std, array(
            'NmRelacioPai' => 'MNTA_MNTAITM',
            'nmTabela' => 'MNTAITEM',
        ));
    }

    public function EntityC($std){

        $this->make->createRelationshipMTexto($std, array(
            'NmRelacioPai' => 'MNTA_MTEXTO',
            'nmTabela' => 'MTEXTO',
        ));
    }

    public function EntityD($std){

        $this->make->createRelationCredSP($std, array(
            'NmRelacioPai' => 'MNTA_CREDESP',
            'nmTabela' => 'CREDESPACHO',
        ));
    }

    public function EntityE($std){

        $this->make->createRelationEndereco($std, array(
            'NmRelacioPai' => 'CEND_MNOTA',
            'nmTabela' => 'CENDERECO',
        ));
    }
}