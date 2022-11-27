
<div class="container__background" style = "display: none" id="container__background">
    <div class="card">
        <div class="card__form">
            <h2>Modifier un utilisateur</h2>
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
                <label for="userRole">Utilisateur</label>
                <input type="radio" name="role" id="userRole" value="user">
                <label for="adminRole">Admin</label>
                <input type="radio" name="role" id="adminRole" value="admin">
                <input type="submit" value="Ajouter Utilisateur">
            </form>
        </div>
    </div>
</div>

<div class="container-deleteUser" style="display: none" id="container-deleteUser">

    <div class="container">
        <button class="closeModal" onclick="closeModalUser()">Close</button>
        <h2>Êtes-vous sûr de supprimer l'utilisateur ?</h2>
        <form method="POST" id="formDeleteUser">
            <button onclick="closeModalUser()">Annuler</button>
            <input type="submit" value="Supprimer" name="delete">
        </form>
    </div>
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