<?php
// Include la classe User e il file db.php per la connessione al database
require_once '../classes/User.php';
require_once '../db.php';

// Inizializza una nuova istanza della classe User
$user = new User($pdo);

// Verifica se sono stati inviati dati dal form di registrazione
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati dal form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $indirizzo = $_POST["indirizzo"];

    // Esegui la funzione di registrazione dell'utente
    $registrationSuccess = $user->register($username, $password, $nome, $cognome, $indirizzo);

    // Verifica se la registrazione è stata completata con successo
    if ($registrationSuccess) {
        // Reindirizza l'utente alla pagina di login
        header("Location: login.php");
        exit();
    } else {
        // Se la registrazione non è riuscita, mostra un messaggio di errore
        $error_message = "Errore durante la registrazione. Riprova.";
    }
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Registrazione</h2>
                <?php if (isset($error_message)) : ?>
                    <div class="alert alert-danger">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                <form id="registrationForm" method="POST" onsubmit="return validatePasswords()">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Conferma Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Conferma Password" required>
                    </div>
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
                    </div>
                    <div class="form-group">
                        <label for="cognome">Cognome</label>
                        <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Cognome" required>
                    </div>
                    <div class="form-group">
                        <label for="indirizzo">Indirizzo</label>
                        <input type="text" class="form-control" id="indirizzo" name="indirizzo" placeholder="Indirizzo" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Registrati</button>
                </form>
                <p class="mt-3 text-center">Hai già un account? <a href="login.php">Accedi qui</a></p>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JavaScript for password validation -->
    <script>
        function validatePasswords() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            if (password !== confirmPassword) {
                alert("Le password non coincidono. Per favore, riprova.");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>