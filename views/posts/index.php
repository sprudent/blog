<?php foreach ($posts as $post): ?>
	<div class="column">
		<div class="row">
			<div class="small-12 columns">
		    	<h2><?php echo $post->titre ?></h2>
		    </div>	
		    <div class="small-12 columns">
		    	<h3><?php echo $post->soustitre ?></h3>
		    </div>
		    <div class="small-12 columns">
		    	<?php echo $post->introduction ?>
		    </div>
		</div>
	    <div class="row">
	    <?php if(AccessHelper::isAdmin()):?>
	    	<div class="small-12 medium-4 columns">
	    		<a href ="index.php?task=article&id=<?php echo $post->id ?>" class="button small radius expand">Lire la suite</a>
	    	</div>
    		<div class="small-12 medium-4 columns">
	    		<a href ="index.php?task=suppression&id=<?php echo $post->id ?>" class="button small success radius expand">Supprimer</a>
	    	</div>
	    	<div class="small-12 medium-4 columns">
	   			<a href ="index.php?task=modification&id=<?php echo $post->id ?>" class="button small success radius expand">Modification</a>
   			</div>
   		<?php else:?>
   			<div class="small-12 medium-4 columns">
	    		<a href ="index.php?task=article&id=<?php echo $post->id ?>" class="button small radius">Lire la suite</a>
	    	</div>
   		<?php endif ?>	
	    </div>
	</div>
<?php endforeach; // fin du foreach affichage?>

