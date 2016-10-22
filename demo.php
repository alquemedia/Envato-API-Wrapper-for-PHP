<?php namespace com_Alquemedia;

ini_set('display_errors',true);

use Alquemedia_Envato_PHP_Wrapper\Envato\Envato_API_Client;
use Alquemedia_Envato_PHP_Wrapper\Utilities\Echo_as_JSON;
use Alquemedia_Envato_PHP_Wrapper\Utilities\JSON_File;

require_once $_SERVER['DOCUMENT_ROOT']."/include/autoload.php";

/**
 * This is a simple demo of the Envato API Wrapper
 */
new Echo_as_JSON(

    (new Envato_API_Client(

        (new JSON_File('envato'))->get('token')

    ))->getSiteCategories('graphicriver')->result()

);
