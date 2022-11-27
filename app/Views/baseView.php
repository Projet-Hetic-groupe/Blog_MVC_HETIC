<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--  Injection ici de notre titre (dans base Controller) -->
    <title><?= $_pageTitle; ?></title>
    <link rel="stylesheet" href="../public/css/base.css">
    <link rel="stylesheet" href=<?= $_pageStyle; ?>>
    <script src="../public/js/app.js"></script>
</head>

<body>

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

<!--    --><?php
//    if (isset($_SESSION["user"])) {
//        echo "<p>Connecter <p>";
//    }
//    ?>
    <!--   Injection ici de la variabke view (dans base Controller) -->
    <?= $_pageContent; ?>
</body>

</html>