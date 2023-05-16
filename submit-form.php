<?php
// Configuração da conexão com o banco de dados
$servername = "containers-us-west-118.railway.app";
$username = "root";
$password = "tPTHQOIGN7dVPqaltU8t";
$dbname = "railway";

// Cria uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Recupera os dados do formulário
$campo1 = $_POST['campo1'];
$campo2 = $_POST['campo2'];

// Prepara e executa a consulta para inserir os dados
$stmt = $conn->prepare("INSERT INTO tabela (campo1, campo2) VALUES (?, ?)");
$stmt->bind_param("ss", $campo1, $campo2);

if ($stmt->execute()) {
    echo "Formulário enviado com sucesso!";
} else {
    echo "Erro ao enviar o formulário: " . $stmt->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>
