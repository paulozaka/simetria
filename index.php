<?php include 'dados.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMETRIA</title>
    <base href="https://simetria-3d.xo.je/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="imagens/icone.png">
</head>

<body>
    <header class="header">
        <a href="home" class="header-logo" data-aos="fade-right">
            <img src="imagens/logo.png" alt="Simetria"></a>
        <a href="javascript:showMenu()" class="header-menu" data-aos="fade-left">
            <img src="imagens/menu.webp" alt="Menu"></a>
        <nav class="header-nav" data-aos="fade-left">
            <ul>
                <li><a href="home">Home</a></li>
                <li><a href="quem-somos">Quem Somos</a></li>
                <li><a href="lancamentos">Lançamentos</a></li>
                <li><a href="contato">Contato</a></li>
            </ul>
        </nav>
    </header>
    <main class="container">
        <?php
        $param = $_GET['param'] ?? 'home';
        $p = explode("/", $param);
        $page = $p[0];
        $id = $p[1] ?? null;

        if ($page == 'home' || $page == '') { ?>
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="imagens/banner1.gif" class="d-block w-100" alt="Banner 1">
                    </div>
                    <div class="carousel-item">
                        <img src="imagens/banner2.gif" class="d-block w-100" alt="Banner 2">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>

            <h2 class="text-center my-5">Produtos em Destaque</h2>
            <div class="row">
                <?php foreach ($produtos as $i => $prod): ?>
                    <?php if ($prod['destaque']): ?>
                        <div class="col-6 col-md-3 mb-4">
                            <div class="card h-100 text-center">
                                <img src="<?= $prod['foto'] ?>" class="card-img-top">
                                <div class="card-body d-flex flex-column">
                                    <h5><?= $prod['nome'] ?></h5>
                                    <p class="text-danger fw-bold">R$ <?= number_format($prod['preco'], 2, ',', '.') ?></p>
                                    <a href="produto/<?= $i ?>" class="btn btn-danger mt-auto">Ver detalhes</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

        <?php
        } elseif ($page == 'produto' && $id !== null && isset($produtos[$id])) {
            $prod = $produtos[$id];
        ?>
            <div class="row my-5">
                <div class="col-md-6">
                    <img src="<?= $prod['foto'] ?>" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-6">
                    <h1><?= $prod['nome'] ?></h1>
                    <p class="display-5 text-danger">R$ <?= number_format($prod['preco'], 2, ',', '.') ?></p>
                    <button class="btn btn-success btn-lg">Comprar Agora</button>
                    <a href="home" class="btn btn-secondary btn-lg ms-3">Voltar</a>
                </div>
            </div>

        <?php
        } else {
            $arquivo = "paginas/{$page}.php";
            if (file_exists($arquivo)) {
                include $arquivo;
            } else {
                include "paginas/erro.php";
            }
        }
        ?>
    </main>

    <footer class="footer">
        <p>SIMETRIA STUDIO 3D® - Todos os direitos reservados.</p>
    </footer>

    <script src="js/aos.js"></script>
    <script src="js/fslightbox.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        AOS.init();
        function showMenu() {
            document.querySelector(".header-nav").classList.toggle("show");
        }
    </script>
</body>

</html>