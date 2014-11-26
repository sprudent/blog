<div class="column">

	<div id='article' class="row">
		<div class="columns">
			<h1><?php echo $post->title ?></h1>
		</div>
		<div class="columns">
			<h2><?php echo $post->subtitle ?></h2>
		</div>
		<div class="columns">
			<?php echo $post->introduction ?>
		</div>
		<div class="columns">
			<p><?php echo $post->content ?> </p>
		</div>
		<div class="columns">
			<div class="right">
				<div><?php echo $post->authorName ?></div>
				<div><?php echo $post->date ?></div>
				<hr>
				<div id="like-post-button" class="button small">
					<img src="ressources/like.png" width="25px" height="25px" alt="like button"></img> 
					<span id="nb-like"><?php echo $post->like ?></span>
				</div>
			</div>
		</div>
	</div>

	<hr>

	<div id="comments-actions" class="row">
		<h1>Commentaires</h1>
		<div id="comments"></div>
		<div id="add-comment-section">
			<hr>
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
		<div class="medium-4 columns end">
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
		if(!<?php echo (AccessHelper::isConnected()? "true" : "false") ?>) {
			$("#add-comment-section").hide();
		} 
		$("#like-post-button").click(function() {
			var url = "index.php?control=post&task=like&id=<?php echo $post->id ?>";
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
			var url = "index.php?control=comment&task=displayComments&id=<?php echo $post->id ?>";
			$("#comments").empty();
			$.ajax(url, {dataType: "json"}).done(function(data) {
				$.each(data, function(index, value) {
					var currentCom = $("<div/>").addClass("row panel text-justify com");
					currentCom.attr("id", value.id);

					currentContent = $("<div/>").html(value.content);
					currentContent.appendTo(currentCom);

					currentAuthor = $("<div/>").html("<div>"+value.authorName+"</div><div>"+value.date+"</div>").addClass("right");
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
			$("#comments-actions").fadeOut(1200);
			$('html, body').animate({
		        scrollTop: $("#article").offset().top
		    }, 1000);
		}

		function addComment() {
			var url = "index.php?control=comment&task=addComments";
			var dataToSend = {
				postId: <?php echo $post->id?>,
				content: $('#add-comment-content').val()
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

