<h1>Register</h1>

<h1>Ajouter un utilisateur</h1>
<div class="container__background">
    <div class="card">
        <div class="card__form">
            <form action="/register" method="POST" id="formAddUser">
                <input type="text" name="lastname" id="lastname" placeholder="Nom">
                <input type="text" name="firstname" id="firstname" placeholder="Prénom">
                <input type="text" name="login" id="login" placeholder="login">
                <input type="password" name="password" id="password" placeholder="Mot de passe">
                <label for="user">Utilisateur</label>
                <input type="radio" name="role" id="user" value="user" checked>
                <input type="submit" value="Ajouter Utilisateur">
            </form>
        </div>
    </div>
</div>

<?php


?>