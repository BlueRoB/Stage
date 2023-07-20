<?php
/**
 * @file logout.php
 * @brief Page de déconnexion utilisateur.
 */

session_start();

/**
 * @brief Supprime toutes les données de la session et détruit la session.
 */
$_SESSION = [];
session_destroy();

/**
 * @brief Redirige l'utilisateur vers la page de connexion après la déconnexion.
 */
header("Location: login.php");
exit;
