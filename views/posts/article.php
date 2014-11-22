<div class="row">
	<div class="row">
		<h1><?php echo $titre ?></h1>
	</div>
	<div class="row">
		<h2><?php echo $soustitre ?></h2>
	</div>
	<div class="row"><?php echo $introduction ?></div>
	<div class="row">
		<br>
	</div>
	<div class="row">
		<p><?php echo $contenu ?></p>
	</div>
	<div class="row">
		<a href ="#" class="button small radius">Commentaires</a>
		<a id="like-button" href ="index.php?control=post&task=like&id=<?php echo $id ?>&js=false" class="button small radius">Like(<span id="nb-like"><?php echo $like ?></span>)</a>
		<a href ="index.php" class="button small radius">Retour</a>
	</div>
	<?php if(!empty($error)): ?>
	    <div id="error" class="error" class="row"><?php echo $error ?></div> 
	<?php endif?>
</div>
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