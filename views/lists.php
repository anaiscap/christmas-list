<section class="accueil">

    <h1 class="center white-title">Les listes de mes amis</h1>
        <div class="center account">
            <?php foreach($lists as $list): ?> 
                    <div data-id="<?=$list['id_list']?>" class="mylists">
                        <p><?=$list['first_name']?> <?=$list['last_name']?></p>
                        <p></p>
                        <img src="<?=$list['avatar']?>" alt="">
                        <a href="index.php?route=displayList&id=<?=$list['id_list']?>" class="green-btn"><?= $list['name'] ?></a>
                        <button class="gray-btn confirmButton" data-id="<?=$list['id_list']?>" data-url="<?= "index.php?route=deleteSubscription&id=".$list['id_list'] ?>" ><a><i class="fas fa-trash-alt"></i></a></button>
                    </div>
            <?php endforeach; ?>
        
        </div>
</section>