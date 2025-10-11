<?php
// session_start();

// Ligação à base de dados
include 'basedados.php';

// Obter dados do formulário
$nome = $_POST['nome'];
$apelido = $_POST['apelido'];
$user_name = $_POST['user_name'];
$email = $_POST['email'];
$raw_password = $_POST['password']; // Password before hashing

// Hashing the password
$hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);

// Consulta para inserir um novo registro na tabela utilizadores
$sql = "INSERT INTO utilizadores (nome, apelido, user_name, email, password, user_type) VALUES (?, ?, ?, ?, ?, 'utilizador')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nome, $apelido, $user_name, $email, $hashed_password);

if ($stmt->execute()) {
    // Redireciona para a página de login após o registro bem-sucedido
    header("Location: login.php");
    exit(); // Certifica-se de que o script seja encerrado após o redirecionamento
} else {
    if ($conn->errno === 1062) {
        echo "Erro: O endereço de e-mail já está em uso. Por favor, escolha outro.";
    } else {
        echo "Erro ao registar: " . $conn->error;
    }
}

$stmt->close();
$conn->close();
?>



