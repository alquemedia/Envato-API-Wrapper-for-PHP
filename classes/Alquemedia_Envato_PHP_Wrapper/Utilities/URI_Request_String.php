<?php namespace Alquemedia_Envato_PHP_Wrapper\Utilities;

/**
 * Class URI_Request_String
 * @package Alquemedia_Envato_PHP_Wrapper\Utilities
 */
class URI_Request_String extends String_Object{

    public function __construct( array $parameters ){

        $qs = '';

        foreach ( $parameters as $name => $value ){

            $value_component = $value===null? "$name":"$name=$value";

            $qs .= $qs? "&$value_component":"?$value_component";


        }

        $this->stringRepresentation = $qs;
    }

}