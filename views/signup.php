<section>
    <form class="sign-up" method="post" class="login">
            <fieldset class="avatar-fieldset">
                <legend class="black-title">Avatar</legend>
                <div class="avatar-signup">
                    <?php foreach($avatars as $avatar): ?>
                        <div class="mylists">
                            <label for='avatar'><img class='avatar' src="<?= htmlspecialchars($avatar['avatar_src']) ?>" alt="<?= htmlspecialchars($avatar['avatar_alt']) ?>"></label>
                            <input type="radio" name="avatar" value="<?= htmlspecialchars($avatar['id_avatar']) ?>" id="<?= htmlspecialchars($avatar['id_avatar']) ?>">
                        </div>
                    <?php endforeach; ?>
                    </div>
            </fieldset>
            <div class="avatar-fieldset">
                <fieldset>
                    <legend class="black-title">Identité</legend>
                    <p>
                        <input type="text" name="firstName" id="firstName" value="<?= (isset($_POST['firstName']))? $_POST['firstName']:"" ?>" placeholder="Prénom">
                    </p>
                    
                    <p>
                        <input type="text" name="lastName" id="lastName" value="<?= (isset($_POST['lastName']))? $_POST['lastName']:"" ?>" placeholder="Nom">
                    </p>
                </fieldset>
                <fieldset>
                    <legend class="black-title">Compte</legend>
                        <p>
                            <input type="email" name="email" id="email" placeholder="Email">
                                <p><?= $this -> message1 ?></p>
                        </p>
                        <p>
                            <input type="password" name="pw" id="pw" placeholder="Mot de passe">
                            <p><?= $this -> message2 ?></p>
                        </p>
                        </p>
                </fieldset>
                <button class="gray-btn black-title">Créer le compte</button>
            </div>
	</form>

</section>