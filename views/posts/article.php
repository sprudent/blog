<div class="column">

	<div class="row">
		<div class="small-12 columns">
			<h1><?php echo $titre ?></h1>
		</div>
		<div class="small-12 columns">
			<h2><?php echo $soustitre ?></h2>
		</div>
		<div class="small-12 columns">
			<?php echo $introduction ?>
		</div>
		<div class="small-12 columns">
			<p><?php echo $contenu ?></p>
		</div>
	</div>
	<div class="row">
		<div class="small-12 medium-4 columns">
			<a href ="#" class="button small radius expand">Commentaires</a>
		</div>
		<div class="small-12 medium-4 columns">
			<a id="like-button" href ="index.php?control=post&task=like&id=<?php echo $id ?>&js=false" class="button small radius expand">Like(<span id="nb-like"><?php echo $like ?></span>)</a>
		</div>
		<div class="small-12 medium-4 columns">
			<a href ="index.php" class="button small radius expand">Retour</a>
		</div>
	</div>
</div>
<?php if(!empty($error)): ?>
    <div id="error" class="error" class="row"><?php echo $error ?></div> 
<?php endif?>

<script>
	$(window).load(function() {
		$("#like-button").click(function() {
			var url = "index.php?control=post&task=like&id=<?php echo $id ?>&js=true";
			console.log(url);
			$.ajax(url, {dataType: "json"}).done(function(data) {
				if(data.success) {
					var nbLike = $("#nb-like").html();
					nbLike++;
					$("#nb-like").html(nbLike);
				} else {
					$("#error").html(data.errorMess);
				}
			}); 
			return false;
		});	
	});
</script>