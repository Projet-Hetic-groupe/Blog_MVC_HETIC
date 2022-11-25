<h1>Modifier un utilisateur</h1>
<div class="container__background">
    <div class="card">
        <div class="card__form">
            <form method="POST" id="formEditUser">
                <input type="text" name="lastname" id="lastname">
                <input type="text" name="firstname" id="firstname">
                <input type="text" name="login" id="login">
                <label for="user">Utilisateur</label>
                <input type="radio" name="role" id="user" value="user">
                <label for="admin">Admin</label>
                <input type="radio" name="role" id="admin" value="admin">
                <input type="submit" value="Modifier">
            </form>
        </div>
    </div>
</div>


<h1>Ajouter un utilisateur</h1>
<div class="container__background">
    <div class="card">
        <div class="card__form">
            <form action="/admin/add/User" method="POST" id="formAddUser">
                <input type="text" name="lastname" id="lastname" placeholder="Nom">
                <input type="text" name="firstname" id="firstname" placeholder="Prénom">
                <input type="text" name="login" id="login" placeholder="login">
                <input type="password" name="password" id="password" placeholder="Mot de passe">
                <label for="user">Utilisateur</label>
                <input type="radio" name="role" id="user" value="user">
                <label for="admin">Admin</label>
                <input type="radio" name="role" id="admin" value="admin">
                <input type="submit" value="Ajouter Utilisateur">
            </form>
        </div>
    </div>
</div>

<div>
    <form method="POST" id="formDeleteUser">
        <input type="submit" value="Annuler" name="delete">
        <input type="submit" value="Supprimer" name="delete">
    </form>
</div>

<?php

foreach ($users as $user) {

    echo "<h1>" . $user->getId() . ' ' . "</h1>";
    echo $user->getFirstname() . " ";
    echo $user->getLogin() . " ";
?>
    <button onclick='openModalEdit(<?= json_encode($user->getAllInfo()) ?>)'>Modifier</button>
    <button onclick='openModalDelete(<?= $user->getId() ?>)'>Supprimer</button>
<?php } ?>