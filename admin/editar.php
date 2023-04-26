<?php
// Verifica se o id do registro a ser editado foi passado via GET
if (!isset($_GET['id'])) {
  header('Location: index.html');
  exit();
}

// Conecta ao banco de dados
$conn = mysqli_connect('localhost', 'root', 'automacao', 'granncar');

// Verifica se a conexão foi bem-sucedida
if (!$conn) {
  die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
}

// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {
  // Recebe os dados do formulário
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $nome = mysqli_real_escape_string($conn, $_POST['nome']);
  $preco = mysqli_real_escape_string($conn, $_POST['preco']);
  $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
  $descricao_completa = mysqli_real_escape_string($conn, $_POST['descricao_completa']);

  // Atualiza o registro no banco de dados
  $sql = "UPDATE carros SET nome='$nome', preco='$preco', descricao='$descricao', descricao_completa='$descricao_completa' WHERE id='$id'";
  if (mysqli_query($conn, $sql)) {
    header('Location: index.html');
    exit();
  } else {
    echo 'Erro ao atualizar o registro: ' . mysqli_error($conn);
  }
}

// Seleciona o registro a ser editado
$id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * FROM carros WHERE id='$id'";
$result = mysqli_query($conn, $sql);

// Verifica se o registro foi encontrado
if (mysqli_num_rows($result) == 0) {
  header('Location: listar.php');
  exit();
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Editar registro</title>
</head>
<body>
  <h1>Editar registro</h1>
  <form method="post" action="">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label>Nome:</label>
    <input type="text" name="nome" value="<?php echo $row['nome']; ?>">
    <br>
    <label>Preço:</label>
    <input type="text" name="preco" value="<?php echo $row['preco']; ?>">
    <br>
    <label>Descrição:</label>
    <textarea name="descricao"><?php echo $row['descricao']; ?></textarea>
    <br>
    <label>Descrição completa:</label>
    <textarea name="descricao_completa"><?php echo $row['descricao_completa']; ?></textarea>
    <br>
    <input type="submit" name="submit" value="Salvar">
  </form>
</body>
</html>
