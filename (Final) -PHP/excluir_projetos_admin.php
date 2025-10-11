<?php
session_start();

// Verificar se o usuário está autenticado como administrador
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirecionar para a página de login se não estiver autenticado
    exit();
}

// Verificar se o ID do usuário a ser excluído foi especificado
if (!isset($_GET['user_id'])) {
    die("ID do usuário não especificado.");
}

// Recuperar o ID do usuário da URL
$user_id = $_GET['user_id'];

// Ligação à base de dados
include 'basedados.php';

// Verificar se o usuário tem projetos marcados
$sql_verificar_projetos = "SELECT * FROM projetos WHERE user_id = $user_id";
$result_verificar_projetos = $conn->query($sql_verificar_projetos);

if ($result_verificar_projetos->num_rows > 0) {
    echo "Este usuário não pode ser excluído porque tem projetos marcados.";
    echo "<br><a href='perfil_admin.php'>Voltar para a página de administrador</a>";
    exit();
}

// Consulta para excluir os projetos do usuário
$sql_excluir_projetos = "DELETE FROM projetos WHERE user_id = $user_id";

if ($conn->query($sql_excluir_projetos) === TRUE) {
    echo "Projetos do usuário excluídos com sucesso.<br>";
} else {
    echo "Erro ao excluir os projetos do usuário: " . $conn->error;
}

$conn->close();
?>
