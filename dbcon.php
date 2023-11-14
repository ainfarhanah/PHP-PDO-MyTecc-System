<?php

function dbConnect(){
        try{
            $username = 'root'; //Change to your username for phpmyadmin
            $userpassword = ''; //Please enter your password for phpmyadmin
			//You can make changes to "localhost" and "pdo" where you need to enter your host details and your database name
            $conn = new pdo("mysql:host=localhost;dbname=mytecc;", $username, $userpassword); 
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        }   catch(PDOException $e){
            echo 'ERROR', $e->getMessage();
     }
} ?>