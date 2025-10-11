<?php
session_start();

// Verifique se o usuário está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirecione para a página de login se não estiver autenticado
    exit();
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
// Verifique se o ID da consulta foi especificado na URL
if (!isset($_GET['id'])) {
//f (!isset($_POST['id'])) {
    die("ID de consulta não especificado.");
}

// Recupere o ID da consulta da URL
$id_consulta = $_GET['id'];

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_consulta = $_POST['id'];
}


// Ligação à base de dados
include 'basedados.php';

// Recupere os detalhes da consulta com base no ID
$user_id = $_SESSION['user_id'];

// Consulta para obter os detalhes da consulta com base no ID da consulta e no ID do usuário
$sql = "SELECT * FROM consultas WHERE id = $id_consulta AND user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $data = $row['data'];
    $horario = $row['horario'];
} else {
    echo "Consulta não encontrada ou não pertence a este usuário.";
    exit();
}

$conn->close();

// Processamento do formulário de edição
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os novos dados da consulta do formulário
    $nova_data = $_POST['data'];
    $novo_horario = $_POST['horario'];
    
// Verifique se a nova data é pelo menos 3 dias no futuro
$hoje = new DateTime();
$data_nova = new DateTime($nova_data);
$intervalo = $hoje->diff($data_nova);
$diferenca_dias = $intervalo->format('%r%a');

if ($diferenca_dias >= 3) {
    // Permitir edição da data
    echo "Data da reserva atualizada para: $nova_data <br>";
    echo "Horário da reserva atualizado para: $novo_horario <br>";
} else {
    // Não permitir edição da data
    echo "A nova data deve ser pelo menos 3 dias no futuro.";
}

// Ligação à base de dados
include 'basedados.php';

    

    // Atualize os dados da consulta no banco de dados
    $sql = "UPDATE consultas SET data = '$nova_data', horario = '$novo_horario' WHERE id = '$id_consulta' AND user_id = '$user_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Consulta atualizada com sucesso.";
    } else {
        echo "Erro ao atualizar a consulta: " . $conn->error;
    }

    
    $conn->close();
}




?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>Editar Consulta</title>
    <style>

body{
margin: 0px 250px; 
background: rgb(255,216,130);
background: linear-gradient(90deg, rgba(255,216,130,1) 5%, rgba(171,232,252,1) 28%, rgba(163,255,167,1) 67%, rgba(255,165,165,1) 94%); 
}
    </style>
</head>
<body>
    <h2>Editar Consulta</h2>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="data">Nova Data da Consulta:</label>
        <input type="date" id="data" name="data" value="<?php echo $data; ?>" required><br><br>

        <label for="horario">Novo Horário da Consulta:</label>
        <input type="time" id="horario" name="horario" value="<?php echo $horario; ?>" required><br><br>
        <input type="text" id="data" name="id" value="<?php echo $id_consulta; ?>" required><br><br>
        <input type="submit" name="s" value="Salvar Alterações" >
    </form>

    <p><a href="perfil_utilizador.php">Voltar para o Perfil</a></p>
</body>
</html>
