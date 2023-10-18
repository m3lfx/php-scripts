<?php
    include("../include/config.php");
   
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $password = sha256($password);
    $password = hash('sha256', $password);
    var_dump($password);
    $sql = "INSERT INTO users (email, password) VALUES('$email', '$password')";
    var_dump($sql);
    $result = mysqli_query($conn, $sql);
    if($result) {
        // header("Location: ../listener/create.php");
        header("Location: ../listener/create.php");
        
    }
  
?>