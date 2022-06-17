<section class="accueil">
<div class="sign-up">
    <form method="post" class="log-in">
            
        <h1>LOGIN.</h1>
            <p>
                <p><i class="fas fa-portrait"></i> Adresse email</p>
                <input type="email" name="email" id="email" required>
            </p>
            <p><?= $this -> message1 ?></p>
            
            <p>
                <p><i class="fas fa-lock"></i> Mot de passe</p>
                <input type="password" name="pw" id="pw" required>
            </p>
            <p><?= $this -> message2 ?></p>
            
            <button class="gray-btn">LOGIN</button>
            <p>Pas encore de compte ? <a href="signup">Register</a></p>
            
    </form>
    </div>
</section>