<?php include 'dados.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMETRIA STUDIO 3D</title>

    <?php
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $base_url = $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . '/';
    ?>
    <base href="<?= $base_url ?>">
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
        <a href="." class="header-logo" data-aos="fade-right">
            <img src="imagens/logo.png" alt="Simetria">
        </a>
        <a href="javascript:showMenu()" class="header-menu" data-aos="fade-left">
            <img src="imagens/menu.webp" alt="Menu">
        </a>
        <nav class="header-nav" data-aos="fade-left">
            <ul>
                <li><a href=".">Home</a></li>
                <li><a href="?page=quem-somos">Quem Somos</a></li>
                <li><a href="?page=stl">Arquivos STL</a></li>
                <li><a href="?page=contato">Contato</a></li>
            </ul>
        </nav>
    </header>

    <main class="container my-5">
        <?php
        $page = $_GET['page'] ?? 'home';
        $id   = $_GET['id']   ?? null;
        if ($page === 'home' || $page === '') { ?>
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
            <div class="row justify-content-center">
                <?php foreach ($produtos as $i => $p): if (!($p['destaque'] ?? false)) continue; ?>
                    <div class="col-6 col-md-3 mb-4">
                        <div class="card h-100 text-center shadow-sm">
                            <img src="<?= $p['foto'] ?>" class="card-img-top" style="height: 220px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5><?= $p['nome'] ?></h5>
                                <p class="text-danger fw-bold fs-5">R$ <?= number_format($p['preco'], 2, ',', '.') ?></p>
                                <a href="?page=stl&id=<?= $i ?>" class="btn btn-danger mt-auto">Ver detalhes</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php
        } elseif ($page === 'stl' && $id !== null && isset($produtos[$id])) {
            $p = $produtos[$id];
        ?>
            <div class="row g-5 align-items-center my-5">
                <div class="col-lg-6 text-center">
                    <img src="<?= $p['foto'] ?>" class="img-fluid rounded shadow" style="max-height: 650px;">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-3 fw-bold"><?= $p['nome'] ?></h1>
                    <p class="display-5 text-danger mb-4">
                        R$ <?= number_format($p['preco'], 2, ',', '.') ?>
                    </p>
                    <?php if ($p['destaque'] ?? false): ?>
                        <span class="badge bg-warning text-dark fs-5 px-4 py-2 mb-4">EM DESTAQUE</span>
                    <?php endif; ?>
                    <div class="mt-5">
                        <a href="?page=stl" class="btn btn-outline-secondary btn-lg me-3 px-5">
                            ← Todos os Arquivos
                        </a>
                        <a href="?page=contato" class="btn btn-success btn-lg px-5">
                            Fazer Orçamento
                        </a>
                    </div>
                </div>
            </div>

        <?php
        } elseif ($page === 'stl') { ?>
            <h1 class="text-center my-5 fw-bold">Todos os Arquivos STL</h1>
            <div class="row justify-content-center">
                <?php foreach ($produtos as $i => $p): ?>
                    <div class="col-6 col-md-4 col-lg-3 mb-5">
                        <div class="card h-100 shadow-sm border-0 text-center">
                            <img src="<?= $p['foto'] ?>" class="card-img-top" style="height: 220px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold"><?= $p['nome'] ?></h5>
                                <p class="text-danger fs-4 fw-bold mb-4">
                                    R$ <?= number_format($p['preco'], 2, ',', '.') ?>
                                </p>
                                <a href="?page=stl&id=<?= $i ?>" class="btn btn-danger mt-auto">
                                    Ver Detalhes
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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