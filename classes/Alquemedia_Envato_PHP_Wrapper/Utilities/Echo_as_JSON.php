<?php namespace Alquemedia_Envato_PHP_Wrapper\Utilities;

/**
 * Class Echo_as_JSON
 * @package Alquemedia_Envato_PHP_Wrapper\Utilities
 *
 * Echo an array of data as JSON
 */
class Echo_as_JSON {

    /**
     * Echo_as_JSON constructor.
     * @param array $outputData to display
     */
    public function __construct( array $outputData ) {

        header('Content-Type: application/json');

        echo json_encode($outputData);

    }
}