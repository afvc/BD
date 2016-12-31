<!---- Acesso à base de bados --->
<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "spotlight"; //Nome da base de dados
    
    // Criar conexão
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Se não ligar à base de dados
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
?>