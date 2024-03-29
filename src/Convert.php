<?php 

namespace Focus599Dev\GKO;

use Focus599Dev\GKO\Factories\ParseP0043;
use Focus599Dev\GKO\Factories\ParseP0053;
use Focus599Dev\GKO\Factories\ParseP0072;
use Focus599Dev\GKO\Factories\ParseP0244;
use Focus599Dev\GKO\Factories\ParseIntCtbPag;
use Focus599Dev\GKO\Factories\ParseIntCtbPag2;
use Focus599Dev\GKO\Factories\ParseIntCtbProv1;
use Focus599Dev\GKO\Factories\ParseIntCtbProv2;

class Convert{

    private $txt;

    private $method;
    /**
     * Constructor method
     * @param string $txt
     */
    public function __construct($txt = '', $method)
    {
        if (!empty($txt)) {
            $this->txt = trim($txt);
        }

        $this->method = $method;
    }

    /**
     * Static method to convert Txt to Xml
     * @param string $txt
     * @return array
     */
    public function parse()
    {   
        switch($this->method){
            case 'P0053':
                return $this->toXMLP0053();
            case 'P0043':
                return $this->toXMLP0043();
            case 'P0072':
                return $this->toXMLP0072();
            case 'P0244':
                return $this->toXMLP0244();
            case 'IntCtbProv1':
                return $this->toXMLIntCtbProv1();
            case 'IntCtbProv2':
                return $this->toXMLIntCtbProv2();
            case 'IntCtbPag':
                return $this->toXMLCtbPag();
            case 'IntCtbPag2':
                return $this->toXMLIntCtbPag2();
        }
    }

    public function toXMLIntCtbPag2($txt = '')
    {

        try {
            $data = $this->sliceNotas("A");
            
            $xml = array();

            foreach($data as $txtRequest){
                
                $parser = new ParseIntCtbPag2();

                $xmls[] = $parser->toXml($txtRequest);
            }

            return $xmls;
            
        } catch (\Exception $e) {
            throw new \Exception('Erro toXMLP0053: ' . $e->getMessage());
        }

    }

    public function toXMLCtbPag($txt = '')
    {

        try {
            $data = $this->sliceNotas("A");
            
            $xml = array();

            foreach($data as $txtRequest){
                
                $parser = new ParseIntCtbPag();

                $xmls[] = $parser->toXml($txtRequest);
            }

            return $xmls;
            
        } catch (\Exception $e) {
            throw new \Exception('Erro toXMLP0053: ' . $e->getMessage());
        }

    }

    public function toXMLIntCtbProv2($txt = '')
    {

        try {
            $data = $this->sliceNotas("A");
            
            $xml = array();

            foreach($data as $txtRequest){
                
                $parser = new ParseIntCtbProv2();

                $xmls[] = $parser->toXml($txtRequest);
            }

            return $xmls;
            
        } catch (\Exception $e) {
            throw new \Exception('Erro toXMLP0053: ' . $e->getMessage());
        }

    }

    public function toXMLIntCtbProv1($txt = '')
    {

        try {
            $data = $this->sliceNotas("A");
            
            $xml = array();

            foreach($data as $txtRequest){
                
                $parser = new ParseIntCtbProv1();

                $xmls[] = $parser->toXml($txtRequest);
            }

            return $xmls;
            
        } catch (\Exception $e) {
            throw new \Exception('Erro toXMLP0053: ' . $e->getMessage());
        }

    }

    public function toXMLP0053($txt = '')
    {

        try {
            $data = $this->sliceNotas("\n");
            
            $xml = array();

            foreach($data as $txtRequest){
                
                $parser = new ParseP0053();

                $xmls[] = $parser->toXml($txtRequest);
            }

            return $xmls;
            
        } catch (\Exception $e) {
            throw new \Exception('Erro toXMLP0053: ' . $e->getMessage());
        }

    }

    public function toXMLP0043($txt = '')
    {

        try {
            $data = $this->sliceNotas("\n");
            
            $xml = array();

            foreach($data as $txtRequest){
                
                $parser = new ParseP0043();

                $xmls[] = $parser->toXml($txtRequest);
            }

            return $xmls;
            
        } catch (\Exception $e) {
            throw new \Exception('Erro toXMLP0043: ' . $e->getMessage());
        }

    }

    public function toXMLP0072($txt = '')
    {

        try {
            $data = $this->sliceNotas("A");
            
            $xml = array();

            foreach($data as $txtRequest){
                
                $parser = new ParseP0072();

                $xmls[] = $parser->toXml($txtRequest);
            }

            return $xmls;
            
        } catch (\Exception $e) {
            throw new \Exception('Erro toXMLP0072: ' . $e->getMessage());
        }

    }

    public function toXMLP0244($txt = '')
    {

        try {
            $data = $this->sliceNotas("\n");
            
            $xml = array();

            foreach($data as $txtRequest){
                
                $parser = new ParseP0244();

                $xmls[] = $parser->toXml($txtRequest);
            }

            return $xmls;
            
        } catch (\Exception $e) {
            throw new \Exception('Erro toXMLP0053: ' . $e->getMessage());
        }

    }

    protected function sliceNotas($breakpoint){

        $dados = explode("\n", $this->txt);

        $data = array();
        $iCount = 0;
        $iteration = 0;
        
        foreach ($dados as &$linha) {
                        
            $linha = explode('|', $linha); 

            list($first) = $linha; 
            
            if ($iteration && $breakpoint == $first){
                $iCount += 1;
            }

            $data[$iCount][] = $linha;
            
            $iteration += 1;
        }

        return $data;
    }

}