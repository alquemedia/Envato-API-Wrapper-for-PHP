<?php
spl_autoload_register(function( $className ){

    $className = preg_replace("/\\\\/",'/',$className);

    $path = $_SERVER['DOCUMENT_ROOT']. "/classes/$className.php";

    if ( file_exists($path)){

        require_once $path;

        return true;
    }

    return false;
});
