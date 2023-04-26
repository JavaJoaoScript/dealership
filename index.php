<?php
session_start();

if (isset($_SESSION['mensagem'])) {
    echo "<script>alert('{$_SESSION['mensagem']}');</script>";
    unset($_SESSION['mensagem']);
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>]

    <!-- HEADER  -->
<header class="header">
    <div id="menu-btn" class="fas fa-bars"></div>
    <a href="#" class="logo"> <img src="tirar_fundoremovebg-preview (1).png" alt="Logo da Grann Automoveis">
    <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#vehicles">Carros</a>
        <a href="#services">Motos</a>
        <a href="#footer">Contato</a>
    </nav>
    <div id="login-btn">
        <button class="btn">Agende uma Visita</button>
        <i class="far fa-user"></i>
    </div>
</header> 

  <!-- AGENDAR VISITA  -->
    
<div class="login-form-container">

    <span id="close-login-form" class="fas fa-times"></span>

    <form action="processa_agendamento.php" method="POST">
        <h3>Agendar visita</h3>
        <input type="text" placeholder="Nome completo" class="box" name="nome" required>
        <input type="email" placeholder="E-mail" class="box" name="email" required>
        <input type="tel" placeholder="Telefone" class="box" name="telefone" required>
        <input type="date" placeholder="Data da visita" class="box" name="data" required>
        <textarea placeholder="Descrição da Visita (Informe o modelo do veículo!)" class="box" name="descricao" required></textarea>
        <input type="submit" value="Agendar" class="btn">
    </form>

</div>
<section class="home" id="home">
</section>

 <!-- AREA DOS ICONES   -->

<section class="icons-container">
    <div class="icons">
        <i class="fas fa-map-marker-alt"></i>
        <div class="content">
            <h3>10+</h3>
            <p>unidades espalhadas pelo Brasil</p>
        </div>
    </div>
    <div class="icons">
        <i class="fas fa-car"></i>
        <div class="content">
            <h3>1000+</h3>
            <p>carros vendidos</p>
        </div>
    </div>
    <div class="icons">
        <i class="fas fa-users"></i>
        <div class="content">
            <h3>5000+</h3>
            <p>clientes satisfeitos</p>
        </div>
    </div>
    <div class="icons">
        <i class="fas fa-car"></i>
        <div class="content">
            <h3>1000+</h3>
            <p>carros novos em estoque</p>
        </div>
    </div>
</section>

 <!-- NOSSOS CARROS  -->

<section class="vehicles" id="vehicles">

    <h1 class="heading"> Nossos <span>Carros</span> </h1>

    <div class="swiper vehicles-slider">

        <div class="swiper-wrapper">

            <?php

$servername = "localhost";
$username = "root";
$password = "automacao";
$dbname = "granncar";

            // Conexão com a base de dados
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }
            
            // Selecionar todos os carros
            $sql = "SELECT * FROM carros";
            $result = $conn->query($sql);

            // Loop pelos resultados e gerar HTML para cada carro
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="swiper-slide box">
                        <img src="<?php echo $row["imagem"]; ?>" alt="">
                        <div class="content">
                            <h3><?php echo $row["nome"]; ?></h3>
                            <div class="price"> <span>Preço: </span> R$<?php echo $row["preco"]; ?></div>
                            <p>
                                <?php echo $row["descricao"]; ?>
                            </p>
                            <a href="#" class="btn">Mais Informações</a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "Nenhum carro encontrado";
            }
            $conn->close();
            ?>
            
        </div>

        <div class="swiper-pagination"></div>

    </div>

</section>


<hr></hr>

 <!-- NOSSAS MOTOS  -->


<section class="vehicles" id="vehicles">

    <h1 class="heading"> Nossas <span>Motos</span> </h1>

    <div class="swiper vehicles-slider">

        <div class="swiper-wrapper">

            <?php

                $servername = "localhost";
                $username = "root";
                $password = "automacao";
                $dbname = "granncar";

                // Conexão com a base de dados
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Conexão falhou: " . $conn->connect_error);
                }
                
                // Selecionar todas as motos
                $sql = "SELECT * FROM motos";
                $result = $conn->query($sql);

                // Loop pelos resultados e gerar HTML para cada moto
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="swiper-slide box">
                            <img src="<?php echo $row["imagem"]; ?>" alt="">
                            <div class="content">
                                <h3><?php echo $row["nome"]; ?></h3>
                                <div class="price"> <span>Preço: </span> R$<?php echo $row["preco"]; ?></div>
                                <p>
                                    <?php echo $row["descricao"]; ?>
                                </p>
                                <a href="#" class="btn">Mais Informações</a>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "Nenhuma moto encontrada";
                }
                $conn->close();
            ?>
            
        </div>

        <div class="swiper-pagination"></div>

    </div>

</section>





<section class="footer" id="footer">

    <div class="box-container">

        <div class="box">
            <h3>Contato</h3>
            <a href="#"> <i class="fas fa-phone"></i> +55 11 98765-4321 </a>
            <a href="#"> <i class="fas fa-envelope"></i> contato@minhaconcessionaria.com </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Rua Concessionária, 123 - São Paulo/SP </a>
        </div>
    
        <div class="box" style="text-align: right;">
            <h3>Redes Sociais</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> Facebook </a>
            <a href="#"> <i class="fab fa-instagram"></i> Instagram </a>
        </div>
    </div>
</section>










<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>


</body>
</html>