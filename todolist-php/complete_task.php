<?php
session_start();

if (isset($_GET['index'])) {
    $index = $_GET['index'];
    if (isset($_SESSION['tasks'][$index])) {
        $_SESSION['tasks'][$index]['done'] = true;
    }
}

header('Location: index.php');
exit;
