<section class="accueil">
<div class="container-flex-column new-list log-in">
	<h1>MODIFIER LISTE.</h1>

	<form class="login" method="post"> 

			<p>
				<label for='name'>Nom de la liste</label>
				<input type="text" name="name" id="name"/>
			</p>
			<p><?= $this -> $message2 ?></p>
			<button class="white-btn" type="submit">ENREGISTRER</button>
	</form>
</div>


</section>