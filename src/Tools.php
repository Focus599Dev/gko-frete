<?php 

namespace Focus599Dev\GKO;

use Focus599Dev\GKO\Common\Tools as CommonTools;

class Tools extends CommonTools{

    public function P53($xml)
    {

        $this->execLogin();

        $service = 'P0053';

        $xml = $this->setSessaoXML($xml);

        $this->lastRequest = $xml;

        $this->lastResponse = $this->send($service, $xml);

        return $this->lastResponse;

    }

    public function P43($xml)
    {

        $this->execLogin();

        $service = 'P0043';

        $xml = $this->setSessaoXML($xml);

        $this->lastRequest = $xml;

        $this->lastResponse = $this->send($service, $xml);

        var_dump($this->lastResponse);

        return $this->lastResponse;

    }

    public function P72($xml)
    {

        $this->execLogin();

        $service = 'P0072';

        $xml = $this->setSessaoXML($xml);

        $this->lastRequest = $xml;

        $this->lastResponse = $this->send($service, $xml);

        var_dump($this->lastResponse);
        
        return $this->lastResponse;

    }

    public function P244($xml)
    {

        $this->execLogin();

        $service = 'P0244';

        $xml = $this->setSessaoXML($xml);
        
        $this->lastRequest = $xml;

        $this->lastResponse = $this->send($service, $xml);

        var_dump($xml);
        var_dump($this->lastResponse);


        return $this->lastResponse;

    }
    
}