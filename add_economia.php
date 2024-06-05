<?php
session_start();
include('db.php');
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['add_economia'])) {
    $valor = $_POST['valor'];
    $data = $_POST['data'];
    $descricao = $_POST['descricao'];
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO economia (valor, data, descricao, user_id) VALUES ('$valor', '$data', '$descricao', '$user_id')";
    mysqli_query($conn, $query);
    header('Location: economias.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Economia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Add Economia</h1>
        <form method="POST" action="">
            <input type="number" name="valor" placeholder="Valor" required>
            <input type="date" name="data" placeholder="Data" required>
            <input type="text" name="descricao" placeholder="Descrição" required>
            <button type="submit" name="add_economia">Add Economia</button>
        </form>
    </div>
</body>
</html>