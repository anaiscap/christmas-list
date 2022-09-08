<section class="accueil">

    <?php if(isset($_SESSION['admin'])): ?>
        
        <div class="sign-up">
            <form class="log-in bg-white" method="POST">
                <img class="avatar-img" src="<?= htmlspecialchars($avatarsrc['avatar_src']) ?>" alt="">
                <?= htmlspecialchars($users['first_name']) ?> <?= htmlspecialchars($users['last_name']) ?></p>
                <p><label for="new_password">Nouveau mot de passe</label>
                <input name="new_password" id="new_password" type="password"></p>
                <p><?= $this -> $message3 ?></p>
                
                <button class="gray-btn" type="submit">Enregistrer</button>
            </form>
        </div>
    <?php endif; ?>    
    

</section>