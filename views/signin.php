<section class="sign-up">

    <form method="post" class="log-in">
            
        <h1>LOGIN.</h1>
            <p>
                <label for='email'><p><i class="fas fa-portrait"></i> Adresse email</p></label>
                <input type="email" name="email" id="email">
            </p>
            <p><?= $this -> message1 ?></p>
            
            <p>
                <label for='pw'><p><i class="fas fa-lock"></i> Mot de passe</p></label>
                <input type="password" name="pw" id="pw">
            </p>
            <p><?= $this -> message2 ?></p>
            
            <button>LOGIN</button>
            
    </form>
	<p>Pas encore de compte ? <a href="signup">Register</a></p>

</section>