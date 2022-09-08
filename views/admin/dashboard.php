    <section class="accueil center">
        
        <h1>Tableau de bord</h1>
        
        <h2>Utilisateurs</h2>
        <div class="center">
        <table class="gestion">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>email</th>
                    <th>Mot de passe</th>
                    <th><i class="fas fa-trash-alt"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr data-id="<?=$user['id_user']?>">
                    <td><?= $user['id_user'] ?></td>
                    <td><?= $user['first_name'] ?></td>
                    <td><?= $user['last_name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><a class="gray-btn" href="index.php?route=modifyUser&id=<?=$user['id_user']?>">modifier</a></td>
                    <td><button class="confirmButton green-btn" data-id="<?=$user['id_user']?>" data-url="<?= "index.php?route=deleteUser&id=".$user['id_user'] ?>"><i class="fas fa-trash-alt"></i></button></td>
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        
    </section>

