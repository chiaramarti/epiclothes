<?php
// Include la classe Product e il file db.php per la connessione al database
require_once './classes/Product.php';
require_once 'db.php';

// Crea un'istanza della classe Product
$productClass = new Product($pdo);

// Ottieni tutti i prodotti
$prodotti = $productClass->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop products</title>
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!--icons-->
    <script src="https://kit.fontawesome.com/45b4d175a7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
    <!--CSS-->
    <link rel="stylesheet" href="assets/header.css" />
    <link rel="stylesheet" href="assets/home.css" />
    <link rel="stylesheet" href="assets/shop.css" />
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lily+Script+One&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Proza+Libre:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet" />
</head>
<header>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#home">
            <img src="assets/epiclothes-high-resolution-logo-transparent.left.png" class="logo" />
        </a>
        <button class="navbar-toggler bottone1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <div class="navbar-nav m-auto">
                <li class="nav-item"><a class="nav-link nav-link1" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link nav-link1" href="shop.html">Shop</a></li>
                <li class="nav-item"><a class="nav-link nav-link1" href="#">Man's</a></li>
                <li class="nav-item"><a class="nav-link nav-link1" href="#">Women's</a></li>
                <li class="nav-item"><a class="nav-link nav-link1" href="#">Contacts</a></li>
            </div>
            <div class="navbar-nav icons-nav">
                <div class="nav-item">
                    <div class="icon-flex">
                        <a class="nav-link nav-link1" href="#"><i class="fa-solid fa-heart"></i></a>
                        <a class="nav-link nav-link1" href="checkout.html"><i class="fa-solid fa-cart-shopping"></i></a>
                        <a class="nav-link nav-link1" href="login.html"><i class="fa-solid fa-user"></i></a>
                        <a class="nav-link nav-link1 admin" href="admin_panel.html"><i class="bi bi-ui-checks-grid"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<body>
    <main>
        <section class="shop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <!--NAVBAR LATERALE-->
                        <div class="shop-sidebar">
                            <!--Categorie varie-->
                            <div class="sidebar-categories">
                                <div class="section-title">
                                    <h4>Categories</h4>
                                </div>
                                <div class="categories-accordion">
                                    <div>
                                        <div class="card">
                                            <div class="card-heading">
                                                <a data-bs-target="#collapseOne" data-bs-toggle="collapse">Women</a>
                                            </div>
                                            <div id="collapseOne" class="collapse show">
                                                <div class="card-body">
                                                    <ul>
                                                        <li><a href="#">Coats</a></li>
                                                        <li><a href="#">Jackets</a></li>
                                                        <li><a href="#">Dresses</a></li>
                                                        <li><a href="#">Shirts</a></li>
                                                        <li><a href="#">T-shirts</a></li>
                                                        <li><a href="#">Jeans</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-heading">
                                                <a data-bs-toggle="collapse" data-bs-target="#collapseTwo">Men</a>
                                            </div>
                                            <div id="collapseTwo" class="collapse">
                                                <div class="card-body">
                                                    <ul>
                                                        <li><a href="#">Coats</a></li>
                                                        <li><a href="#">Jackets</a></li>
                                                        <li><a href="#">Dresses</a></li>
                                                        <li><a href="#">Shirts</a></li>
                                                        <li><a href="#">T-shirts</a></li>
                                                        <li><a href="#">Jeans</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-heading">
                                                <a data-bs-toggle="collapse" data-bs-target="#collapseThree">Kids</a>
                                            </div>
                                            <div id="collapseThree" class="collapse">
                                                <div class="card-body">
                                                    <ul>
                                                        <li><a href="#">Coats</a></li>
                                                        <li><a href="#">Jackets</a></li>
                                                        <li><a href="#">Dresses</a></li>
                                                        <li><a href="#">Shirts</a></li>
                                                        <li><a href="#">T-shirts</a></li>
                                                        <li><a href="#">Jeans</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-heading">
                                                <a data-bs-toggle="collapse" data-bs-target="#collapseFour">Accessories</a>
                                            </div>
                                            <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <ul>
                                                        <li><a href="#">Bags</a></li>
                                                        <li><a href="#">Jewelries</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--sidebar CHECKBOX-->
                            <div class="sidebar-filter">
                                <!-- INPUT RANGE -- NON RIESCO A FARLO DOPPIO QUINDI AMEN-->
                                <div class="sidebar-sizes">
                                    <div class="section-title">
                                        <h4>Shop by size</h4>
                                    </div>
                                    <div class="size-list">
                                        <label for="xxs">
                                            xxs
                                            <input type="checkbox" id="xxs" />
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="xs">
                                            xs
                                            <input type="checkbox" id="xs" />
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="s">
                                            s
                                            <input type="checkbox" id="s" />
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="m">
                                            m
                                            <input type="checkbox" id="m" />
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="l">
                                            l
                                            <input type="checkbox" id="l" />
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="xl">
                                            xl
                                            <input type="checkbox" id="xl" />
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="xxl">
                                            xxl
                                            <input type="checkbox" id="xxl" />
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="sidebar-color">
                                    <div class="section-title">
                                        <h4>Shop by color</h4>
                                    </div>
                                    <div class="size-list color-list">
                                        <label for="black">
                                            Black
                                            <input type="checkbox" id="black" />
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="white">
                                            White
                                            <input type="checkbox" id="white" />
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="red">
                                            Reds
                                            <input type="checkbox" id="red" />
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="grey">
                                            Grey
                                            <input type="checkbox" id="grey" />
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="blue">
                                            Blue
                                            <input type="checkbox" id="blue" />
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="beige">
                                            Beige Tones
                                            <input type="checkbox" id="beige" />
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="greens">
                                            Greens
                                            <input type="checkbox" id="greens" />
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="yellows">
                                            Yellows
                                            <input type="checkbox" id="yellows" />
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--PRODUCTS -- PHP -->
                    <div class="col-lg-9 col-md-9">
                        <div class="row" id="products-container">
                            <?php foreach ($prodotti as $prodotto) : ?>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card h-100">
                                        <img src="<?= $prodotto['img_url'] ?>" class="card-img-top" alt="<?= $prodotto['nome'] ?>" height="400">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= htmlspecialchars($prodotto['nome']) ?></h5>
                                            <p class="card-text"><?= htmlspecialchars($prodotto['descrizione']) ?></p>
                                            <h6>€<?= number_format($prodotto['prezzo'], 2) ?></h6>
                                            <p class="card-text">Disponibili: <?= htmlspecialchars($prodotto['quantita_disponibile']) ?></p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="#" class="btn btn-primary">Aggiungi al carrello</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!--pagination-->
                    <div class="col-lg-12 text-center">
                        <div class="pagination-option">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <footer class="py-5">
                <div class="row justify-content-around">
                    <div class="col-6 col-md-2 mb-3">
                        <h5>Link utili</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Shop</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Man's</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Women's</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Contancts</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-2 mb-3">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Features</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Pricing</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">About</a></li>
                        </ul>
                    </div>

                    <div class="col-md-5 offset-md-1 mb-3">
                        <form>
                            <h5>Subscribe to our newsletter</h5>
                            <p>Monthly digest of what's new and exciting from us.</p>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                <label for="newsletter1" class="visually-hidden">Email address</label>
                                <input id="newsletter1" type="text" class="form-control" placeholder="Email address" />
                                <button class="btn btn1" type="button">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                    <p>© 2022 Company, Inc. All rights reserved.</p>
                    <ul class="list-unstyled d-flex">
                        <li class="px-3">
                            <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
                        </li>
                        <li class="px-3">
                            <a href="#"><i class="fa-brands fa-square-twitter"></i></a>
                        </li>
                        <li class="px-3">
                            <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                        </li>
                    </ul>
                </div>
            </footer>
        </div>
    </footer>
    <!--JS-->
    <script src="assets/js/product.js"></script>
    <!--BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>