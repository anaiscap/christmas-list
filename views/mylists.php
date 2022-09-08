<section class="accueil">

    <h1 class="center white-title">Mes listes</h1>
        <div class="center account">
            <?php foreach($lists as $list): ?> 
                <?php if($id== $list['id_user']): ?>
                    <div data-id="<?= htmlspecialchars($list['id_list'])?>" class="mylists">
                        <img class="icon" src="assets/img/list-icon.png" alt="">
                        <a href="index.php?route=modify&id=<?=$list['id_list']?>" class="green-btn"><?= htmlspecialchars($list['name']) ?></a>
                        <div>
                            <button class="gray-btn confirmButton" data-id="<?=$list['id_list']?>" data-url="<?= "index.php?route=deleteList&id=".$list['id_list'] ?>" ><a><i class="fas fa-trash-alt"></i></a></button>
                            <button class="gray-btn"> <a href="index.php?route=modifyList&id=<?=$list['id_list']?>"><i class="fas fa-pen-nib"></i></a></button>

                        </div>
                    </div>
                <?php endif ?>
            <?php endforeach; ?>
        
        </div>

        <div class="center">
            <a class="white-btn" href="newlist">NOUVELLE LISTE +</a>
        </div>
</section>