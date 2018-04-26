<?php
$mysql = new mysqli('localhost', 'root', 'root', 'database_exam');
$mysql->query("UPDATE superheroes SET full_name = '" . htmlspecialchars($_POST["full_name"]) . "', nickname = '" . htmlspecialchars($_POST['nickname']) . "', superpower = '" . htmlspecialchars($_POST['superpower']) . "', description = '" . htmlspecialchars($_POST['description']) . "' WHERE id = '" . htmlspecialchars($_POST['superhero_id']) . "'");

header("Location: profile.php?superhero_id=" . $_POST['superhero_id']);
