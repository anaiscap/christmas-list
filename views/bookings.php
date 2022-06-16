<section class="accueil">

    <h1 class="center white-title">My bookings</h1>
        <div class="center account">
            <?php foreach($bookings as $booking): ?> 
                    <div class="mylists">
                        <p><?=$booking['first_name']?> <?=$booking['last_name']?></p>
                        <div class="gift ld ld-jelly-alt">
                        <h3 class="gift-title"><?= $booking['title'] ?></h3>
                        <p><a target="blank" href="<?= $booking['link'] ?>"><img src="<?= $booking['gift_src'] ?>" alt="<?= $booking['gift_alt'] ?>"></a></p>
                        <p>PRICE: <?= $booking['price'] ?> €</p>	
                        <button class="gray-btn confirmButton" data-url="<?= "index.php?route=deleteBooking&id=".$booking['id_gift'] ?>" ><a><i class="fas fa-trash-alt"></i></a></button>
                    </div>
                    </div>
            <?php endforeach; ?>
        </div>
</section>

<!--  

<section class="accueil">
    <h1 class="center white-title">My bookings</h1>

    <?php foreach($bookings as $booking): ?> 
    <div class="gift ld ld-jelly-alt">
		<h3 class="gift-title"><?= $booking['title'] ?></h3>
		<p><a target="blank" href="<?= $booking['link'] ?>"><img src="<?= $booking['gift_src'] ?>" alt="<?= $booking['gift_alt'] ?>"></a></p>
		<p>PRICE: <?= $booking['price'] ?> €</p>	
        <p>PRICE: <?= $booking['status'] ?> €</p>
	</div>
    <?php endforeach; ?>
</section>



-->