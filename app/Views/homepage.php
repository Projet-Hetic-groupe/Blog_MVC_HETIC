
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

<h1>Modifier un post</h1>
<div class="container__background">
    <div class="card">
        <div class="card__form">
            <form method="POST" id="formEditPost">
                <input type="text" name="title" id="titleInput">
                <textarea name="content" id="contentInput"></textarea>
                <input type="submit" value="Modifier"<?php
                if(!isset($_SESSION["user"]))
                {
                    echo "disabled";
                }
                ?>>
            </form>
        </div>
    </div>
</div>
<?php

    foreach ($posts as $post) {

        echo "<br>";
        echo $post->getTitle();
        echo "<br>";
        echo $post->getContent();
        echo "<br>";
        echo $post->getUpdated_at();
        echo "<br>";

        $info = [$post->getId(),$post->getTitle(),$post->getContent(),$post->getAuthorId()];

        if($_SESSION["user"]["id"] == $post->getAuthorId()  || $_SESSION["user"]["role"] == "admin"){
            ?>
            <button onclick='openModalEditPost(<?=json_encode($info) ?>)'>Modifier</button>
<?php
              };
    }
?>
