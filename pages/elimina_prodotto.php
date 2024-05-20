<?php
// Includi il file di connessione al database
require_once '../db.php';

session_start();

// Verifica se l'utente è loggato e se è un amministratore
if (!isset($_SESSION['user_id']) || $_SESSION['ruolo'] !== 'admin') {
    // Reindirizza l'utente alla pagina di login se non è loggato o non è un amministratore
    header("Location: login.php");
    exit();
}

// Verifica se è stato passato un ID di prodotto
if (isset($_POST['productId'])) {
    // Ottieni l'ID del prodotto dall'input POST
    $productId = $_POST['productId'];

    try {
        // Prepara e esegui la query per eliminare il prodotto dal database
        $stmt = $pdo->prepare("DELETE FROM prodotti WHERE id = ?");
        $stmt->execute([$productId]);

        // Reindirizza l'utente alla pagina principale o esegui altre azioni necessarie
        header('Location: /epiclothes/pages/dashboard.php');
        exit();
    } catch (PDOException $e) {
        // Gestisce eventuali errori di eliminazione del prodotto
        echo "Errore durante l'eliminazione del prodotto: " . $e->getMessage();
    }
} else {
    // Se l'ID del prodotto non è stato passato, reindirizza alla pagina principale
    header('Location: /epiclothes/pages/dashboard.php');
    exit();
}
