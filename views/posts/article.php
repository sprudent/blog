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

	<hr>

	<div id="comments-actions" class="row">
		<h1>Commentaires</h1>
		<div id="comments"></div>
		<div class="columns">
			<a id="new-com" href="#" class="button small success expand">Nouveau commentaire</a>
		</div>
	</div>

	<div class="row">
		<div class="medium-4 columns">
			<a id="comment-button" href ="#" class="button small expand">Commentaires >></a>
		</div>
		<div class="medium-4 columns">
			<a id="like-button" href ="#" class="button small expand">Like(<span id="nb-like"><?php echo $like ?></span>)</a>
		</div>
		<div class="medium-4 columns">
			<a href ="index.php" class="button small expand">Retour</a>
		</div>
	</div>
</div>

<div id="error" class="error" class="row">
	<?php if(!empty($error)) {
		echo $error; 
	} ?>
</div> 

<script>
	$(window).load(function() {
		$("#comments-actions").hide();
		$("#like-button").click(function() {
			var url = "index.php?control=post&task=like&id=<?php echo $id ?>";
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

		$("#comment-button").click(function() {
			if($("#comments-actions").is(":visible")) {
				hideComments();
			} else {
				displayComments();
			}
			return false;
		});

		function displayComments() {
			var url = "index.php?control=comment&task=displayComments&id=<?php echo $id ?>";
			$("#comments").empty();
			$.ajax(url, {dataType: "json"}).done(function(data) {
				$.each(data, function(index, value) {
					var currentCom = $("<div/>").addClass("row panel com");
					currentCom.attr("id", value.id);

					currentContent = $("<div/>").html(value.content);
					currentContent.appendTo(currentCom);

					currentAuthor = $("<div/>").html(value.authorName).addClass("right");
					currentAuthor.appendTo(currentCom);

					currentCom.appendTo($("#comments"));
				});
			}); 
			$("#comment-button").html("Commentaires <<");
			$("#comments-actions").fadeIn();
		}

		function hideComments() {
			$("#comment-button").html("Commentaires >>");
			$("#comments-actions").fadeOut();
		}

		function addComment() {
			var url = "index.php?control=comment&task=addComments";
			/*$.ajax({
				url: url,
				data: {
					postId: <?php echo $id ?>,
					userId: <php echo
				}
			}).done(function(data) {

			});*/
		}
	});
</script>