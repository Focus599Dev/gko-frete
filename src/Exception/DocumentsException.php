<?php
namespace Focus599Dev\GKO\Exception;


class DocumentsException extends \InvalidArgumentException implements ExceptionInterface
{
    public static $list = [
        1 => "Serviço não localizado {{msg}}",
        2 => "Serviço login não respondeu com a sessão correta",
        3 => "Dados de login invalidos",
        16 => "O txt tem um campo não definido {{msg}}",
    ];
    
    public static function wrongDocument($code, $msg = '')
    {
      
        $msg = self::replaceMsg(self::$list[$code], $msg);
        return new static($msg);
    }
    
    private static function replaceMsg($input, $msg)
    {
        return str_replace('{{msg}}', $msg, $input);
    }
}
