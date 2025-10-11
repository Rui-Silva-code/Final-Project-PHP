<?php
session_start();

// Verifique se o usuário está autenticado como administrador
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirecionar para a página de login se não estiver autenticado
    exit();
}

// Verifique se o ID da consulta foi especificado na URL
if (!isset($_GET['consulta_id'])) {
    die("ID da consulta não especificado.");
}

// Recupere o ID da consulta da URL
$consulta_id = $_GET['consulta_id'];

// Ligação à base de dados
include 'basedados.php';

// Exclua a consulta do banco de dados
$sql = "DELETE FROM consultas WHERE id = $consulta_id";

if ($conn->query($sql) === TRUE) {
    echo "Consulta excluída com sucesso. <a href='perfil_admin.php'>Voltar à página do administrador</a>";
} else {
    echo "Erro ao excluir a consulta: " . $conn->error;
}

$conn->close();
?>
