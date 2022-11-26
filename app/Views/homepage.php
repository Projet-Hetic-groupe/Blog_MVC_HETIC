
<h1>Hello World
    <?php
        if(isset($_SESSION["user"])){
            echo $_SESSION["user"]["login"];
        }
    ?>
</h1>

<form action="/add/post" method="POST">
    <input type="text" placeholder="Titre du post" name="title">
    <textarea name="content"></textarea>
    <input type="submit" value="Poster" <?php
    if(!isset($_SESSION["user"]))
    {
        echo "disabled";
    }
    ?>>
</form>
<?php

    foreach ($posts as $post) {
        echo "<br>";
        echo $post->getTitle();
        echo "<br>";
        echo $post->getContent();
        echo "<br>";

    }
?>
