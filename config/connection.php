<?php

   $host = "localhost:3312";
   $dbname = "db_agenda";
   $user = "root";
   $pass = "";

   try {
      
      $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   } catch (PDOException $e) {
      $error = $e->getMessage();
      echo "Erro: $error";
   }