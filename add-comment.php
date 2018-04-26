<?php
$mysql = new mysqli('localhost', 'root', 'root', 'database_exam');
$mysql->query("INSERT INTO comments (text, superhero_from, superhero_to) VALUES ('" . htmlspecialchars($_POST['text']) . "','" . htmlspecialchars($_POST['superhero_from']) . "','" . htmlspecialchars($_POST['superhero_to']) . "')");

header("Location: profile.php?superhero_id=" . htmlspecialchars($_POST['superhero_to']));
