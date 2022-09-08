<section id="list-booking" class="accueil">

    <h1 class="center white-title heavy">Mes cadeaux réservés</h1>
        <div id="printJS-list" class="center account">
            <?php foreach($bookings as $booking): ?> 
                    <div data-id="<?= htmlspecialchars($booking['id_gift']) ?>" class="mylists">
                        <p class="tag card-price"><?= htmlspecialchars($booking['first_name'] .' '. $booking['last_name']); ?></p>
                        <div class="gift ld ld-jelly-alt">
                            <h3 class="gift-title"><?= htmlspecialchars($booking['title']) ?></h3>
                            <p><a target="blank" href="<?= htmlspecialchars($booking['link']) ?>"><img src="<?= $booking['gift_src'] ?>"></a></p>
                            <p>Prix: <?= htmlspecialchars($booking['price']) ?> €</p>	
                            <p><?= htmlspecialchars($booking['status']) ?></p>
                            
                            <form  method="post">
                            <input type="hidden" name="idgift" id="idgift" value="<?= htmlspecialchars($booking['id_gift']) ?>"/>
                                <select name="status" id="status">
                                <?php foreach($stats as $stat): ?>
                                    <option value="<?= htmlspecialchars($stat['id_status']) ?>" <?= ($stat['id_status']==htmlspecialchars($booking['id_status']))?"selected":""  ?>><?= htmlspecialchars($stat['status']) ?></option>
                                <?php endforeach; ?>
                                </select>
                                <button class="green-btn" type="submit">ok</button>
                            
                            </form>
                            
                            <button class="gray-btn confirmButton" data-id="<?= htmlspecialchars($booking['id_gift'])?>" data-url="<?= "index.php?route=deleteBooking&id=".$booking['id_gift'] ?>" ><a><i class="fas fa-trash-alt"></i></a></button>
                            
                            <input class="print-only" type="checkbox" name="" id="">
                        </div>
                    </div>
            <?php endforeach; ?>
        </div> 
    
        <button class="gray-btn" id="test-button" type="button" onclick="window.print()">Imprimer</button>
    

</section>
