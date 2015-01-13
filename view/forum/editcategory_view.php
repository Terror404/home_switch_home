<link rel="stylesheet" type="text/css" href="./../view/css/forumstyle.css">

<div class="forumFrame">
    
<strong>
<?php
if (INSTRUCTION == 'edit') {
    echo "Modification de catégorie";
}
elseif (INSTRUCTION == 'add') {
    echo "Ajout d'une nouvelle catégorie";
}
?>
</strong>

<form method='post' action="./../controler/content.php?page=forumIndex">
    <input type='hidden' name='categoryModificationInstruction' value ='<?php echo INSTRUCTION ?>'>
    <?php
    if (INSTRUCTION == 'edit') {
        ?>
        <input type='hidden' name='categoryBeingEdited' value=<?php echo CATEGORY_TO_EDIT ?>>
        <?php
    }
    ?>
    Nom de la catégorie :<br/>
    <input type='text' name='categoryTitle' value='<?php echo $categoryInfo['title'] ?>'></br>
    Description :<br/>
    <textarea name="categoryDescription" rows="4" cols="50">
        <?php echo $categoryInfo['description'] ?>
    </textarea><br/>
    <input type="submit" value="Envoyer">
</form>

</div>