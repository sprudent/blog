<?php foreach ($posts as $post): ?>
	<div class="row">
		<div>
	    	<h2><?php echo $post->titre ?></h2>
	    </div>	
	    <div>
	    	<h3><?php echo $post->soustitre ?></h3>
	    </div>
	    <div>
	    	<?php echo $post->introduction ?>
	    </div>
	</div>
    <div class="row">
    	<a href ="index.php?task=article&id=<?php echo $post->id ?>" class="button small radius">Lire la suite</a>
    	<?php if(AccessHelper::isAdmin()):?>
	    	<a href ="index.php?task=suppression&id=<?php echo $post->id ?>" class="button small success radius">Supprimer</a>
	   		<a href ="index.php?task=modification&id=<?php echo $post->id ?>" class="button small success radius">Modification</a>
	   	<?php endif ?>	
    </div>
<?php endforeach; // fin du foreach affichage?>

