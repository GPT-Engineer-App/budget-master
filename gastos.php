<?php
session_start();
include('db.php');
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$query = "SELECT * FROM transacao WHERE tipo='gasto' AND user_id=" . $_SESSION['user_id'];
$result = mysqli_query($conn, $query);
$gastos = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Gastos</h1>
        <canvas id="gastosChart"></canvas>
        <ul>
            <?php foreach ($gastos as $gasto): ?>
                <li><?php echo $gasto['valor'] . ' - ' . $gasto['data'] . ' - ' . $gasto['categoria']; ?></li>
            <?php endforeach; ?>
        </ul>
        <button onclick="location.href='add_gasto.php'">Add Gasto</button>
    </div>
    <script>
        const ctx = document.getElementById('gastosChart').getContext('2d');
        const gastosChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [/* Add labels here */],
                datasets: [{
                    label: 'Gastos',
                    data: [/* Add data here */],
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>