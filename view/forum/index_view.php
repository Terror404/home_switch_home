<link rel="stylesheet" type="text/css" href="./../view/css/forumstyle.css">

<div class="forumFrame">

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
?>

<table class="forumTable">
<?php
    while ($category = $categoryList->fetch())
    {
        ?>
        <tr>
            <td class='message'>
                <a href="./../controler/content.php?page=showForum&amp;c=<?php echo $category['id'] ?>">
                <!-- Storing category in $_GET['c'] -->
                <strong><?php echo $category['title'] ?></strong></a><br/>
                <?php echo $category['description']?>
            </td>
            <?php
                if (MODIFYING_CATEGORIES) {
                    ?>  <!-- Only available in admin mode -->
                    <td>
                        <form method='post' action="./../controler/content.php?page=forumIndex">
                            <input type='hidden' name='categoryDeleteInstruction' value=<?php echo $category['id'] ?>>
                            <input type='submit' class="sub" value='Supprimer'>
                        </form>
                        <form method='get' action="./../controler/content.php">
                            <input type='hidden' name='page' value='editCategory'>
                            <input type='hidden' name='instruction' value='edit'>
                            <input type='hidden' name='c' value=<?php echo $category['id'] ?>>
                            <input type='submit' class="sub" value='Modifier'>
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
    if (MODIFYING_CATEGORIES) {
        ?>
        <form method='get' action="./../controler/content.php">
            <input type='hidden' name='page' value='editCategory'>
            <input type='hidden' name='instruction' value='add'>
            <input type='submit' class="sub" value='Ajouter une nouvelle catégorie'>
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
            <input type='submit' class="sub" value="<?php echo $tempButtonLabel ?>">
        </form>
        <?php
    }
?>
</div>