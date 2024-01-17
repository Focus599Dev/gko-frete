<?php 

namespace Focus599Dev\GKO;

use Focus599Dev\GKO\Common\Tools as CommonTools;

class Tools extends CommonTools{

    public function P53($xml)
    {

        $service = 'P0053';

        return $this->defaultRequest($service,$xml);

    }

    public function P43($xml)
    {

        $service = 'P0043';

        return $this->defaultRequest($service,$xml);

    }

    public function P72($xml)
    {

        $service = 'P0072';

        return $this->defaultRequest($service,$xml);

    }

    public function P244($xml)
    {

        $service = 'P0244';

        return $this->defaultRequest($service,$xml);

    }

    public function IntCtbProv1($xml)
    {

        $service = 'IntCtbProv1';

        return $this->defaultRequest($service,$xml);

    } 

    public function IntCtbPag($xml)
    {
        $service = 'IntCtbPag';
     
        return $this->defaultRequest($service,$xml);

    } 

    public function IntCtbProv2($xml)
    {
        $service = 'IntCtbProv2';
     
        return $this->defaultRequest($service,$xml);

    } 

    public function IntCtbPag2($xml)
    {
        $service = 'IntCtbPag2';
     
        return $this->defaultRequest($service,$xml);

    } 

}