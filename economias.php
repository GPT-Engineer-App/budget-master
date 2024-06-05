<?php
session_start();
include('db.php');
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$query = "SELECT * FROM economia WHERE user_id=" . $_SESSION['user_id'];
$result = mysqli_query($conn, $query);
$economias = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Economias</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Economias</h1>
        <canvas id="economiasChart"></canvas>
        <ul>
            <?php foreach ($economias as $economia): ?>
                <li><?php echo $economia['valor'] . ' - ' . $economia['data'] . ' - ' . $economia['descricao']; ?></li>
            <?php endforeach; ?>
        </ul>
        <button onclick="location.href='add_economia.php'">Add Economia</button>
    </div>
    <script>
        const ctx = document.getElementById('economiasChart').getContext('2d');
        const economiasChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [/* Add labels here */],
                datasets: [{
                    label: 'Economias',
                    data: [/* Add data here */],
                    borderColor: 'rgba(54, 162, 235, 1)',
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