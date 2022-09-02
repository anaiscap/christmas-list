
    
    
    <section class="accueil center">
        
        <h1>Tableau de bord</h1>
        
        
        <h2>Utilisateurs</h2>
        <div class="center">
        <table class="gestion center">
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Mot de passe</th>
                <th>email</th>
            </tr>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user['first_name'] ?></td>
                <td><?= $user['last_name'] ?></td>
                <td><?= $user['email'] ?></td>
               <!-- <td><button><a href="index.php?page=modifyArticle&id=<?=$order['id_order']?>"><i class="fas fa-pen-nib"></i></a></button></td>
                <td><button class="confirmButton" data-url="<?= "index.php?page=deleteOrder&id=".$order['id_order'] ?>"><a><i class="fas fa-trash-alt"></i></a></button></td>-->
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
        <h2>Avatars</h2>
        
        
    </section>

