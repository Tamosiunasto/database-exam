<?php
$joker_id = 1;
$mysql = new mysqli('localhost', 'root', 'root', 'database_exam');
$joker = $mysql->query("SELECT * FROM superheroes WHERE id = $joker_id")->fetch_assoc();
$superheroes = $mysql->query("SELECT * FROM superheroes");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Database Evaluation</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
<header>
    <nav>
        <a href="./index.php">Superheroes</a>
        <a href="./profile.php">My profile</a>
    </nav>
    Logged in as: <b>Joker</b>
</header>
<main>
    <h1>Superheroes</h1>
    <?php
    foreach ($superheroes as $superhero) {
        ?>
        <h2> <?php echo $superhero["nickname"] ?> </h2>
        <a href="./profile.php?superhero_id=<?php echo $superhero["id"] ?>">Visit profile</a> or
        <a href="./add-like.php?superhero_from=<?php echo $joker['id']; ?>&superhero_to=<?php echo $superhero['id'] ?>'">
            Like <small>(<?php echo $mysql->query("SELECT COUNT(id) FROM likes WHERE superhero_to ='" . $superhero['id'] . "'")->fetch_assoc()['COUNT(id)']; ?>)</small>
        </a>
        <?php
    }
    ?>
</main>
<footer>
    <i>Superheroes also get lonely.</i>
</footer>
</body>
</html>
