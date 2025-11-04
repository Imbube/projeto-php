<?php
session_start();

if (!isset($_POST['task']) || trim($_POST['task']) === '') {
    header('Location: index.php');
    exit;
}

$task = htmlspecialchars(trim($_POST['task']));

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

$_SESSION['tasks'][] = [
    'text' => $task,
    'done' => false
];

header('Location: index.php');
exit;
