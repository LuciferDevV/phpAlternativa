
<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    if (empty($username)) {
        die("Ошибка: Имя обязательно!");
    }

    $questions = loadQuestions();
    $userAnswers = $_POST['answers'] ?? [];
    $correctCount = 0;
    $totalQuestions = count($questions);

    foreach ($questions as $index => $q) {
        if (!isset($userAnswers[$index])) continue;

        $userResponse = $userAnswers[$index];
        sort($userResponse);
        sort($q['correct']);

        if ($userResponse === $q['correct']) {
            $correctCount++;
        }
    }

    $score = round(($correctCount / $totalQuestions) * 100, 2);
    saveResult($username, $score);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результат теста</title>
    <link rel="stylesheet" href="submit.css">
</head>
<body>
    <div class="container">
        <h1>Результат теста</h1>
        <div class="result-message">
            <p>Вы ответили правильно на <?= $correctCount ?> из <?= $totalQuestions ?> вопросов.</p>
            <p>Ваш результат: <?= $score ?>%</p>
        </div>
        <a href="dashboard.php" class="view-results-btn">Посмотреть результаты</a>
    </div>
</body>
</html>
