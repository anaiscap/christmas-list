<section class="accueil">

	<h1 class="center white-title">Liste: <?= $lists['name'] ?>, de <?= $lists['first_name'] ?> <?= $lists['last_name'] ?></h1>

	<div class="list-details">
	
		<?php foreach($gifts as $gift): ?> 
				<div class="gift ld ld-jelly-alt">
					<h3 class="gift-title"><?= $gift['title'] ?></h3>
					<p><a target="blank" href="<?= $gift['link'] ?>"><img src="<?= $gift['gift_src'] ?>" alt="<?= $gift['gift_alt'] ?>"></a></p>
					<p>PRICE: <?= $gift['price'] ?> €</p>
					<form method="post">
						<input type="submit" value="Réserver">
					</form>
					<a href="index.php?route=booking&id_gift=<?=$gift['id_gift']?>">booking</a>		
				</div>
				<?php var_dump($gift['id_gift']) ?>
				<?php var_dump($gift['id_list']) ?>
				<?php var_dump($_SESSION['id_user']) ?>

        <?php endforeach; ?>		

	</div>

</section>