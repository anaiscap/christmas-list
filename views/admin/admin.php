
<!--
<main class="login">
	
</main>-->
<section id="list-booking" class="accueil">
<div class="sign-up">
   <form method="post" class="log-in">
		<h1>Admin...</h1>
		<p>
			<label for='login'><i class="fas fa-portrait"></i> Login</label>
			<input type="text" name="login" id="login">
		</p>
		<p><?= $this -> message1 ?></p>
		<p>
			<label for='pw'><i class="fas fa-lock"></i> Mot de passe</label>
			<input type="password" name="pw" id="pw">
		</p>
		<p><?= $this -> message2 ?></p>
		<button>LOGIN</button>
	</form>
</div>
</section>
