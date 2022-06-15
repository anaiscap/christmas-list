<section class="accueil">

    <h1 class="center white-title">Mes listes</h1>
        <div class="center account">
            <?php foreach($lists as $list): ?> 
                <?php if($id==$list['id_user']): ?> 
                    <div class="mylists">
                        <a href="index.php?route=modify&id=<?=$list['id_list']?>" class="green-btn"><?= $list['name'] ?></a>
                        <div>
                            <button class="gray-btn confirmButton" data-url="<?= "index.php?route=deleteList&id=".$list['id_list'] ?>" ><a><i class="fas fa-trash-alt"></i></a></button>
                        </div>
                    </div>
                <?php endif ?>
            <?php endforeach; ?>
        
        </div>

        <div class="center">
            <a class="white-btn" href="newlist">ADD NEW LIST</a>
        </div>
</section>