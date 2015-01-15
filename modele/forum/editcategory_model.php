<?php

$instructionOkSoFar = (
    isset($_GET['instruction'])
    AND (
        $_GET['instruction'] == 'edit'
        OR $_GET['instruction'] == 'add'
    )
);

if ($instructionOkSoFar) {
    if ($_GET['instruction'] == 'edit') {
        if (isset($_GET['c'])) {
            define("CATEGORY_TO_EDIT", (int)$_GET['c']);
        }
        else {
            $instructionOkSoFar = false;
        }
    }
    elseif ($_GET['instruction'] == 'add') {
        //Do nothing, it's just to avoid instructionOkSoFar being set to false
        //in a clear fashion.
    }
    else {
        $instructionOkSoFar = false;
    }
}

define("INSTRUCTION_OK", $instructionOkSoFar);
if (INSTRUCTION_OK) {
    define("INSTRUCTION", $_GET['instruction']);
    if (INSTRUCTION == 'edit') {
        $categoryInfoQuery = $DB->query("
            SELECT  title       AS title,
                    description AS description
            FROM    category
            WHERE   id =" . CATEGORY_TO_EDIT
        );
        $categoryInfo = $categoryInfoQuery->fetch();
        define("CATEGORY_EXISTS", ($categoryInfo != null));
    }
    else {
        $categoryInfo = array('title'=>'','description'=>'');
    }
}