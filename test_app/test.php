<?php 
 
include 'functions.php';

$questions = loadQuestions();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Прохождение теста</title>
    <link rel="stylesheet" href="test.css">
</head>
<body>
    <div class="container">
        <h1>Прохождение теста</h1>
        <form action="submit.php" method="post">
            <label>Введите ваше имя:
                <input type="text" name="username" required>
            </label>
            <?php foreach ($questions as $index => $q): ?>
                <fieldset>
                    <legend><?= htmlspecialchars($q['question']) ?></legend>
                    <?php foreach ($q['options'] as $option): ?>
                        <label>
                            <input type="<?= $q['type'] ?>" name="answers[<?= $index ?>][]" value="<?= htmlspecialchars($option) ?>">
                            <?= htmlspecialchars($option) ?>
                        </label><br>
                    <?php endforeach; ?>
                </fieldset>
            <?php endforeach; ?>
            <button type="submit">Отправить</button>
        </form>
    </div>
</body>
</html>
