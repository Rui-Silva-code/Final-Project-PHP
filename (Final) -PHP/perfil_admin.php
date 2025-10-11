<?php
session_start();

// Ligação à base de dados
include 'basedados.php';

// Verificar se o usuário está autenticado como administrador
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirecionar para a página de login se não estiver autenticado
    exit();
}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter dados do formulário, com verificação de existência das chaves
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : null;
    $data_criacao = isset($_POST['data_criacao']) ? $_POST['data_criacao'] : null;
    $tecnologia_associada = isset($_POST['tecnologia_associada']) ? $_POST['tecnologia_associada'] : null;
    $status = isset($_POST['status']) ? $_POST['status'] : null;

    // Verificar se os dados necessários foram fornecidos
    if ($user_id && $data_criacao && $tecnologia_associada && $status && isset($_FILES['user_image'])) {
        // Processar a imagem
        $image_name = $_FILES['user_image']['name'];
        $image_tmp = $_FILES['user_image']['tmp_name'];
        $image_path = "imagens/" . $image_name;

        if (move_uploaded_file($image_tmp, $image_path)) {
            // Consulta para inserir um novo projeto na tabela projetos
            $sql_insert_projeto = "INSERT INTO projetos (user_id, data_criacao, tecnologia_associada, status, imagem) VALUES (?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql_insert_projeto);
            $stmt->bind_param("issss", $user_id, $data_criacao, $tecnologia_associada, $status, $image_path);

            if ($stmt->execute()) {
                echo "<p>Projeto registrado com sucesso.</p>";
            } else {
                echo "Erro ao registrar projeto: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Erro ao fazer upload da imagem.";
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}

// Consulta para recuperar informações de todos os projetos
$sql_projetos = "SELECT * FROM projetos";
$result_projetos = $conn->query($sql_projetos);

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>Página do Administrador</title>
    <style>
        body {
            margin: 0px 250px;
            background: linear-gradient(90deg, rgba(255,216,130,1) 5%, rgba(171,232,252,1) 28%, rgba(163,255,167,1) 67%, rgba(255,165,165,1) 94%);
        }
        .cabecalho {
            text-align: center;
        }
        .primeira, .terceira {
            width: 45%;
            height: 400px;
            float: left;
        }
        .segunda {
            margin-top: 600px;
            width: 100%;
            height: 400px;
            text-align: center;
            border-top: 2px solid black;
        }
        #registo {
            float: right;
            text-decoration: none;
            color: blue;
            font-size: 15px;
        }
        form {
            text-align: left;
            margin-left: 500px;
            margin-top: 50px;
        }
        #botaoprojeto {
            height: 30px;
            width: 130px;
        }
        h1 {
            margin-left: 100px;
        }
    </style>
</head>
<body>
    <p id="conta"><a id="registo" href="index.php">Terminar Sessão</a></p>
    <div class="cabecalho">
        <h1>Perfil do Administrador</h1>
        <p><img src="imagens/admin1.jpg" width="20%" height="auto" style="border-radius:50%;"></p>
    </div>
    <div class="primeira">
        <?php
        // Ligação à base de dados
        include 'basedados.php';

        // Consulta para recuperar informações de todos os usuários
        $sql_users = "SELECT * FROM utilizadores";
        $result_users = $conn->query($sql_users);

        if ($result_users->num_rows > 0) {
            echo "<h3>Informações de Todos os Utilizadores:</h3>";
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Nome</th><th>Apelido</th><th>Nome de Utilizador</th><th>E-mail</th><th>Ações</th></tr>";

            while ($row = $result_users->fetch_assoc()) {
                $user_id = $row['user_id'];
                $nome = $row['nome'];
                $apelido = $row['apelido'];
                $user_name = $row['user_name'];
                $email = $row['email'];

                echo "<tr><td>$user_id</td><td>$nome</td><td>$apelido</td><td>$user_name</td><td>$email</td>";
                echo "<td><a href='editar_perfil_admin.php?user_id=$user_id'>Editar</a> | <a href='excluir_utilizador_admin.php?user_id=$user_id'>Excluir</a></td></tr>";
            }

            echo "</table>";
        } else {
            echo "<p>Nenhum usuário encontrado.</p>";
        }

        // Consulta para listar todas as consultas marcadas
        $sql_consultas = "SELECT * FROM consultas";
        $result_consultas = $conn->query($sql_consultas);

        if ($result_consultas->num_rows > 0) {
            echo "<h3>Consultas Marcadas:</h3>";
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>ID do Utilizador</th><th>Data</th><th>Horário</th><th>Ações</th></tr>";

            while ($row = $result_consultas->fetch_assoc()) {
                $consulta_id = $row['id'];
                $user_id = $row['user_id'];
                $data = $row['data'];
                $horario = $row['horario'];

                echo "<tr><td>$consulta_id</td><td>$user_id</td><td>$data</td><td>$horario</td>";
                echo "<td><a href='editar_consulta_admin.php?consulta_id=$consulta_id'>Editar</a> | <a href='excluir_consulta_admin.php?consulta_id=$consulta_id'>Excluir</a></td></tr>";
            }

            echo "</table>";
        } else {
            echo "<p>Nenhuma consulta encontrada.</p>";
        }

        $conn->close();
        ?>
    </div>
    <div class="terceira">
        <?php
        // Ligação à base de dados
        include 'basedados.php';

        // Consulta para listar todos os projetos
        $sql_projetos = "SELECT * FROM projetos";
        $result_projetos = $conn->query($sql_projetos);

        if ($result_projetos->num_rows > 0) {
            echo "<h3>Projetos Registados:</h3>";
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>ID do Utilizador</th><th>Data</th><th>Tecnologia Associada</th><th>Imagem</th><th>Status</th><th>Ações</th></tr>";

            while ($row = $result_projetos->fetch_assoc()) {
                $id_projeto = $row['id_projeto'];
                $user_id = $row['user_id'];
                $data_criacao = $row['data_criacao'];
                $tecnologia_associada = $row['tecnologia_associada'];
                $imagem = $row['imagem'];
                $status = $row['status'];

                echo "<tr><td>$id_projeto</td><td>$user_id</td><td>$data_criacao</td><td>$tecnologia_associada</td><td>$imagem</td><td>$status</td>";
                echo "<td><a href='editar_projetos_admin.php?consulta_id=$id_projeto'>Editar</a> | <a href='
                <!-- Continuando o código anterior -->
                <a href='excluir_projetos_admin.php?consulta_id=$id_projeto'>Excluir</a></td></tr>";
                            }
                
                            echo "</table>";
                        } else {
                            echo "<p>Nenhum projeto encontrado.</p>";
                        }
                
                        $conn->close();
                        ?>
                    </div>
                
                    <div class="segunda">
                        <!-- Seção para registrar um novo projeto -->
                        <h3>Registrar Novo Projeto:</h3>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                            <!-- Certifique-se de incluir um campo oculto para armazenar o ID do usuário -->
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                            
                            <label for="data_criacao">Data de Criação:</label>
                            <input type="date" id="data_criacao" name="data_criacao" required><br><br>
                
                            <label for="tecnologia_associada">Tecnologia Associada:</label>
                            <input type="text" id="tecnologia_associada" name="tecnologia_associada" required><br><br>
                
                            <label for="status">Status:</label>
                            <select id="status" name="status">
                                <option value="marcado">Marcado</option>
                                <option value="em_progresso">Em Progresso</option>
                                <option value="terminado">Terminado</option>
                            </select><br><br>
                
                            <label for="user_image">Imagem do Projeto:</label>
                            <input type="file" id="user_image" name="user_image" accept="image/*" required><br><br>
                
                            <!-- Adicione campos adicionais conforme necessário -->
                
                            <input id="botaoprojeto" type="submit" value="Registrar Projeto">
                        </form>
                    </div>
                </body>
                </html>
                