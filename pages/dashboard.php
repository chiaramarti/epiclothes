<?php
// Includi il file di connessione al database
require_once '../db.php';

// Recupera il numero totale di utenti
$stmt = $pdo->query("SELECT COUNT(*) AS total_users FROM utenti");
$totalUsers = $stmt->fetch(PDO::FETCH_ASSOC)['total_users'];

// Recupera il numero totale di prodotti
$stmt = $pdo->query("SELECT COUNT(*) AS total_products FROM prodotti");
$totalProducts = $stmt->fetch(PDO::FETCH_ASSOC)['total_products'];

?>


<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pannello di Controllo</title>
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!--icons-->
    <script src="https://kit.fontawesome.com/45b4d175a7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />

    <link rel="stylesheet" href="../assets/dashboard.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lily+Script+One&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Proza+Libre:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet" />
</head>

<body>
    <header>
        <div class="admin-header">
            <a href="/products.html">
                <img src="../assets/epiclothes-high-resolution-logo-white-transparent1.png" alt="" />
            </a>
        </div>
    </header>

    <main>
        <div class="container-fluid p-0">
            <div class="row">
                <!--sidebar-->
                <div class="col-lg-2 sidebar">
                    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
                        <a href="/" class="d-flex align-items-center mx-1 mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-4">Control Panel</span>
                        </a>
                        <hr />
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="/products.html" class="nav-link active" aria-current="page">
                                    <i class="bi bi-house-door-fill"></i> <span>Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white"> <i class="bi bi-box2-heart"></i> <span>Orders</span> </a>
                            </li>
                            <li>
                                <a href="add_product.php" class="nav-link text-white">
                                    <i class="bi bi-border-all"></i> <span>Add new product</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white"> <i class="bi bi-people"></i> <span>Users</span> </a>
                            </li>
                        </ul>
                        <hr />
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="" alt="" width="32" height="32" class="rounded-circle me-2" />
                                <strong>Admin</strong>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <a class="dropdown-item" href="../pages/logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--riepilogo-->
                <div class="col-lg-10">
                    <div class="row mx-2">
                        <div class="col-lg-4 col-md-6 p-2">
                            <div class="card border-primary rounded-0">
                                <div class="card-header bg-primary rounded-0">
                                    <h5 class="card-title text-white mb-1">Total Users</h5>
                                </div>
                                <div class="card-body">
                                    <h1 class="display-4 font-weight-bold text-primary text-center"><?php echo $totalUsers; ?></h1>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 p-2">
                            <div class="card border-primary rounded-0">
                                <div class="card-header bg-primary rounded-0">
                                    <h5 class="card-title text-white mb-1">Total Products</h5>
                                </div>
                                <div class="card-body">
                                    <h1 id="totalProductsNumber" class="display-4 font-weight-bold text-primary text-center"><?php echo $totalProducts; ?></h1>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 p-2">
                            <div class="card border-success rounded-0">
                                <div class="card-header bg-success rounded-0">
                                    <h5 class="card-title text-white mb-1">Orders</h5>
                                </div>
                                <div class="card-body">
                                    <h1 id="publishedProductsNumber" class="display-4 font-weight-bold text-success text-center">0</h1>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--tabella-->
                    <div class="row m-2 mt-5">
                        <div class="col-12 mb-3 text-center">
                            <h4 class="title-products">Products</h4>
                        </div>
                        <div class="col-12 mx-1">
                            <div class="table-responsive">
                                <table id="productTable" class="table table-striped">
                                    <thead id="productSummary" class="thead-inverse">
                                        <tr>
                                            <th>Image</th>
                                            <th>Label</th>
                                            <th class="description">Description</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tbody>
                                        <?php
                                        // Includi il file di connessione al database
                                        require_once '../db.php';

                                        // Esegui la query per recuperare i dati dalla tabella 'prodotti'
                                        $stmt = $pdo->query("SELECT id, img_url, nome, descrizione, prezzo, quantita_disponibile FROM prodotti");

                                        // Itera sui risultati della query e popola la tabella HTML
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            $productJson = htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8');
                                            echo "<tr>";
                                            echo "<td><img src='{$row['img_url']}' alt='Product Image' style='max-width: 100px; max-height: 100px;' /></td>";
                                            echo "<td>{$row['nome']}</td>";
                                            echo "<td>{$row['descrizione']}</td>";
                                            echo "<td>{$row['prezzo']}</td>";
                                            echo "<td>{$row['quantita_disponibile']}</td>";
                                            echo "<td>"; // Apertura cella per pulsanti di azione
                                            echo "<button class='btn btn-danger delete-product-btn' data-bs-toggle='modal' data-bs-target='#deleteConfirmationModal' data-product-id='{$row['id']}' onclick='setProductId({$row['id']})'><i class='bi bi-trash'></i></button>";
                                            echo "<button class='btn btn-primary ms-2 edit-product-btn' data-bs-toggle='modal' data-bs-target='#editProductModal' data-product='$productJson'><i class='bi bi-pencil'></i></button>";
                                            echo "</td>"; // Chiusura cella per pulsanti di azione
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <a id="more"></a>
                    <hr />
                </div>
            </div>
        </div>
    </main>
    <!-- Modal di conferma eliminazione -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Conferma eliminazione</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Sei sicuro di voler eliminare questo prodotto?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form type="hidden" id=" deleteForm" method="post" action="elimina_prodotto.php">
                        <input id="productId" name="productId" value="">
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal di conferma eliminazione avvenuta con successo -->
    <div class="modal fade" id="deleteSuccessModal" tabindex="-1" aria-labelledby="deleteSuccessModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSuccessModalLabel">Eliminazione avvenuta con successo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Il prodotto è stato eliminato con successo.</div>
            </div>
        </div>
    </div>

    <!-- Modal di modifica prodotto -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Modifica Prodotto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editProductForm" method="post" action="update_product.php">
                    <div class="modal-body">
                        <input type="hidden" id="editProductId" name="productId" value="">
                        <div class="mb-3">
                            <label for="editProductName" class="form-label">Nome Prodotto</label>
                            <input type="text" class="form-control" id="editProductName" name="productName">
                        </div>
                        <div class="mb-3">
                            <label for="editProductDescription" class="form-label">Descrizione</label>
                            <textarea class="form-control" id="editProductDescription" name="productDescription" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editProductPrice" class="form-label">Prezzo</label>
                            <input type="text" class="form-control" id="editProductPrice" name="productPrice">
                        </div>
                        <div class="mb-3">
                            <label for="editProductQuantity" class="form-label">Quantità</label>
                            <input type="text" class="form-control" id="editProductQuantity" name="productQuantity">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <button type="submit" class="btn btn-primary">Salva modifiche</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        // Funzione per impostare l'ID del prodotto da eliminare nel form di eliminazione
        function setProductId(productId) {
            document.getElementById('productId').value = productId;
        }

        // Funzione per popolare il modal di modifica prodotto con i dati del prodotto selezionato
        function populateEditProductModal(product) {
            document.getElementById('editProductId').value = product.id;
            document.getElementById('editProductName').value = product.nome;
            document.getElementById('editProductDescription').value = product.descrizione;
            document.getElementById('editProductPrice').value = product.prezzo;
            document.getElementById('editProductQuantity').value = product.quantita_disponibile;
        }

        // Aggiungi un event listener per i pulsanti di modifica prodotto
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-product-btn');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const product = JSON.parse(this.getAttribute('data-product'));
                    populateEditProductModal(product);
                });
            });
        });
    </script>

</body>

</html>