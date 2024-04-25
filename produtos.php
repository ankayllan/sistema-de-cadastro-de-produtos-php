<?php
// Informações de conexão com o banco de dados
$host = 'localhost';
$dbname = 'sistema';
$username = 'root';
$password = '';

// Criar conexão
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Selecionar todos os produtos da tabela produtos
$sql = "SELECT nome, descricao, preco, foto FROM produtos";
$result = $conn->query($sql);
?>



<?php

// Exibir os produtos
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="stylesii.css">
</head>

<body>
<div class="col-sm">
        <div class="container" style="width: 18rem;">
        <img src="uploads/<?php echo $row['foto'];?>" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title"><?php echo $row['nome'];?></h5>
            <p class="card-text"><?php echo $row['descricao'];?></p>
            <p class="card-text-preco"><strong>R$ <?php echo $row['preco'];?></strong></p>
            </div>
        </div>
</div>
 
   <?php }
} else {
    echo "Nenhum produto cadastrado.";
}

// Fechar conexão
$conn->close();
?>
</body>
</html>
