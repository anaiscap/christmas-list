<section id="list-booking" class="accueil">

    <h1 class="center white-title heavy">Mes cadeaux réservés</h1>
        <div id="printJS-list" class="center account">
            <?php foreach($bookings as $booking): ?> 
                    <div data-id="<?=$booking['id_gift']?>" class="mylists">
                        <p class="tag card-price"><?=$booking['first_name']?> <?=$booking['last_name']?></p>
                        <div class="gift ld ld-jelly-alt">
                            <h3 class="gift-title"><?= $booking['title'] ?></h3>
                            <p><a target="blank" href="<?= $booking['link'] ?>"><img src="<?= $booking['gift_src'] ?>" alt="<?= $booking['gift_alt'] ?>"></a></p>
                            <p>Prix: <?= $booking['price'] ?> €</p>	
                            <button class="gray-btn confirmButton" data-id="<?=$booking['id_gift']?>" data-url="<?= "index.php?route=deleteBooking&id=".$booking['id_gift'] ?>" ><a><i class="fas fa-trash-alt"></i></a></button>
                            <input class="print-only" type="checkbox" name="" id="">
                        </div>
                    </div>
            <?php endforeach; ?>
        </div> 
    
        <button class="gray-btn" id="test-button" type="button" onclick="window.print()">Imprimer</button>
    

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