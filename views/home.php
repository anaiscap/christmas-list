<section class="accueil">
        
	<div class="video">
		<video autoplay muted loop id="myVideo">
			<source src="assets/santaclaus.mp4" type="video/mp4">
		</video>  
			

		</div>
		<div class="container1">
			<div class="center about">
				<h1>Dear Santa...</h1>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae similique nisi asperiores libero accusamus voluptates rem aperiam iusto dolor. Dolorum nihil quasi alias, perspiciatis voluptates, ipsa quas sunt pariatur odit corrupti doloribus est. Veniam dolore dolor enim officia est rerum quibusdam quis consectetur, ut nobis nulla tempora molestias pariatur laudantium quia esse.</p> 
			</div>
		</div> 
		<?php if(isset($_SESSION['user'])): ?>
		<div class="center container2">
			<h2>Les utilisateurs</h2>
			<div class="center list-details">
				
				<?php foreach($users as $user ): ?>
					<div class="mylists">
					<a href="index.php?route=userlists&id=<?=$user['id_user']?>"><img class="avatar" src="<?= $user['avatar_src'] ?>" alt=""></a>
						<p><?= $user['first_name'] ?> <?= $user['last_name'] ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div> 
		<?php endif; ?>

</section>