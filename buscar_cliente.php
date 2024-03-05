<?php
// Conectar ao banco de dados MySQL (substitua as informações conforme necessário)
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "empresa";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Processar o formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter o nome do cliente do formulário
    $nome = $_POST["nome"];

    // Consultar o banco de dados para obter os dados do cliente
    $sql = "SELECT * FROM clientes WHERE nome = '$nome'";
    $result = $conn->query($sql);

    // Exibir os dados do cliente, se encontrado
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>Dados do Cliente:</h2>";
        echo "<p>Nome: " . $row["nome"] . "</p>";
        echo "<p>Email: " . $row["email"] . "</p>";
        echo "<p>Telefone: " . $row["telefone"] . "</p>";
        echo "<p>Endereço: " . $row["endereco"] . "</p>";
        echo "<p>Data de cadastro: " . $row["data_cadastro"] . "</p>";
        // Adicione mais campos conforme necessário
    } else {
        echo "<p>Cliente não encontrado.</p>";
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
