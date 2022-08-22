<section class="accueil">

    <?php if(isset($_SESSION['user'])): ?>
        <div class="account-frame">
            <img class="avatar-img" src="<?= $_SESSION['avatar'] ?>" alt="avatar-utilisateur">
            <h1 class="center"><span> <?= $users['first_name'] ?> <?= $users['last_name'] ?></span></h1>
        </div>

        <form class="login" method="POST">
        <input name="avatar" id="avatar" type="text" value="<?= $users['avatar'] ?>">
            <label for="first_name">Prénom</label>
            <input name="first_name" id="first_name" type="text" value="<?= $users['first_name'] ?>">
            <label for="last_name">Nom</label>
            <input name="last_name" id="last_name" type="text" value="<?= $users['last_name'] ?>">
            <label for="email">Adresse email</label>
            <input name="email" id="email" type="email" value="<?= $users['email'] ?>">
            <input name="password" id="password" type="hidden" value="<?= $users['password'] ?>">
            <button class="gray-btn" type="submit">Enregistrer</button>
        </form>
    <?php endif; ?>     

    <a href="newpassword">Changer le mot de passe</a>

</section>