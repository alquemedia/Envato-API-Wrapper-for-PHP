<?php namespace Alquemedia_Envato_PHP_Wrapper\Utilities;

/**
 * Class Array_Object
 * @package Alquemedia_Envato_PHP_Wrapper\Utilities
 */
class Array_Object extends Array_Representable_Object {

    /**
     * @param array $members to add to Object
     */
    public function __construct( array $members ){

        $this->array_values = $members;

    }

    /**
     * @param $value
     * @return mixed
     */
    public function get( $value ){

        return @$this->array_values[$value];

    }
}