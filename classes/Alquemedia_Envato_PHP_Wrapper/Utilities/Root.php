<?php namespace Alquemedia_Envato_PHP_Wrapper\Utilities;

use Alquemedia_Envato_PHP_Wrapper\Utilities\String_Object;

/**
 * Class Root
 * @package Alquemedia_Envato_PHP_Wrapper
 *
 * Root of Application
 */
class Root extends String_Object{

    public function __construct() {

        $this->stringRepresentation = $_SERVER['DOCUMENT_ROOT'];

    }
}