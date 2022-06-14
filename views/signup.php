<section class="sign-up">
        <p class='avatar'>hello</p>
    <form method="post" class="login">
            <fieldset>
                <legend>Identité</legend>
                <p>
                <label for='avatar'>Avatar</label>
                    <?php foreach($avatars as $avatar): ?>
                        <label for='avatar'><img class='avatar' src="<?= htmlspecialchars($avatar['avatar_src']) ?>" alt="<?= htmlspecialchars($avatar['avatar_alt']) ?>"></label>
                    <input type="radio" name="avatar" value="<?= htmlspecialchars($avatar['id_avatar']) ?>" id="<?= htmlspecialchars($avatar['id_avatar']) ?>">
                    <?php endforeach; ?>
                </p>
                
                <p>
                    <label for='firstName'>name</label>
                    <input type="text" name="firstName" id="firstName" value="<?= (isset($_POST['firstName']))? $_POST['firstName']:"" ?>">
                </p>
                
                <p>
                    <label for='lastName'>Nom</label>
                    <input type="text" name="lastName" id="lastName" value="<?= (isset($_POST['lastName']))? $_POST['lastName']:"" ?>">
                </p>
            </fieldset>
            
            <fieldset>
                <legend>Compte</legend>
                    <p>
                        <label for='email'>Email</label>
                        <input type="email" name="email" id="email">
                            <p><?= $this -> message1 ?></p>
                    </p>
                    <p>
                        <label for='pw'>Mot de passe</label>
                        <input type="password" name="pw" id="pw">
                    </p>
            </fieldset>
            <button>Créer le compte</button>
	</form>

</section>