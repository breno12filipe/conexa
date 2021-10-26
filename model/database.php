<?php
    /*
        Example of how to use this class
        https://codeshack.io/super-fast-php-mysql-database-class/

        Database credentials should be stored in a .env file as environment variables
        To use .env files as enviroment variables we can use PHP dotenv
        but first we need to install it using composer.
            How to use PHP dotenv 
            https://www.youtube.com/watch?v=rhI4Jy7T_SY

            How to use composer
            https://king.host/blog/2018/02/composer-o-que-e-como-instalar-como-usar/


    */
    class DataBase{

        protected function connect(){            
            $conn = mysqli_connect('localhost','root','root','conexa')or die("Couldn't connect");
            return $conn;
        }
        
    }
        
?>