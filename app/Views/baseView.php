<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--  Injection ici de notre titre (dans base Controller) -->
    <title><?= $_pageTitle; ?></title>
    <link rel="stylesheet" href=<?= $_pageStyle; ?>>
    <script src="../public/js/app.js"></script>
</head>

<body>
    <nav>
        <a href="/login">Se Connecter</a>
        <a href="/logout">Se déconnecter</a>
        <a href="/admin/dashboard">Admin</a>
    </nav>

    <?php
    if (isset($_SESSION["user"])) {
        echo "<p>Connecter <p>";
    }
    ?>
    <!--   Injection ici de la variabke view (dans base Controller) -->
    <?= $_pageContent; ?>
</body>

</html>