<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro_login";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $telefone = $_POST['phone'];
    $cpf = $_POST['CPF'];
    $senha = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, telefone, cpf, senha) VALUES ('$nome', '$email', '$telefone', '$cpf', '$senha')";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
        // Enviar email de boas-vindas
        // Redirecionar para a página de login ou outra página
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
