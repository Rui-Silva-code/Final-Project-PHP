<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receba os dados do formulário de login (substitua com os dados reais do formulário)
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    // Ligação à base de dados
include 'basedados.php';

    // Consulta para verificar as credenciais do usuário
    $sql = "SELECT user_id FROM utilizadores WHERE user_name = '$user_name' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['user_id']; // Defina a variável de sessão após a autenticação bem-sucedida

        header("Location: perfil_utilizador.php"); // Redireciona para a página de perfil do usuário
        exit();
    } else {
        echo "Nome de usuário ou senha incorretos.";
    }

    $conn->close();
}
?>