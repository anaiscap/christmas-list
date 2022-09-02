<section class="accueil parameters">

    <?php if(isset($_SESSION['user'])): ?>
        <div class="account-frame">
            <img class="avatar-img" src="<?= $avatarsrc['avatar_src'] ?>" alt="avatar-utilisateur">
            <h1 class="center"><span> <?= $users['first_name'] ?> <?= $users['last_name'] ?></span></h1>
        </div>
        <form class="sign-up" method="POST">
        
        <fieldset class="avatar-fieldset">
            <legend>Avatar</legend>
            <div class="avatar-signup">
                <?php foreach($avatars as $avatar): ?>
                    <div class="mylists">
                        <label for='avatar'><img class='avatar' src="<?= htmlspecialchars($avatar['avatar_src']) ?>" alt="<?= htmlspecialchars($avatar['avatar_alt']) ?>"></label>
                        <input type="radio" name="avatar" value="<?= htmlspecialchars($avatar['id_avatar']) ?>" id="avatar"   <?= ($avatar['id_avatar']==$users['avatar'])?"checked":""  ?>><?= htmlspecialchars($stat['status']) ?>  
                    </div>
                <?php endforeach; ?>
                </div>
        </fieldset>
        <div class="avatar-fieldset">
        <h2>Paramètres du compte</h2>
        <fieldset >
            <p><label for="first_name">Prénom</label>
            <input name="first_name" id="first_name" type="text" value="<?= $users['first_name'] ?>"></p>
            <p><label for="last_name">Nom</label>
            <input name="last_name" id="last_name" type="text" value="<?= $users['last_name'] ?>"></p>
            <p><label for="email">Adresse email</label>
            <input name="email" id="email" type="email" value="<?= $users['email'] ?>"></p>
            <p><?= $users['msg2_email'] ?></p>
            <input name="password" id="password" type="hidden" value="<?= $users['password'] ?>">
            <button class="gray-btn" type="submit">Enregistrer</button>
        </fieldset>
        </div>
        </form>
    <?php endif; ?>     

    <a class="green-btn center" href="newpassword">Changer le mot de passe</a>

</section>