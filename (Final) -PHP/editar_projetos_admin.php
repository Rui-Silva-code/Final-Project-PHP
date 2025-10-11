<?php
session_start();
// Ligação à base de dados
include 'basedados.php';
$tecnologia_associada = "";
$status = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $user_id = $_POST['user_id'];
    
    $data_criacao = $_POST['data_criacao'];
    $tecnologia_associada = $_POST['tecnologia_associada'];
    $status = $_POST['status'];
    

    // Atualize os dados do usuário na base de dados

    $sql_update = "UPDATE utilizadores SET tecnologia_associada = '$tecnologia_associada', data_criacao = '$data_criacao', status = '$status'  WHERE user_id = $user_id";
    
    if ($conn->query($sql_update) === TRUE) {
        echo "Dados do usuário atualizados com sucesso.";
    } else {
        echo "Erro na atualização: " . $conn->error;
    }
}

// Recupere as informações do usuário com base no ID
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $sql = "SELECT * FROM utilizadores WHERE user_id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];
        $data_criacao = $row['data_criacao'];
        $tecnologia_associada = $row['tecnologia_associada'];
        $status = $row['status'];
    } else {
        echo "Usuário não encontrado.";
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>Editar Projetos</title>
    <style>
        body {
            margin: 0px 250px; 
            background: rgb(255,216,130);
            background: linear-gradient(90deg, rgba(255,216,130,1) 5%, rgba(171,232,252,1) 28%, rgba(163,255,167,1) 67%, rgba(255,165,165,1) 94%);
        }
    </style>
</head>
<body>
    <h2>Editar Projetos</h2>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <label for="data_criacao">Data de Criação:</label>
        <input type="date" id="data_criacao" name="data_criacao" value="<?php echo $data_criacao; ?>" required><br><br>

        <label for="tecnologia_associada">Tecnologia Associada:</label>
        <input type="text" id="tecnologia_associada" name="tecnologia_associada" value="<?php echo $tecnologia_associada; ?>" required><br><br>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="marcado" <?php if ($status == "marcado") echo "selected"; ?>>Marcado</option>
            <option value="em_progresso" <?php if ($status == "em_progresso") echo "selected"; ?>>Em Progresso</option>
            <option value="terminado" <?php if ($status == "terminado") echo "selected"; ?>>Terminado</option>
        </select><br><br>
        <input type="submit" value="Salvar Alterações">
    </form>

    <p><a href="perfil_admin.php">Voltar para a Página do Administrador</a></p>
</body>
</html>
