<?php
// Verifica se sono stati inviati dati dal form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Includi il file di connessione al database
    require_once 'db.php';
    // Includi la classe Product
    require_once 'Product.php';

    // Inizializza una nuova istanza della classe Product
    $product = new Product($pdo);

    // Recupera i dati dal form
    $productName = $_POST["productName"];
    $productDescription = $_POST["productDescription"];
    $productPrice = $_POST["productPrice"];
    $productQuantity = $_POST["productQuantity"];

    // Esegui la query per aggiungere il nuovo prodotto al database
    $stmt = $pdo->prepare("INSERT INTO prodotti (nome, descrizione, prezzo, quantita_disponibile) VALUES (?, ?, ?, ?)");
    $stmt->execute([$productName, $productDescription, $productPrice, $productQuantity]);

    // Reindirizza l'utente alla pagina di successo o ad altre azioni necessarie
    header("Location: success.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add New Product</title>
    <!-- Includi i fogli di stile necessari -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Includi i font-awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
</head>

<body>
    <!-- Aggiunta del form per l'aggiunta di un nuovo prodotto -->
    <div class="container mt-4">
        <h2>Add New Product</h2>
        <form id="addProductForm" method="POST" action="">
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productName" name="productName" required />
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label">Product Description</label>
                <textarea class="form-control" id="productDescription" name="productDescription" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label">Product Price</label>
                <input type="text" class="form-control" id="productPrice" name="productPrice" pattern="^\d+(\.\d{1,2})?$" title="Enter a valid price (max. two decimal places)" required />
            </div>
            <div class="mb-3">
                <label for="productQuantity" class="form-label">Product Quantity</label>
                <input type="text" class="form-control" id="productQuantity" name="productQuantity" required />
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>

    <!-- Includi i file JavaScript necessari -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>