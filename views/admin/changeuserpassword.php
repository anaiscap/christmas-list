<section class="accueil">
    <p>hello</p>

    <?php if(isset($_SESSION['admin'])): ?>
        
        <div class="sign-up">
            <form class="log-in" method="POST">
                <p><?= $users['first_name'] ?> <?= $users['last_name'] ?></p>
            
                <input name="avatar" id="avatar" type="hidden" value="<?= $users['avatar'] ?>">
                <input name="first_name" id="first_name" type="hidden" value="<?= $users['first_name'] ?>">
                <input name="last_name" id="last_name" type="hidden" value="<?= $users['last_name'] ?>">
                <input name="email" id="email" type="hidden" value="<?= $users['email'] ?>">
                
                <p><label for="new_password">Nouveau mot de passe</label>
                <input name="new_password" id="new_password" type="password"></p>
                
                <button class="gray-btn" type="submit">Enregistrer</button>
            </form>
        </div>
    <?php endif; ?>    
    

</section>