<?php

ini_set( 'display_errors', 1 );
error_reporting( ~0 );

if ( isset( $_POST[ 'button' ] ) ) {
    require( 'db_conn_web_conf.php' );
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $conn :: prepare($query) -> devuelve PDOStatement
    // $pdostmt -> execute() - fetch() asigna los datos aun array

    try {
        $conn = new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass);
        echo 'Connected';
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn -> exec('SET CHARACTER SET utf8mb4');

        $query = 'SELECT username, password, email FROM users WHERE username = ? AND password = ?';
        $pdostmt = $conn -> prepare($query);
        $pdostmt -> execute(array($username, $password));

        while ($row = $pdostmt -> fetch(PDO::FETCH_ASSOC)) {
            echo $row['username'] . $row['password'] . $row['email'];
        }

        $pdostmt -> closeCursor();
    }
    catch (Exception $e) {
        die('Error: '.$e->GetMessage());
    }
    finally {
        $conn = null;
    }
}

?>