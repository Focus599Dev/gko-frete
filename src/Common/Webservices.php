<?php

namespace Focus599Dev\GKO\Common;


use SimpleXMLElement;
use stdClass;

class Webservices
{
    public $json;
    public $std;
    
    public function __construct($xml)
    {
        $this->toStd($xml);
    }
    
   
    public function get($servico)
    {

        try{

            $svw = $this->std[$servico];

        } catch(\Exception $e){

            return null;
        }

        return $svw;
    }

    /**
     * Return WS parameters in a stdClass
     * @param string $xml
     * @return \stdClass
     */
    public function toStd($xml = '')
    {
        if (!empty($xml)) {
            $this->convert($xml);
        }

        return $this->std;
    }
    
    /**
     * Return WS parameters in json format
     * @return string
     */
    public function __toString()
    {
        return (string) $this->json;
    }
    
    /**
     * Read WS xml and convert to json and stdClass
     * @param string $xml
     */
    protected function convert($xml)
    {
        $resp = simplexml_load_string($xml, null, LIBXML_NOCDATA);

        $this->std = [];

        foreach ($resp as $service => $element) {

            $this->std[$service] = (String) $element;

        }
    }
    
    /**
     * Extract data from wbservices XML strorage to a array
     * @param SimpleXMLElement $node
     * @param string $environment
     * @return array
     */
    protected function extract(SimpleXMLElement $node, $environment)
    {
        $amb[$environment] = [];
        foreach ($node->children() as $children) {
            $name = (string) $children->getName();
            $method = (string) $children['method'];
            $operation = (string) $children['operation'];
            $version = (string) $children['version'];
            $url = (string) $children[0];
            $operations = [
                'method' => $method,
                'operation' => $operation,
                'version' => $version,
                'url' => $url
            ];
            $amb[$environment][$name] = $operations;
        }
        return $amb;
    }
}
