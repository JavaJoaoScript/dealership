<?php
// Conectando ao banco de dados
$db_host = "localhost";
$db_user = "root";
$db_pass = "automacao";
$db_name = "granncar";
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Verificando se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
  die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Buscando os agendamentos na tabela "agendamentos"
$sql = "SELECT * FROM agendamentos";
$result = $conn->query($sql);

// Verificando se a consulta retornou resultados
if ($result->num_rows > 0) {
  // Exibindo os agendamentos em uma tabela
  echo "<table>";
  echo "<tr><th>id</th><th>nome</th><th>email</th><th>telefone</th><th>data</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nome"] . "</td><td>" . $row["email"] . "</td><td>" . $row["telefone"] . "</td><td>" . $row["data"] . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "Nenhum agendamento encontrado.";
}

// Fechando a conexão com o banco de dados
$conn->close();
?>
