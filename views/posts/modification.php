<h1>Modification</h1>
<?php if(!empty($error)): ?>
    <div class="error"><?php echo $error ?></div>   
<?php endif?>
<form method="post">
    <div class="row">Titre :</div>
    <div class="row">
        <input type ="text" name="title" id="title" placeholder="Titre" value="<?php echo $post->title?>"/>
    </div>
    <div class="row">Sous-titre :</div>
    <div class="row">
        <input type ="text" name="subtitle" id="subtitle" placeholder="Sous-titre" value="<?php echo $post->subtitle?>"/>
    </div>
    <div class="row">Introduction :</div>
    <div class="row">
        <textarea name="introduction" id="introduction" rows="8" cols="50"><?php echo $post->introduction?></textarea>
    </div>
    <div class="row">Contenu :</div>
    <div class="row">
        <textarea name="content" id="content" rows="8" cols="50"><?php echo $post->content?></textarea>
    </div>
    <hr>
    <div class="row">
        <input type="submit" name="submit" class="button small"/>
        <a href="index.php" class="button small">Retour</a>
    </div>
</form>

