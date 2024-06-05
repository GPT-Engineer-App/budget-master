<?php
session_start();
include('db.php');
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['add_investimento'])) {
    $nome = $_POST['nome'];
    $valor_atual = $_POST['valor_atual'];
    $retorno = $_POST['retorno'];
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO investimento (nome, valor_atual, retorno, user_id) VALUES ('$nome', '$valor_atual', '$retorno', '$user_id')";
    mysqli_query($conn, $query);
    header('Location: investimentos.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Investimento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Add Investimento</h1>
        <form method="POST" action="">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="number" name="valor_atual" placeholder="Valor Atual" required>
            <input type="number" name="retorno" placeholder="Retorno" required>
            <button type="submit" name="add_investimento">Add Investimento</button>
        </form>
    </div>
</body>
</html>