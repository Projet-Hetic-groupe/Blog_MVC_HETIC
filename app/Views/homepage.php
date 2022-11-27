<nav>
    <h1>HETIC</h1>
    <?php
    if (isset($_SESSION["user"])) {?>
            <div>
                <a href="/logout">Se déconnecter</a>
                <?php if($_SESSION["user"]["role"]=="admin"){ ?>
                <a href="/admin/dashboard">Admin Dashboard</a>
                <?php
                }
                ?>
            </div>

        <?php
    }else{ ?>
        <a href="/login">Se Connecter</a>
        <a href="/register">S'inscrire</a>
        <?php
    };
    ?>
</nav>
<!---->
<!--<h1>Hello World-->
<!--    --><?php
//        if(isset($_SESSION["user"])){
//            echo $_SESSION["user"]["login"];
//        }
//    ?>
<!--</h1>-->

<form action="/add/post" method="POST" enctype="multipart/form-data" id="formAddPost">

    <input type="text" placeholder="Titre du post" name="title">
    <textarea name="content"></textarea>
    <input type="file" name="image" id="image">
    <input class="submit button"type="submit" value="Poster" <?php
    if(!isset($_SESSION["user"]))
    {
        echo "disabled";
    }
    ?>>
</form>

<div class="container__background" id="container__background">

    <div class="card" id="cardEditPost">

        <div class="card__form" id="card__formEditPost">
            <button class="closeModal" onclick="closeModal()">Close</button>
            <h2>Modifier le Post</h2>
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

    <div class="card" id="cardEditComment">
        <div class="card__form" id="card__formEditComment">
            <button class="closeModal" onclick="closeModal()">Close</button>
            <h2>Modifier le Commentaire</h2>
            <form method="POST" id="formEditComment">
                <textarea name="content" id="contentInputComment"></textarea>
                <input type="submit" value="Modifier"<?php
                if(!isset($_SESSION["user"]))
                {
                    echo "disabled";
                }
                ?>>
            </form>
        </div>
    </div>

    <div class="card" id="cardDeletePost">
        <div class="card__form" id="card__formDeletePost">
            <button class="closeModal" onclick="closeModal()">Close</button>
            <h2>Êtes-vous sûr de supprimer ce post</h2>
            <form method="POST" id="formDeletePost">
                <button onclick="closeModal()">Annuler</button>
                <input type="submit" value="Supprimer" name="delete">
            </form>
        </div>
    </div>

    <div class="card" id="cardDeleteComment">
        <div class="card__form" id="card__formDeleteComment">
            <button class="closeModal" onclick="closeModal()">Close</button>
            <h2>Êtes-vous sûr de supprimer ce commentaire</h2>
            <form method="POST" id="formDeleteComment">
                <button onclick="closeModal()">Annuler</button>
                <input type="submit" value="Supprimer" name="delete">
            </form>
        </div>
    </div>

    <div class="card" id="cardAddComment">
        <div class="card__form" id="card__formAddComment">
            <button class="closeModal" onclick="closeModal()">Close</button>
            <h2>Ajouter un commenter</h2>
            <form method="POST" id="formAddComment">
                <textarea name="content"></textarea>
                <input type="submit" value="Commenter" <?php
                if(!isset($_SESSION["user"]))
                {
                    echo "disabled";
                }
                ?>>
            </form>
        </div>
    </div>

    <div class="card" id="cardAddAnswer">
        <div class="card__form" id="card__formAddAnswer">
            <button class="closeModal" onclick="closeModal()">Close</button>
            <h2>Répondre</h2>
            <form method="POST" id="formAddAnwser">
                <textarea name="content"></textarea>
                <input type="submit" value="Répondre" <?php
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

        echo '<div class="big-container-post">';
        if($post->getImage()!= NULL){
            echo "<br>";
        ?>

        <img src="<?= $post->getImage() ?>">
        <?php
            echo "<br>";
        }
        echo "<h3>Titre : ".$post->getTitle() ."</h3>";
        echo "<p>Contenue : ".$post->getContent()."</p>";
        echo "<div class='info-container'>";
        echo "<p class='info'>Publié le  : " .$post->getUpdated_at()."</p>";
        echo "<p class='info'>Rédiger par  : " .$post->getAuthor()."</p>";
        echo"</div>";
        $infoEditPost = [$post->getId(),$post->getTitle(),$post->getContent(),$post->getAuthorId()];
        $infoDeletePost = [$post->getId(),$post->getAuthorId()];
        if(isset($_SESSION["user"]) && ($_SESSION["user"]["id"] == $post->getAuthorId()  || $_SESSION["user"]["role"] == "admin")){

            ?>
            <button onclick='openModalEditPost(<?=json_encode($infoEditPost) ?>)'>Modifier</button>
            <button onclick='openModalDeletePost(<?= json_encode($infoDeletePost)?>)'>Supprimer</button>
<?php
              };
        if(isset($_SESSION['user'])){?>
            <button onclick='openModalAddComment(<?= $post->getId() ?>)'>Ajouter un commentaire</button>
        <?php

        }
        echo "<h4> Commentaire  : </h4>";
        foreach ($comments as $comment){
            if($post->getId() == $comment->getPostId()){
                if($comment->getCommentId() != null){
                    echo "<p class='content'>Réponse au commentaire N°".$comment->getCommentId()."<br>" . $comment->getContent()."</p>";
                }else{
                    echo "<p class='content'>Commentaire N°". $comment->getId()."<br>" . $comment->getContent()."</p>";
                }
                echo "<div class='info-container'>";
                echo "<p class='info'>Publié le  : " .$comment->getUpdated_at()."  </p>";
                echo "<p class='info'>Rédiger par  : " .$comment->getAuthor()."</p>";
                echo "</div>";
                $infoEditComment = [$comment->getId(),$comment->getContent(),$comment->getAuthorId()];
                $infoDeleteComment = [$comment->getId(),$comment->getAuthorId()];
                if(isset($_SESSION["user"]) && ($_SESSION["user"]["id"] == $comment->getAuthorId()  || $_SESSION["user"]["role"] == "admin")){
          ?>
                <button onclick='openModalEditComment(<?= json_encode($infoEditComment) ?>)'>Modifier</button>
                <button onclick='openModalDeleteComment(<?= json_encode($infoDeleteComment)?>)'>Supprimer</button>
<?php
                };
                $infoAddAnswer = [$post->getId(),$comment->getId()];
                if(isset($_SESSION['user'])){?>
                    <button onclick='openModalAddAnswer(<?= json_encode($infoAddAnswer) ?>)'>Ajouter une réponse</button>
                    <?php
                }
            }
        }
        echo "</div>";
    }
?>
