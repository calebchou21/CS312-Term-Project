<?php
    if (isset($_POST['colorName']) && isset($_POST['hexVal']) ) {
        add();
    }

    function add() {
        $query = DB::query('SELECT COUNT(*) FROM Colors', DB::SELECT)->execute();
        $id = $query[0]['COUNT(*)'];
        $query = DB::query('INSERT INTO Colors (id, colorName, hexVal) VALUES ('.$id.', "'.$_POST['colorName'].'", '.$_POST['hexVal'].')');
        echo "done";
        exit;
    }
?>