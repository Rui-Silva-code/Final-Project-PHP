<?php
// Ligação à base de dados
include 'basedados.php';

// Obter dados do formulário
$nome = $_POST['nome'];
$sobrenome = $_POST['apelido'];

// Supondo que você tenha uma maneira de identificar o usuário logado (por exemplo, usando uma sessão)
$user_id = $_SESSION['user_id']; // Certifique-se de configurar a sessão corretamente

// Atualizar os dados na tabela utilizadores
$sql = "UPDATE utilizadores SET nome = '$nome', sobrenome = '$sobrenome' WHERE user_id = $user_id";

if ($conn->query($sql) === TRUE) {
    echo "Perfil atualizado com sucesso!";
} else {
    echo "Erro ao atualizar o perfil: " . $conn->error;
}

$conn->close();
?>
