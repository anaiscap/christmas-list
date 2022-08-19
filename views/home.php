<section class="accueil">
        
	<div class="video">
		<video autoplay muted loop id="myVideo">
			<source src="" type="video/mp4">
		</video> 
	</div>
	
		<div class="container1">
			<div class="center about">
				<h1>À propos...</h1>
				<p>"Noël approche, ai-je déjà fait un cadeau pour tante Hilda ?" "L'année dernière oncle Charlie a reçu deux fois le même cadeau..." Qui n'a jamais rencontré pareilles situations ? Listy est là pour répondre à ces problèmes !</p> 
			</div>
		</div> 
		<div class="center container2 about-container">
			<div class="container2 about-wrapper gift">
				<img class="about-img" src="assets/img/signup.png" alt="">
				<p>Inscrivez-vous en allant sur la page "INSCRIPTION"</p>
			</div>
			<img class="curve-right" src="assets/img/arrow5.png" alt="">
		</div>
		<div class="center container2 about-container right">
			<img class="curve-left" src="assets/img/arrow4.png" alt="">
			<div class="container2 about-wrapper gift">
				<img class="about-img" src="assets/img/list-icon.png" alt="">
				<p>Créez votre liste d'envie pour la partager à vos proches</p>
			</div>
		</div>
		<div class="center container2 about-container">
			<div class="container2 about-wrapper gift">
				<img class="about-img" src="assets/img/friend-list.png" alt="">
				<p>Recherchez vos amis pour vous inscrire à leurs listes</p>
			</div>
			<img class="curve-right" src="assets/img/arrow5.png" alt="">
		</div>
		<div class="center container2 about-container right">
			<div class="container2 about-wrapper gift">
				<img class="about-img" src="assets/img/gift3.png" alt="">
				<p>Réservez les cadeaux que vous souhaitez offrir, plus de place aux doutes !</p>
			</div>
			
		</div>
		
		<?php if(isset($_SESSION['user'])): ?>
		<div class="center container2 user-search">
			<h2>Retrouvez vos amis</h2>
			<!-- Search box. -->
				<input type="text" id="the-filter" placeholder="Ex: Jacques Chirac" />
				
				<!-- Suggestions will be displayed in below div. -->
				<div id="display"></div>
			<ul id="the-list" class="center list-details">
				<?php foreach($users as $user ): ?>
					<?php if ($user['id_user'] !== $_SESSION['idUser']) { ?>
					<li class="mylists">
						<a href="index.php?route=userlists&id=<?=$user['id_user']?>"><img class="avatar" src="<?= $user['avatar_src'] ?>" alt=""></a>
						<p><?= $user['first_name'] ?> <?= $user['last_name'] ?></p>
					</li>
					<?php	} ?>	
				<?php endforeach; ?>
			</ul>
		</div> 
		<?php endif; ?>

</section>