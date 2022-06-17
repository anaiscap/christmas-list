<section class="accueil">
    <h1 class="center">INSCRIPTION.</h1>
    <form class="sign-up" method="post" class="login">
            <fieldset class="avatar-fieldset">
                <legend>Avatar</legend>
                <div class="avatar-signup">
                    <?php foreach($avatars as $avatar): ?>
                        <div class="mylists">
                            <label for='avatar'><img class='avatar' src="<?= htmlspecialchars($avatar['avatar_src']) ?>" alt="<?= htmlspecialchars($avatar['avatar_alt']) ?>"></label>
                            <input type="radio" name="avatar" value="<?= htmlspecialchars($avatar['id_avatar']) ?>" id="<?= htmlspecialchars($avatar['id_avatar']) ?>" checked>
                        </div>
                    <?php endforeach; ?>
                    </div>
            </fieldset>
            <div class="avatar-fieldset">
                <fieldset>
                    <legend>Identité</legend>
                    <p>
                        <input type="text" name="firstName" id="firstName" value="<?= (isset($_POST['firstName']))? $_POST['firstName']:"" ?>" placeholder="Prénom" required>
                    </p>
                    
                    <p>
                        <input type="text" name="lastName" id="lastName" value="<?= (isset($_POST['lastName']))? $_POST['lastName']:"" ?>" placeholder="Nom" required>
                    </p>
                </fieldset>
                <fieldset>
                    <legend>Compte</legend>
                        <p>
                            <input type="email" name="email" id="email" placeholder="Email" required>
                                <p><?= $this -> message1 ?></p>
                        </p>
                        <p>
                            <input type="password" name="pw" id="pw" placeholder="Mot de passe" required>
                            <p><?= $this -> message2 ?></p>
                        </p>
                        </p>
                </fieldset>
                <button class="gray-btn">Créer le compte</button>
            </div>
	</form>

</section>