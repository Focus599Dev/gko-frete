<?php

namespace Focus599Dev\GKO\Http;

use Focus599Dev\GKO\Exception\CurlException;

class HttpCurl{

    private $soaptimeout = 30; 

    private $responseBody = null;

    private $soaperror = null;

    private $soapinfo = null;

    private $responseHead = null;

    public function sendRequest($url, $xml){

        $msgSize = strlen($xml);

        $parameters = [
            "Content-Type: text/xml; charset=utf-8",
            "Content-length: $msgSize"
        ];

        try{
            $oCurl = curl_init();
            curl_setopt($oCurl, CURLOPT_URL, $url);
            curl_setopt($oCurl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            curl_setopt($oCurl, CURLOPT_CONNECTTIMEOUT, $this->soaptimeout);
            curl_setopt($oCurl, CURLOPT_TIMEOUT, $this->soaptimeout + 20);
            curl_setopt($oCurl, CURLOPT_HEADER, 1);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);

            curl_setopt($oCurl, CURLOPT_POST, 1);
            curl_setopt($oCurl, CURLOPT_POSTFIELDS, $xml);
            curl_setopt($oCurl, CURLOPT_HTTPHEADER, $parameters);

            $response = curl_exec($oCurl);
            
            $this->soaperror = curl_error($oCurl);
            $ainfo = curl_getinfo($oCurl);
            if (is_array($ainfo)) {
                $this->soapinfo = $ainfo;
            }
            $headsize = curl_getinfo($oCurl, CURLINFO_HEADER_SIZE);
            $httpcode = curl_getinfo($oCurl, CURLINFO_HTTP_CODE);


            $this->responseHead = trim(substr($response, 0, $headsize));
            $this->responseBody = trim(substr($response, $headsize));


        } catch (\Exception $e) {
            throw CurlException::unableToLoadCurl($e->getMessage());
        }

        if ($this->soaperror != '') {
            throw CurlException::soapFault($this->soaperror . " [$url]");
        }

        return $this->responseBody;

    }
}