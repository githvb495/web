<?php

ini_set( 'display_errors', 1 );
error_reporting( ~0 );

if ( isset( $_POST[ 'button' ] ) ) {
    
    echo date('Y-m-d' .' -- ');
    echo date('Y M D' .' -- ');

    // $now = getdate();
    // var_dump($now);

    echo date_default_timezone_get();
    date_default_timezone_set('America/Los_Angeles');

    /*
        date()
        getdate()
        date_defult_timezone_get()
        date_defult_timezone_set()

        Obtienen la fecha y hora del servidor
        Zona horaria, latitud y longitud definidas en php.ini
    */
}

?>