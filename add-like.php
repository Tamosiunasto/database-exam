<?php
$mysql = new mysqli('localhost', 'root', 'root', 'database_exam');
$mysql->query("INSERT INTO likes (superhero_from, superhero_to) VALUES ('" . htmlspecialchars($_GET['superhero_from']) . "','" . htmlspecialchars($_GET['superhero_to']) . "')");

header("Location: index.php");
