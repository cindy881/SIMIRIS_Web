<?php
session_start();
//session_destroy();
unset($_SESSION['USER']);
header('Location:index.php?hal=home');
