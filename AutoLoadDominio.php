<?php

/**
 * Auto loading namespace
 * Registra uma forma de buscar as informações do namespace.
 * 
 * @author Dilson José <dilsonrabelo.unasus@gmail.com>
 * @version 1.0
 */    
class AutoLoadDominio
{
    public static function Register() {
        return spl_autoload_register(array('AutoLoadDominio', 'Load'));
    }

    public static function Load($class) {
        $fileInclude = "/media/samir_souza/PersonalDataLocal/Sync/Dropbox/Trabs/Unasus/SamProg/Blog" . DIRECTORY_SEPARATOR . $class . '.php';
        
        $fileInclude = str_replace("\\", "/", $fileInclude);
        
        if (file_exists($fileInclude))        
            require_once $fileInclude;
    }
}

AutoLoadDominio::Register();