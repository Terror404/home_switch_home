<link rel="stylesheet" type="text/css" href="./../view/css/forumstyle.css">

<div class="ForumFrame">

<?php
    //confirmation message for modifying categories
    if (isset($successfullyModifiedCategories)) {
        displayConfirmation(
            $successfullyModifiedCategories,
            "Les catégories ont été modifiées.",
            "la modification de catégories",
            $reasonForCategoryModificationFailure
        );
    }
    
    //confirmation message for deleting a category
    if (isset($successfullyDeletedCategory)) {
        displayConfirmation(
            $successfullyDeletedCategory,
            "La catégorie a été supprimée.",
            "la suppression de catégorie",
            $reasonForCategoryDeletionFailure
        );
    }
    
    //confirmation message for moving a category
    if (isset($successfullyMovedCategory)) {
        displayConfirmation(
            $successfullyMovedCategory,
            "La catégorie a été déplacée.",
            "le déplacement de la catégorie",
            $reasonForCategoryMovementFailure
        );
    }
?>

<table class="ForumTable">
<?php
    while ($category = $categoryList->fetch())
    {
        ?>
        <tr>
            <td class='TitlePanel'>
                <a href="./../controler/content.php?page=showForum&amp;c=<?php echo $category['id'] ?>">
                <!-- Storing category in $_GET['c'] -->
                <strong><?php echo $category['title'] ?></strong></a><br/>
                <?php echo $category['description']?>
            </td>
            <?php
                if (MODIFYING_CATEGORIES) {
                    ?>  <!-- Only available in admin mode -->
                    <td>
                        <!-- Edit button -->
                        <form method='get' action="./../controler/content.php">
                            <input type='hidden' name='page' value='editCategory'>
                            <input type='hidden' name='instruction' value='edit'>
                            <input type='hidden' name='c' value=<?php echo $category['id'] ?>>
                            <input type='submit' value='Modifier'>
                        </form>
                    </td>
                    <td>
                        <!-- Move up button -->
                        <form method='post' action="./../controler/content.php?page=forumIndex">
                            <input type='hidden' name='categoryMoveUp' value=<?php echo $category['id'] ?>>
                            <input type='submit' value='Monter'>
                        </form>
                    </td>
                    <td>
                        <!-- Move down button -->
                        <form method='post' action="./../controler/content.php?page=forumIndex">
                            <input type='hidden' name='categoryMoveDown' value=<?php echo $category['id'] ?>>
                            <input type='submit' value='Descendre'>
                        </form>
                    </td>
                    <td>
                        <!-- Delete button -->
                        <form method='post' action="./../controler/content.php?page=forumIndex">
                            <input type='hidden' name='categoryDeleteInstruction' value=<?php echo $category['id'] ?>>
                            <input type='submit' value='Supprimer'>
                        </form>
                    </td>
                    <?php
                }
            ?>
        </tr>
        <?php
    }
    $categoryList->closeCursor();
?>
</table>

<?php
    if (CAN_MODIFY_CATEGORIES) {
        echo "<br/>";
    }

    if (MODIFYING_CATEGORIES) {
        ?>
        <form method='get' action="./../controler/content.php">
            <input type='hidden' name='page' value='editCategory'>
            <input type='hidden' name='instruction' value='add'>
            <input type='submit' class="SubmitButton" value='Ajouter une nouvelle catégorie'>
        </form>
        <?php
    }

    if (CAN_MODIFY_CATEGORIES) {
        ?>
        <form method='post' action="./../controler/content.php?page=forumIndex">
            <input type='hidden' name="forumCategoryModificationMode" value=<?php echo !MODIFYING_CATEGORIES ?>>
            <?php
                if (MODIFYING_CATEGORIES) {
                    $tempButtonLabel = "Désactiver les outils d'administration des catégories.";
                }
                else {
                    $tempButtonLabel = "Activer les outils d'administration des catégories.";
                }
            ?>
            <input type='submit' class="SubmitButton" value="<?php echo $tempButtonLabel ?>">
        </form>
        <?php
    }
?>

</div>