<?php foreach ($posts as $post): ?>
	<div class="column">
		<div class="row">
			<div class="columns">
		    	<h2><?php echo $post->title ?></h2>
		    </div>	
		    <div class="columns">
		    	<h3><?php echo $post->subtitle ?></h3>
		    </div>
		    <div class="columns text-justify">
		    	<?php echo $post->introduction ?>
		    </div>
		    <div class="right">
				<div><?php echo $post->authorName ?></div>
				<div><?php echo $post->date ?></div>
			</div>
		</div>
	    <div class="row">
	    <?php if(AccessHelper::isAdmin()):?>
	    	<div class="small-12 medium-4 columns">
	    		<a href ="index.php?task=article&id=<?php echo $post->id ?>" class="button small expand">Lire la suite</a>
	    	</div>
    		<div class="small-12 medium-4 columns">
	    		<a href ="index.php?task=suppression&id=<?php echo $post->id ?>" class="button small success expand">Supprimer</a>
	    	</div>
	    	<div class="small-12 medium-4 columns">
	   			<a href ="index.php?task=modification&id=<?php echo $post->id ?>" class="button small success expand">Modification</a>
   			</div>
   		<?php else:?>
   			<div class="small-12 medium-4 columns">
	    		<a href ="index.php?task=article&id=<?php echo $post->id ?>" class="button small">Lire la suite</a>
	    	</div>
   		<?php endif ?>	
	    </div>
	</div>
	<hr>
<?php endforeach; // fin du foreach affichage?>

