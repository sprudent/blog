<h1>Création d'un nouvel article</h1>
<?php if(!empty($error)): ?>
    <div class="error"><?php echo $error ?></div>
    <br>   
<?php endif?>
<form method="post">
    <div class="row">Titre :</div>
    <div class="row">
        <input type ="text" name="titre" id="titre" placeholder="Titre" value="<?php echo $titre?>"/>
    </div>
    <div class="row">Sous-titre :</div>
    <div class="row">
        <input type ="text" name="soustitre" id="soustitre" placeholder="Sous-titre" value="<?php echo $soustitre?>"/>
    </div>
    <div class="row">Introduction :</div>
    <div class="row">
        <textarea name="introduction" id="introduction" rows="4" cols="50"><?php echo $introduction?></textarea>
    </div>
    <div class="row">Contenu :</div>
    <div class="row">
        <textarea name="contenu" id="contenu" rows="4" cols="50"><?php echo $contenu?></textarea>
    </div>
    <hr>
    <div class="row">
        <input type="submit" name="submit" class="button small radius"/>
        <a href="index.php" class="button small radius">Retour</a>
    </div>
</form>

