<?php

namespace Focus599Dev\GKO;

class Strings
{
    /**
     * Replace all specials characters from string and retuns only 128 basics
     * NOTE: only for UTF-8
     * @param string $string
     * @return  string
     */
    public static function replaceSpecialsChars($string)
    {
        $string = trim($string);
        $aFind = ['&','á','à','ã','â','é','ê','í','ó','ô','õ','ú','ü',
            'ç','Á','À','Ã','Â','É','Ê','Í','Ó','Ô','Õ','Ú','Ü','Ç','nº'];
        $aSubs = ['e','a','a','a','a','e','e','i','o','o','o','u','u',
            'c','A','A','A','A','E','E','I','O','O','O','U','U','C','n'];
        $newstr = str_replace($aFind, $aSubs, $string);
        $newstr = preg_replace("/[^a-zA-Z0-9 @,-_.;:\/]/", "", $newstr);
        return $newstr;
    }
    
    /**
     * Remove all non numeric characters from string
     * @param string $string
     * @return string
     */
    public static function onlyNumbers($string)
    {
        return preg_replace("/[^0-9]/", "", $string);
    }
    
    /**
     * Remove unwanted attributes, prefixes, sulfixes and other control
     * characters like \r \n \s \t
     * @param string $string
     * @param boolean $removeEncodingTag remove encoding tag from a xml
     * @return string
     */
    public static function clearXmlString($string, $removeEncodingTag = false)
    {
        $aFind = array(
            'xmlns:default="http://www.w3.org/2000/09/xmldsig#"',
            ' standalone="no"',
            'default:',
            ':default',
            "\n",
            "\r",
            "\t"
        );
        $retXml = str_replace($aFind, "", $string);
        $retXml = preg_replace('/(\>)\s*(\<)/m', '$1$2', $retXml);
        if ($removeEncodingTag) {
            $retXml = self::deleteAllBetween($retXml, '<?xml', '?>');
        }
        return $retXml;
    }
    
    /**
     * Remove all characters between markers
     * @param string $string
     * @param string $beginning
     * @param string $end
     * @return string
     */
    public static function deleteAllBetween($string, $beginning, $end)
    {
        $beginningPos = strpos($string, $beginning);
        $endPos = strpos($string, $end);
        if ($beginningPos === false || $endPos === false) {
            return $string;
        }
        $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);
        return str_replace($textToDelete, '', $string);
    }
    
    /**
     * Clears the xml after adding the protocol, removing repeated namespaces
     * @param string $string
     * @return string
     */
    public static function clearProtocoledXML($string)
    {
        $procXML = self::clearXmlString($string);
        $aApp = array('nfe','cte','mdfe');
        foreach ($aApp as $app) {
            $procXML = str_replace(
                'xmlns="http://www.portalfiscal.inf.br/'.$app.'" xmlns="http://www.w3.org/2000/09/xmldsig#"',
                'xmlns="http://www.portalfiscal.inf.br/'.$app.'"',
                $procXML
            );
        }
        return $procXML;
    }
    
    /**
     * Remove some alien chars from txt
     * @param string $txt
     * @return string
     */
    public static function removeSomeAlienCharsfromTxt($txt)
    {
        //remove CRs and TABs
        $txt = str_replace(["\r","\t"], "", $txt);
        //remove multiple spaces
        $txt = preg_replace('/(?:\s\s+)/', ' ', $txt);
        //remove spaces at begin and end of fields
        $txt = str_replace(["| "," |"], "|", $txt);
        return $txt;
    }
    
    /**
     * Creates a string ramdomically with the specified length
     * @param int $length
     * @return string
     */
    public static function randomString($length)
    {
        $keyspace = '0123456789abcdefghijklmnopqr'
            . 'stuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[rand(0, $max)];
        }
        return $str;
    }

     /**
     * Replace all non-UTF-8 chars to UTF-8
     * Remove all control chars
     * Remove all multiple spaces
     * @param string $input
     * @return string
     */
    public static function normalize($input)
    {
        //Carriage Return, Tab and Line Feed is not acceptable in strings
        $input = str_replace(["\r", "\t", "\n"], "", $input);
        //Multiple spaces is not acceptable in strings
        $input = preg_replace('/(?:\s\s+)/', ' ', $input);
        //Only UTF-8 characters is acceptable
        $input = Encoding::fixUTF8($input);
        $input = preg_replace(
            '/[\x00-\x08\x10\x0B\x0C\x0E-\x19\x7F]' .
                '|[\x00-\x7F][\x80-\xBF]+' .
                '|([\xC0\xC1]|[\xF0-\xFF])[\x80-\xBF]*' .
                '|[\xC2-\xDF]((?![\x80-\xBF])|[\x80-\xBF]{2,})' .
                '|[\xE0-\xEF](([\x80-\xBF](?![\x80-\xBF]))|(?![\x80-\xBF]{2})|[\x80-\xBF]{3,})/S',
            '',
            $input
        );
        $input = preg_replace('/\xE0[\x80-\x9F][\x80-\xBF]' .
            '|\xED[\xA0-\xBF][\x80-\xBF]/S', '', $input);
        //And no other control character is acceptable either
        return preg_replace('/[[:cntrl:]]/', '', $input);
    }

     /**
     * Clear inputs for build in XML
     * Only UTF-8 characters is acceptable
     * & isolated, less than, greater than, quotation marks and apostrophes
     * should be replaced by their html equivalent
     * Carriage Return, Tab and Line Feed is not acceptable in strings
     * Multiple spaces is not acceptable in strings
     * And no other control character is acceptable either
     * @param string|null $input
     * @return string|null
     */
    public static function replaceUnacceptableCharacters($input)
    {
        if (empty($input)) {
            return $input;
        }
        $input = str_replace(['<', '>'], '', $input);
        $input = str_replace('&', ' & ', $input);
        $input = str_replace("'", '', $input);
        $input = str_replace('"', '', $input);
        $input = preg_replace('/(?:\s\s+)/', ' ', $input);
        //& isolated, less than, greater than, quotation marks and apostrophes
        //should be replaced by their html equivalent
        $input = str_replace(
            ['&', '<', '>', '"', "'"],
            ['&amp;', '&lt;', '&gt;', '&quot;', '&#39;'],
            $input
        );
        $input = self::normalize($input);
        return trim($input);
    }

}