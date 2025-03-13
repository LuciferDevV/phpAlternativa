<?php

define("QUESTIONS_FILE", "data/questions.json");
define("RESULTS_FILE", "data/results.json");

/**
 * Загружает вопросы из JSON-файла.
 * @return array
 */
function loadQuestions() {
    return json_decode(file_get_contents(QUESTIONS_FILE), true);
}

/**
 * Сохраняет результаты тестирования.
 * @param string $username
 * @param float $score
 * @return void
 */
function saveResult($username, $score) {
    $results = loadResults();
    $results[] = ['username' => $username, 'score' => $score];
    file_put_contents(RESULTS_FILE, json_encode($results, JSON_PRETTY_PRINT));
}

/**
 * Загружает результаты из JSON-файла.
 * @return array
 */
function loadResults() {
    return file_exists(RESULTS_FILE) ? json_decode(file_get_contents(RESULTS_FILE), true) : [];
}
