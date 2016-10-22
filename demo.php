<?php namespace com_Alquemedia;

ini_set('display_errors',true);

use Alquemedia_Envato_PHP_Wrapper\Envato\Envato_API_Client;
use Alquemedia_Envato_PHP_Wrapper\Envato\Envato_Search_Parameters;
use Alquemedia_Envato_PHP_Wrapper\Utilities\Echo_as_JSON;
use Alquemedia_Envato_PHP_Wrapper\Utilities\JSON_File;

require_once $_SERVER['DOCUMENT_ROOT']."/include/autoload.php";

/**
 * This is a simple demo of the Envato API Wrapper
 */
$envato_API_Client = new Envato_API_Client((new JSON_File('envato'))->get('token'));

new Echo_as_JSON([

    'categories' => $envato_API_Client->getSiteCategories('graphicriver')->result(),

    'search' => $envato_API_Client->searchForItems(new Envato_Search_Parameters([

        'term' => 'river'

    ]))->result()


]);
