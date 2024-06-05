<?php
session_start();
include('db.php');
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$query = "SELECT * FROM investimento WHERE user_id=" . $_SESSION['user_id'];
$result = mysqli_query($conn, $query);
$investimentos = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investimentos</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Investimentos</h1>
        <canvas id="investimentosChart"></canvas>
        <ul>
            <?php foreach ($investimentos as $investimento): ?>
                <li><?php echo $investimento['nome'] . ' - ' . $investimento['valor_atual'] . ' - ' . $investimento['retorno']; ?></li>
            <?php endforeach; ?>
        </ul>
        <button onclick="location.href='add_investimento.php'">Add Investimento</button>
    </div>
    <script>
        const ctx = document.getElementById('investimentosChart').getContext('2d');
        const investimentosChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [/* Add labels here */],
                datasets: [{
                    label: 'Investimentos',
                    data: [/* Add data here */],
                    borderColor: 'rgba(75, 192, 192, 1)',
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