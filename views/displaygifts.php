<section class="accueil">

	<h1 class="center white-title">Liste: <?= $lists['name'] ?>, de <?= $lists['first_name'] ?> <?= $lists['last_name'] ?></h1>

	<div class="list-details">
		<p>hey<?= $bookings['status'] ?></p>
		<?php foreach($gifts as $gift): ?> 
				<div class="gift ld ld-jelly-alt">	
					<h3 class="gift-title"><?= $gift['title'] ?></h3>
					<p><a target="blank" href="<?= $gift['link'] ?>"><img src="<?= $gift['gift_src'] ?>" alt="<?= $gift['gift_alt'] ?>"></a></p>
					<p>PRICE: <?= $gift['price'] ?> €</p>
					<a class="gray-btn show book" href="index.php?route=booking&id_gift=<?=$gift['id_gift']?>">booking</a>
					<p class="black-btn hide">booked</p>
					<p>hey<?= $gift['status'] ?></p>		
				</div>

        <?php endforeach; ?>		

	</div>

</section>