<?php
$host = 'localhost'; // Endereço do servidor de banco de dados
$user = 'root'; // Nome de usuário do banco de dados
$password = 'automacao'; // Senha do banco de dados
$dbname = 'granncar'; // Nome do banco de dados

// Conexão com o banco de dados
$conn = mysqli_connect($host, $user, $password, $dbname);

// Verifica se a conexão foi estabelecida com sucesso
if (!$conn) {
    die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
}

// Consulta para buscar todos os carros na tabela 'carros'
$sql = 'SELECT id, imagem, nome, preco, descricao, descricao_completa FROM carros';
$result = mysqli_query($conn, $sql);

// Verifica se a consulta retornou algum resultado
if (mysqli_num_rows($result) > 0) {
    // Início da tabela
    $output = '<table class="table">';
    $output .= '<thead>';
    $output .= '<tr>';
    $output .= '<th>ID</th>';
    $output .= '<th>Imagem</th>';
    $output .= '<th>Nome</th>';
    $output .= '<th>Preço</th>';
    $output .= '<th>Descrição</th>';
    $output .= '<th>Descrição Completa</th>';
    $output .= '</tr>';
    $output .= '</thead>';
    $output .= '<tbody>';



  

 // Loop para exibir os carros na tabela
$output .= '<table class="carros">';
while ($row = mysqli_fetch_assoc($result)) {
    $output .= '<tr class="carro">';
    $output .= '<td>' . $row['id'] . '</td>';
    $output .= '<td><img src="' . $row['imagem'] . '"></td>';
    $output .= '<td>' . $row['nome'] . '</td>';
    $output .= '<td>' . $row['preco'] . '</td>';
    $output .= '<td>' . $row['descricao'] . '</td>';
    $output .= '<td>' . $row['descricao_completa'] . '</td>';
    $output .= '<td><a href="editar.php?id=' . $row['id'] . '" class="editar">Editar</a></td>';
    $output .= '<td><a href="excluir.php?id=' . $row['id'] . '" class="excluir">Excluir</a></td>';    

    $output .= '</tr>';
}
$output .= '</table>';


    // Fim da tabela
    $output .= '</tbody>';
    $output .= '</table>';

    // Exibe a tabela na seção 'carros-container'
    echo '<div id="carros-container">' . $output . '</div>';
} else {
    echo 'Nenhum carro encontrado.';
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
