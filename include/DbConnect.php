<?php

/**
 * Handling database connection
 *
 * @author Ravi Tamada
 * @link URL Tutorial link
 */
require __DIR__.'/../libs/Predis/Autoloader.php';
Predis\Autoloader::register();
class DbConnect {

    private $conn;

    function __construct() {        
    }

    /**
     * Establishing database connection
     * @return database connection handler
     */
    function connect() {
        // include_once dirname(__FILE__) . '/Config.php';

        // // Connecting to mysql database
        // $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        // // Check for database connection error
        // if (mysqli_connect_errno()) {
        //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
        // }

        // // returing connection resource
        // return $this->conn;
            define('HOST','127.0.0.1');
            define('PUERTO',6379);
            define('BD',0);
            try{
                // instanciamos Redis
                $redis = new Predis\Client();
                // nos conectamos al servidor
                $redis->connect(HOST, PUERTO);
                // seleccionamos la base de datos
                $redis->select(BD);
            }catch(Exception $e){
                die('ERROR '.$e->getCode().': '.$e->getMessage());
            }
    }

}

?>
