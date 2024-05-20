<?php
// Includi il file di connessione al database e la classe Product
require_once '../db.php';
require_once '../classes/Product.php';

session_start();

// Verifica se l'utente è loggato e se è un amministratore
if (!isset($_SESSION['user_id']) || $_SESSION['ruolo'] !== 'admin') {
    // Reindirizza l'utente alla pagina di login se non è loggato o non è un amministratore
    header("Location: login.php");
    exit();
}

// Crea un'istanza della classe Product
$product = new Product($pdo);

// Verifica se i dati sono stati inviati tramite POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera i dati inviati dal modulo di modifica
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productPrice = $_POST['productPrice'];
    $productQuantity = $_POST['productQuantity'];

    // Esegui l'aggiornamento del prodotto
    $result = $product->updateProduct($productId, $productName, $productDescription, $productPrice, $productQuantity);

    // Verifica se l'aggiornamento è riuscito
    if ($result) {
        // Reindirizza alla pagina di gestione dei prodotti con un messaggio di successo
        header('Location: /epiclothes/pages/dashboard.php');
        exit;
    } else {
        // Reindirizza alla pagina di gestione dei prodotti con un messaggio di errore
        header('Location: /epiclothes/pages/dashboard.php');
        exit;
    }
} else {
    // Reindirizza alla pagina di gestione dei prodotti se il metodo di richiesta non è POST
    header('Location: /epiclothes/pages/dashboard.php');
    exit;
}
