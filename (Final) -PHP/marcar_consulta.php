<?php
session_start();

// Verifique se o usuário está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirecione para a página de login se não estiver autenticado
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados da consulta do formulário
    $data = $_POST['data'];
    $horario = $_POST['horario'];

// Ligação à base de dados
include 'basedados.php';

    // Insira os dados da consulta no banco de dados (substitua com sua lógica)
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO consultas (user_id, data, horario) VALUES ('$user_id', '$data', '$horario')";

    if ($conn->query($sql) === TRUE) {
        echo "Consulta marcada com sucesso.";
    } else {
        echo "Erro ao marcar a consulta: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>Marcar Consulta</title>
    <style>

body{
margin: 0px 250px; 
background: rgb(255,216,130);
background: linear-gradient(90deg, rgba(255,216,130,1) 5%, rgba(171,232,252,1) 28%, rgba(163,255,167,1) 67%, rgba(255,165,165,1) 94%); 
}
    </style>
</head>
<body>

 
    <p><a href="perfil_utilizador.php">Voltar para o Perfil</a></p>
</body>
</html>
