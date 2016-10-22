<?php namespace Alquemedia_Envato_PHP_Wrapper\Utilities;


class String_Object {

    /**
     * @var string representation of object
     */
    protected $stringRepresentation = '';

    /**
     * @return string representation
     */
    public function __toString() {

        return (string) $this->stringRepresentation;

    }

}