<div class="column">

	<div id='article' class="row">
		<div class="columns">
			<h1><?php echo $titre ?></h1>
		</div>
		<div class="columns">
			<h2><?php echo $soustitre ?></h2>
		</div>
		<div class="columns">
			<?php echo $introduction ?>
		</div>
		<div class="columns">
			<p><?php echo $contenu ?> </p>
		</div>
		<div class="columns">
			<div class="right">
				<span>Auteur : <?php echo $author ?></span>
				<span>Date : <?php echo $date ?></span>
			</div>
		</div>
	</div>

	<hr>

	<div id="comments-actions" class="row">
		<h1>Commentaires</h1>
		<div id="comments"></div>
		<hr>
		<div id="add-comment-section">
			<h1>Nouveau commentaire</h1>
			<div class="columns">
				<textarea id="add-comment-content"></textarea>
				<br>
				<a href="#" id="add-comment-submit" class="button small">Envoyer</a>
			</div>
		</div>
		<hr>
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
		$("#comments-add").hide();
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

		$("#add-comment-submit").click(function() {
			addComment();
			return false;
		});

		function displayComments() {
			var url = "index.php?control=comment&task=displayComments&id=<?php echo $id ?>";
			$("#comments").empty();
			$.ajax(url, {dataType: "json"}).done(function(data) {
				$.each(data, function(index, value) {
					var currentCom = $("<div/>").addClass("row panel text-justify com");
					currentCom.attr("id", value.id);

					currentContent = $("<div/>").html(value.content);
					currentContent.appendTo(currentCom);

					currentAuthor = $("<div/>").html(value.authorName).addClass("right");
					currentAuthor.appendTo(currentCom);

					currentCom.appendTo($("#comments"));
				});
				$("#comment-button").html("Commentaires <<");
				$("#comments-actions").fadeIn(800);
				if($("#comments").children().last().offset() != undefined) {
					$('html, body').animate({
			        	scrollTop: $("#comments").children().last().offset().top
			    	}, 1000);
				} else {
					$('html, body').animate({
			        	scrollTop: $("#add-comment-section").children().last().offset().top
			    	}, 1000);
				}
			}); 
		}

		function hideComments() {
			$("#comment-button").html("Commentaires >>");
			$("#comments-actions").fadeOut(2000);
			$('html, body').animate({
		        scrollTop: $("#article").offset().top
		    }, 1000);
		}

		function addComment() {
			var url = "index.php?control=comment&task=addComments";
			var dataToSend = {
				postId: <?php echo $id?>,
				userId: <?php echo $_SESSION["user"]->id?>,
				content: tinymce.get('add-comment-content').getContent()
			}
			$.ajax({
				url: url,
				data: 'comment='+JSON.stringify(dataToSend),
				type: 'POST'
			}).done(function(data) {
				displayComments();
			});
			
		}
	});
</script>

