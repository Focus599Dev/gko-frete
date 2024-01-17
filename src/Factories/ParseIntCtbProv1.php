<?php 

namespace Focus599Dev\GKO\Factories;

use Focus599Dev\GKO\Factories\Parse;

class ParseIntCtbProv1 extends Parse{

    public function __construct(){
        
        parent::__construct('IntCtbProv1');
        
    }

    public function Entity0($std){
    }

    public function Entitya($std){
        $this->make->fieldCampos($std);
    }

    public function Entityb($std){
      
    }

   
}