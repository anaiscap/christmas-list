<section class="accueil">

	<h1 class="center white-title"><?= $lists['name'] ?></h1>

	<div class="list-details">
	
		<?php foreach($gifts as $gift): ?> 
				<div class="gift ld ld-jelly-alt">
					<h3 class="gift-title"><?= $gift['title'] ?></h3>
					<p><a target="blank" href="<?= $gift['link'] ?>"><img src="<?= $gift['gift_src'] ?>" alt="<?= $gift['gift_alt'] ?>"></a></p>
					<p>PRICE: <?= $gift['price'] ?> €</p>
					
					<button class="confirmButton" data-url="<?= "index.php?route=deleteGift&id=".$gift['id_gift'] ?>"><a><i class="fas fa-trash-alt"></i></a></button>
					
				</div> 
        <?php endforeach; ?>		

	</div>
	<div class="form">

		<img src="assets/img/tree.png" alt="christmas-tree">
		
		<form class="login" method="post" enctype="multipart/form-data"> 
			<h2 class="green-title" >Add a Gift</h2>
			<p>
				<label for='title'>Gift title</label>
				<input type="text" name="title" id="title"/>
			</p>
			<p>
				<label for="gift_src">Image</label>
				<input type="file" name="gift_src" id="gift_src"/>
			</p>
			<p>	
				<label for="gift_alt">Alt</label>
				<input type="text" name="gift_alt" id="gift_alt"/>
			</p>
			<p>
				<label for='link'>Link</label>
				<input type="url" name="link" id="link"
					placeholder="https://example.com"
					pattern="https://.*" size="30"
					required>
			</p>
			<p>
				<label for='price'>Price</label>
				<input type="number" name="price" id="price"/>
			</p>
			<button class="white-btn" type="submit">ADD TO LIST</button>	
		</form>

	</div>
   
           
</section>