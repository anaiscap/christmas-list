<section class="accueil">

	<h1 class="center white-title">Liste: <?= $lists['name'] ?>, de <?= $lists['first_name'] ?> <?= $lists['last_name'] ?></h1>

	<div class="list-details">
		<?php foreach($gifts as $gift): ?> 
				<div class="gift ld ld-jelly-alt">	
					<h3 class="gift-title"><?= $gift['title'] ?></h3>
					<p><a target="blank" href="<?= $gift['link'] ?>"><img src="<?= $gift['gift_src'] ?>" alt="<?= $gift['gift_alt'] ?>"></a></p>
					<p>Prix: <?= $gift['price'] ?> €</p>
					<?php if ($gift['id_status'] == 2) { ?>
						<p class="black-btn">Réservé</p>
					<?php } ?>
					<?php if ($gift['id_status'] == NULL) { ?>
						<a class="gray-btn show book" href="index.php?route=booking&id_gift=<?=$gift['id_gift']?>">Réserver</a>
					<?php } ?>		
				</div>

        <?php endforeach; ?>		

	</div>

</section>