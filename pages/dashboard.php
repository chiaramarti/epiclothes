<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pannello di Controllo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/45b4d175a7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />

    <link rel="stylesheet" href="../assets/style.css" />
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
                                    <h1 class="display-4 font-weight-bold text-primary text-center">0</h1>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 p-2">
                            <div class="card border-primary rounded-0">
                                <div class="card-header bg-primary rounded-0">
                                    <h5 class="card-title text-white mb-1">Total Products</h5>
                                </div>
                                <div class="card-body">
                                    <h1 id="totalProductsNumber" class="display-4 font-weight-bold text-primary text-center">0</h1>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 p-2">
                            <div class="card border-success rounded-0">
                                <div class="card-header bg-success rounded-0">
                                    <h5 class="card-title text-white mb-1">Published Products</h5>
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
                                            <th class="category">Category</th>
                                            <th>Price</th>
                                            <th>
                                                <button id="editModeButton" class="btn btn-secondary me-2" id="editModeButton">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                            </th>
                                        </tr>
                                    </thead>
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
    <!-- Modale di avviso -->
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
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Elimina</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale di conferma eliminazione avvenuta con successo -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>