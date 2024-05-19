<?php
// Include la classe User e il file db.php per la connessione al database
require_once '../classes/User.php';
require_once '../db.php';

// Avvia la sessione
session_start();

// Verifica se l'utente è già loggato e reindirizza in base al ruolo
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['ruolo'] === 'admin') {
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: ../index.php");
        exit();
    }
}

// Inizializza una nuova istanza della classe User
$user = new User($pdo);

// Verifica se sono stati inviati dati dal form di login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati dal form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Esegui la funzione di login dell'utente
    $userDetails = $user->login($username, $password);

    // Verifica se il login è riuscito
    if ($userDetails) {
        // Memorizza i dettagli dell'utente nella sessione
        $_SESSION["user_id"] = $userDetails["id"];
        $_SESSION["username"] = $userDetails["username"];
        $_SESSION["ruolo"] = $userDetails["ruolo"];

        // Reindirizza l'utente in base al ruolo
        if ($user->isAdmin($userDetails)) {
            header("Location: dashboard.php");
        } else {
            header("Location: ../index.php");
        }
        exit();
    } else {
        // Se il login non è riuscito, mostra un messaggio di errore
        $error_message = "Credenziali non valide. Riprova.";
    }
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error_message)) : ?>
                            <div class="alert alert-danger">
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Accedi</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>Non hai un account? <a href="register.php">Registrati qui</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>