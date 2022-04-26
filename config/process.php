<?php

use function PHPSTORM_META\type;

session_start();

include_once("connection.php");

$data = $_POST;

//modificação
if(!empty($data)){

  


  //criar 
  if($data["type"]=== "create"){
      $titulo = $data["titulo"];
      $descrcao = $data["descrcao"];
      $statos = $data["statos"];
      $dataSl = $data["dataSl"];
      $solicitante = $data["solicitante"];


     $query = "INSERT INTO solicitacoes (titulo, descrcao, statos, dataSl, solicitante) VALUES (:titulo, :descrcao, :statos, :dataSl, :solicitante)";

     $stmt = $conn->prepare($query);

     $stmt->bindParam(":titulo", $titulo);
     $stmt->bindParam(":descrcao", $descrcao);
     $stmt->bindParam(":statos", $statos);
     $stmt->bindParam(":dataSl", $dataSl);
     $stmt->bindParam(":solicitante", $solicitante);
    
     try{

       $stmt->execute();


    

       $_SESSION["msg"] = "criado com sucesso!";

       
    
    } catch(PDOException $e){
    
        $error = $e->getMessage();
        echo "erro: $error";
    }

    // redirecionando//

   

  } else if($data["type"] === "edit"){
    $titulo = $data["titulo"];
    $descrcao = $data["descrcao"];
    $statos = $data["statos"];
    $dataSl = $data["dataSl"];
    $solicitante = $data["solicitante"];
    $id =$data["id"];

    $query = "UPDATE solicitacoes SET titulo = :titulo, descrcao = :descrcao, statos = :statos, dataSl = :dataSl, solicitante = :solicitante WHERE id = :id";
    
    $stmt = $conn->prepare($query);

    $stmt->bindParam(":titulo", $titulo);
     $stmt->bindParam(":descrcao", $descrcao);
     $stmt->bindParam(":statos", $statos);
     $stmt->bindParam(":dataSl", $dataSl);
     $stmt->bindParam(":solicitante", $solicitante);
     $stmt->bindParam(":id", $id);

     try{

        $stmt->execute();
 
 
     
 
        $_SESSION["msg"] = " Atualizado com sucesso!";
 
        
     
     } catch(PDOException $e){
     
         $error = $e->getMessage();
         echo "erro: $error";
     }
                                    


  } else if($data["type"] === "delete" ){

    $id = $data["id"];

    $query = "DELETE FROM solicitacoes WHERE id = :id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":id", $id);
   

    try{

        $stmt->execute();
 
 
     
 
        $_SESSION["msg"] = " Removido com sucesso!";
 
        
     
     } catch(PDOException $e){
     
         $error = $e->getMessage();
         echo "erro: $error";
     }

  }
  // home msg

  header("Location: ". $BASE_URL . "../templates/index.php");

  //seleçao  daos
}else{

    $id;

    if(!empty($_GET)){
        $id = $_GET["id"];
    }
    
    // retorno de um 
    
    if(!empty($id)){
    
        $query = "SELECT * FROM solicitacoes WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
    
        $stmt->execute();
        $solicitacoes = $stmt->fetch();
    
    }else{
    
    
    
    
    
    // retorno de todos
    $solicitacoes = [];
    
    $query = "SELECT * FROM  solicitacoes";
    
    $stmt = $conn->prepare($query);
    
    $stmt->execute();
    
    $solicitacoes = $stmt->fetchAll();
    
    }
    
    
}

$conn = null;

