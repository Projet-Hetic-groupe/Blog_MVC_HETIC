
<h1>Hello World
    <?php
        if(isset($_SESSION["user"])){
            echo $_SESSION["user"]["login"];
        }
    ?>
</h1>

<?php
    foreach ($posts as $post) {
        echo "<br>";
        echo $post->getTitle();

    }
?>
