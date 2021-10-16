<?php

   session_start();

   include_once('connection.php');
   include_once('url.php');

   $data = $_POST;

   if (!empty($data)) {

      //Create
      if ($data['type'] === 'Create') {
         $name = $data['name'];
         $phone = $data['phone'];
         $observations = $data['observations'];

         $query = "INSERT INTO contacts(name, phone, observations) VALUES (:name, :phone, :observations)";

         $stmt = $conn->prepare($query);

         $stmt->bindParam(":name", $name);
         $stmt->bindParam(":phone", $phone);
         $stmt->bindParam(":observations", $observations);

         try {
            $stmt->execute();
            $_SESSION['msg'] = "Contato criado com sucesso!";
         } catch (PDOException $e) {
            $error = $e->getMessage();
            echo "Erro: $error";
         }
      
      }

      //Redirect home
      header("Location: " . $BASE_URL . "../index.php");
   } else {

      if (!empty($_GET)) {
         //1 contato
   
         $id;
         $id = $_GET['id'];
      
         $query = "SELECT * FROM contacts WHERE id = :id";
   
         $stmt = $conn->prepare($query);
         $stmt->bindParam(":id", $id);
         $stmt->execute();
   
         $contact = $stmt->fetch();
   
      } else {
         //Diversos contatos
   
         $contacts = [];
   
         $query = "SELECT * FROM contacts";
   
         $stmt = $conn->prepare($query);
         $stmt->execute();
   
         $contacts = $stmt->fetchAll();
      }
   }

// Close connection
$conn = null;