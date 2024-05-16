<?php
// Credenziali di accesso al database
$hostname = "localhost"; // Cambia questo se il database si trova su un altro host
$username = "root"; // Il tuo nome utente MySQL
$password = ""; // La tua password MySQL
$database = "epiclothes"; // Il nome del tuo database

try {
    // Connessione al database MySQL utilizzando PDO
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    // Imposta il modo di gestione degli errori su eccezioni
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Imposta il modo di recupero dei dati su array associativi
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Se la connessione al database fallisce, stampa l'errore
    echo "Errore di connessione al database: " . $e->getMessage();
    // Interrompi l'esecuzione dello script
    die();
}
