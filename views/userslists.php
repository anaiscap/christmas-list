<section class="accueil">

    <h1 class="center white-title">Listes de : <?= $users['first_name'] ?> <?= $users['last_name'] ?></h1>
        <div class="center account">
            <?php foreach($lists as $list): ?> 
                <?php if($id==$list['id_user']): ?> 
                    <div class="mylists">

                       <!-- <p class="green-btn"><?= $list['name'] ?></p>
                        <p><a href="index.php?route=subscription&id_list=<?=$list['id_list']?>&id=<?=$list['id_user']?>">subscribe</a></p>
                        <p>liste id: <?= $list['id_list'] ?></p>
                        <p>user id: <?= $list['id_user'] ?></p> -->
                        <a href="index.php?route=subscription&id_list=<?=$list['id_list']?>&id=<?=$list['id_user']?>">
                        <div class="envelope">
                            <div class="back"></div>
                            <div class="letter">
                                <div class="text"><?= $list['name'] ?></div>
                            </div>
                            <div class="front"></div>
                            <div class="top"></div>
                            <div class="shadow"></div>
                        </div></a>
                    </div>
                <?php endif ?>
            <?php endforeach; ?>
        
        </div>
</section>