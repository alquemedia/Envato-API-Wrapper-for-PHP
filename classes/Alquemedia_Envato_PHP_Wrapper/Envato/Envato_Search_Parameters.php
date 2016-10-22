<?php namespace Alquemedia_Envato_PHP_Wrapper\Envato;
use Alquemedia_Envato_PHP_Wrapper\Utilities\Array_Object;

/**
 * Class Envato_Search_Parameters
 * @package Alquemedia_Envato_PHP_Wrapper\Envato
 */
class Envato_Search_Parameters extends Array_Object{

    /**
     * Envato_Search_Parameters constructor.
     * @param array $searchParameters
     */
    public function __construct(array $searchParameters ) {

        parent::__construct($searchParameters);

    }

    /**
     * @return string Query string format
     */
    public function toQueryString(){

        $queryString = '';

        foreach ( $this->array_values as $member => $value )

            $queryString .= $queryString ? "&$member=$value": "$member=$value";

        return $queryString;
    }

    /**
     * @return string
     */
    public function __toString() {

        return (string) $this->toQueryString();

    }
}