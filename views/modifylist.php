<section class="accueil">

	<h1 class="center white-title"><?= $lists['name'] ?></h1>

	<div class="list-details">
	
		<?php foreach($gifts as $gift): ?> 
				<div class="gift ld ld-jelly-alt">
					<h3 class="gift-title"><?= $gift['title'] ?></h3>
					<p><a target="blank" href="<?= $gift['link'] ?>"><img src="<?= $gift['gift_src'] ?>" alt="<?= $gift['gift_alt'] ?>"></a></p>
					<p>PRICE: <?= $gift['price'] ?> €</p>
					
					<button class="gray-btn confirmButton" data-url="<?= "index.php?route=deleteGift&id=".$gift['id_gift'] ?>"><a><i class="fas fa-trash-alt"></i></a></button>
					
				</div> 
        <?php endforeach; ?>		

	</div>
	<div class="form">

		<img src="assets/img/tree.png" alt="christmas-tree">
		
		<form class="formgift" method="post" enctype="multipart/form-data"> 
			<h2 class="green-title center" >Add a Gift</h2>
			<div class="formgift">
				<div class="list-details">
					<p class="formgift margin-right" >
						<label for='title'>Gift title</label>
						<input type="text" name="title" id="title" />
					</p>
					<p class="formgift margin-right">
						<label for='price'>Price</label>
						<input type="number" name="price" id="price" />
					</p>
					
				</div>
				<div class="formgift">
					<p class="formgift margin-right">
						<label for='link'>Link</label>
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
			<button class="white-btn center" type="submit">ADD TO LIST</button>	
		</form>

	</div>

</section>