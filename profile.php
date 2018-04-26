<?php
$joker_id = 1;
$superhero_id = htmlspecialchars($_GET['superhero_id']);
$mysql = new mysqli('localhost', 'root', 'root', 'database_exam');
$joker = $mysql->query("SELECT * FROM superheroes WHERE id = $joker_id")->fetch_assoc();
$superhero = $mysql->query("SELECT * FROM superheroes WHERE id = $superhero_id")->fetch_assoc();
$comments = $mysql->query("SELECT * FROM comments LEFT JOIN superheroes ON superheroes.id = comments.superhero_from WHERE superhero_to = $superhero_id");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Database Evaluation</title>

    <link rel="stylesheet" href="./css/profile.css">
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
    <h1><?php echo $superhero['nickname']; ?></h1>
    <h2>Profile information</h2>
    <dl>
        <dt>Full name:</dt>
        <dd><?php echo $superhero['full_name']; ?></dd>
        <dt>Nickname:</dt>
        <dd><?php echo $superhero['nickname']; ?></dd>
        <dt>Superpower:</dt>
        <dd><?php echo $superhero['superpower']; ?></dd>
        <dt>Description:</dt>
        <dd><?php echo $superhero['description']; ?></dd>
        <dt></dt>
    </dl>
    <h2>Edit profile</h2>
    <form action="./save-profile.php" method="post">
        <input type="hidden" name="superhero_id" value="<?php echo $superhero['id']; ?>"/>

        <label for="full-name">Full name</label>
        <input type="text" name="full_name" id="full-name" value="<?php echo $superhero['full_name']; ?>"/><br/>

        <label for="nickname">Nickname</label>
        <input type="text" name="nickname" id="nickname" value="<?php echo $superhero['nickname']; ?>"/><br/>

        <label for="superpower">Superpower</label>
        <input type="text" name="superpower" id="superpower" value="<?php echo $superhero['superpower']; ?>"/><br/>

        <label for="description">Description</label>
        <textarea id="description" name="description"><?php echo $superhero['description']; ?></textarea><br/>

        <button type="submit">Save changes</button>
    </form>
    <h2>Comments</h2>
    <dl>
        <?php
        foreach ($comments as $comment) {
            ?>
            <dt><?php echo $comment['nickname']; ?></dt>
            <dd><?php echo $comment['text']; ?></dd>
            <?php
        }
        ?>
    </dl>
    <h2>Add comment</h2>
    <form action="./add-comment.php" method="post">
        <input type="hidden" name="superhero_from" value="<?php echo $joker['id']; ?>"/>
        <input type="hidden" name="superhero_to" value="<?php echo $superhero_id; ?>"/>

        <label for="comment">Comment</label>
        <textarea id="comment" name="text"></textarea><br/>

        <button type="submit">Save changes</button>
    </form>
</main>
<footer>
    <i>Superheroes also get lonely.</i>
</footer>
</body>
</html>
