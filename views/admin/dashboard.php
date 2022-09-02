    <section class="accueil center">
        
        <h1>Tableau de bord</h1>
        
        
        <h2>Utilisateurs</h2>
        <div class="center">
        <table class="gestion">
            <tr>
                <th>id</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>email</th>
            </tr>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user['id_user'] ?></td>
                <td><?= $user['first_name'] ?></td>
                <td><?= $user['last_name'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><button><a href="index.php?route=modifyUser&id=<?=$user['id_user']?>"><i class="fas fa-pen-nib"></i></a></button></td>
               <!--<td><button><a href="modifyUser&id=<?=$user['id_user']?>"><i class="fas fa-pen-nib"></i></a></button></td>
                <td><button class="confirmButton" data-url="<?= "index.php?page=deleteOrder&id=".$order['id_order'] ?>"><a><i class="fas fa-trash-alt"></i></a></button></td>-->
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
        <h2>Avatars</h2>
        
        
    </section>

