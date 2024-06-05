<?php
session_start();
include('db.php');
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['add_gasto'])) {
    $valor = $_POST['valor'];
    $data = $_POST['data'];
    $categoria = $_POST['categoria'];
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO transacao (valor, data, categoria, tipo, user_id) VALUES ('$valor', '$data', '$categoria', 'gasto', '$user_id')";
    mysqli_query($conn, $query);
    header('Location: gastos.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Gasto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Add Gasto</h1>
        <form method="POST" action="">
            <input type="number" name="valor" placeholder="Valor" required>
            <input type="date" name="data" placeholder="Data" required>
            <input type="text" name="categoria" placeholder="Categoria" required>
            <button type="submit" name="add_gasto">Add Gasto</button>
        </form>
    </div>
</body>
</html>