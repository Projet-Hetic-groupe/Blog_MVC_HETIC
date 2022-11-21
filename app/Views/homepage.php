<h1>Hello World </h1>

<?php
    foreach ($posts as $post) {
        echo $post->getTitle();
    }
?>
