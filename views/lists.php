<section class="accueil">

    <h1 class="center white-title">My subscriptions</h1>
        <div class="center account">
            <?php foreach($lists as $list): ?> 
                    <div class="mylists">
                        <p><?=$list['id_list']?></p>
                        <a href="index.php?route=displayList&id=<?=$list['id_list']?>" class="green-btn"><?= $list['name'] ?></a>
                        <button class="confirmButton" data-url="<?= "index.php?route=deleteSubscription&id=".$list['id_list'] ?>" ><a><i class="fas fa-trash-alt"></i></a></button>
                    </div>
            <?php endforeach; ?>
        
        </div>
</section>