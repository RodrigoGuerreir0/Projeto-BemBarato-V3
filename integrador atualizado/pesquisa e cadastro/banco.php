<?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bd_bembarato";

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>