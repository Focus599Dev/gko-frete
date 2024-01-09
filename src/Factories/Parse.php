<?php 

namespace Focus599Dev\GKO\Factories;

use Focus599Dev\GKO\Exception\DocumentsException;
use Focus599Dev\GKO\Strings;

abstract class Parse{

    protected $event;

    protected $structure;

    protected $make;

    public function __construct($event){
        
        $this->event = $event;

        $path = realpath(__DIR__."/../../storage/txtstructure$event.json");
        
        $this->structure = json_decode(file_get_contents($path), true);

        $cl = "\Focus599Dev\GKO\Factories\Make\Make$event";
        
        $this->make = new $cl();
        
    }

     /**
     * Convert txt to XML
     * @param array $nota
     * @return string|null
     */
    public function toXml($nota)
    {
        $this->array2xml($nota);

        if ($this->make->monta()) {
            return $this->make->getXML();
        }
        
        return null;
    }

    /**
     * Converte txt array to xml
     * @param array $nota
     * @return void
     */
    protected function array2xml($rows)
    {

        $keystructure = array_keys($this->structure);


        foreach ($rows as $lin) {
            
            $fields = $lin;

            if (empty($fields)) {
                continue;
            }

            $metodo = 'Entity' . strtolower(str_replace(' ', '', $keystructure[0]));

            if (!method_exists(__CLASS__, $metodo)) {
                //campo não definido
                throw DocumentsException::wrongDocument(16, $this->event);
            }


            $struct = $this->structure[strtoupper($keystructure[0])];
            $std = $this->fieldsToStd($fields, $struct);

            $this->$metodo($std);
        }

    }

    /**
     * Creates stdClass for all tag fields
     * @param array $dfls
     * @param string $struct
     * @return stdClass
     */
    protected static function fieldsToStd($dfls, $struct)
    {
        $sfls = explode('|', $struct);
        $len = count($sfls);
        $std = new \stdClass();

        for ($i = 0; $i < $len; $i++) {
            $name = $sfls[$i];
            
            if (isset($dfls[$i]))
                $data = $dfls[$i];
            else 
                $data = '';


            if (!empty($name)) {

                $std->$name = Strings::replaceSpecialsChars($data);
            }
        }

        return $std;
    }

    abstract function Entity0($std);
    abstract function EntityA($std);
    abstract function EntityB($std);
}