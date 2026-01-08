<?php 

namespace Focus599Dev\GKO\Factories\Make\traits;

use Exception;
use stdClass;

trait UteisMake {
     /**
     * Includes missing or unsupported properties in stdClass
     * @param stdClass $std
     * @param array $possible
     * @return stdClass
     */
    function equilizeParameters(stdClass $std, $possible)
    {
        $arr = get_object_vars($std);
        foreach ($possible as $key) {
            if (!array_key_exists($key, $arr)) {
                $std->$key = null;
            }
        }
        return $std;
    }

    function transformMoney($number, $decimal, $dec_point, $thousands_sep){

        try {
            if (is_numeric($number)){
                return number_format($number, $decimal, $dec_point, $thousands_sep);
            }

        } catch (Exception $th) {
            
            return $number;

        }
        
        return $number;
    }

}
