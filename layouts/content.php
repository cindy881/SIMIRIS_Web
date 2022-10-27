<?php
include_once 'inner/header.php';
?>
<main id="main">
    <?php
    // error_reporting(0);
    $hal = $_REQUEST['hal'];
    if (!empty($hal)) {
        include_once $hal . '.php';
    } else {
        include_once 'home.php';
    }
    ?>
</main>