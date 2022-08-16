<section class="accueil">

	<h1 class="center white-title"><?= $lists['name'] ?></h1>

	<div class="list-details">
	
		<?php foreach($gifts as $gift): ?> 
				<div data-id="<?=$gift['id_gift']?>" class="gift ld ld-jelly-alt">
					<h3 class="gift-title"><?= $gift['title'] ?></h3>
					<p><a target="blank" href="<?= $gift['link'] ?>"><img src="<?= $gift['gift_src'] ?>" alt="<?= $gift['gift_alt'] ?>"></a></p>
					<p>PRICE: <?= $gift['price'] ?> €</p>
					
					<button class="gray-btn confirmButton" data-id="<?=$gift['id_gift']?>" data-url="<?= "index.php?route=deleteGift&id=".$gift['id_gift'] ?>"><a><i class="fas fa-trash-alt"></i></a></button>
				</div> 
        <?php endforeach; ?>		
	</div>
	<div class="form">

		<img class="gift-form-img" src="assets/img/gift3.png" alt="christmas-tree">
		
		<form class="formgift" method="post" enctype="multipart/form-data"> 
			<h2 class="green-title center" >Ajouter un cadeau</h2>
			<div class="formgift">
				<div class="list-details">
					<p class="formgift margin-right" >
						<label for='title'>Titre du cadeau</label>
						<input type="text" name="title" id="title" />
					</p>
					<p class="formgift margin-right">
						<label for='price'>Prix</label>
						<input type="number" name="price" id="price" />
					</p>
					
				</div>
				<div class="formgift">
					<p class="formgift margin-right">
						<label for='link'>Lien</label>
						<input type="url" name="link" id="link"
							placeholder="https://example.com"
							pattern="https://.*" size="30"
							>
					</p>
					<p class="formgift margin-right">
						<label for="gift_src">Image</label>
						<input type="file" name="gift_src" id="gift_src" />
					</p>
					
				</div>
			</div>
			<button class="white-btn center" type="submit">AJOUTER À LA LISTE</button>	
		</form>

	</div>

</section>