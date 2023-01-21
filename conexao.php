<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "base_dados";
$port = 3306;

try {
    $conn = new PDO("mysql:host=$host;
                        port=$port;
                        dbname=".$dbname,
                        $user,
                        $pass
                    );
}catch(PDOException $err){
    echo "Erro conexão: " . $err->getMessage();
}

?>