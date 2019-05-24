<?php
    require_once("include/include.php");
    #On détruit la session
    $_SESSION = array();
    session_destroy();
    #On redirige vers la page d'accueil
    header('Location: index.php');
    exit;
?>