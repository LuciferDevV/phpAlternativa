

<?php
include 'functions.php';

$results = loadResults();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результаты тестирования</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container">
        <h1>Результаты тестирования</h1>
        <table>
            <tr>
                <th>Имя</th>
                <th>Результат (%)</th>
            </tr>
            <?php foreach ($results as $result): ?>
                <tr>
                    <td><?= htmlspecialchars($result['username']) ?></td>
                    <td><?= $result['score'] ?>%</td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="index.php" class="back-btn">На главную</a>
    </div>
</body>
</html>
