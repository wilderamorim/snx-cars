<?php

require dirname(__DIR__, 1) . '/vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= url('/node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= url('/node_modules/@fortawesome/fontawesome-free/css/all.min.css'); ?>">
    <title>Document</title>
</head>
<body>
<!--navbar-->
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?= url(); ?>"><?= SITE_NAME; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= url(); ?>">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--/navbar-->

<!--hero-->
<div class="jumbotron jumbotron-fluid bg-dark mb-0">
    <div class="container">
        <header class="text-center text-light mb-5">
            <h1 class="display-4">Encontre aqui seu próximo carro</h1>
        </header>
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6 col-lg-3">
                            <label class="d-none" for="make">Marca</label>
                            <select name="make" id="make" class="form-control">
                                <option value="" selected disabled hidden>Marca</option>
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <option value="">Audi</option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-lg-3">
                            <label class="d-none" for="model">Modelo</label>
                            <select name="model" id="model" class="form-control">
                                <option value="" selected disabled hidden>Modelo</option>
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <option value="">A3</option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-lg-3">
                            <label class="d-none" for="year_min">Ano Min.</label>
                            <select name="year_min" id="year_min" class="form-control">
                                <option value="" selected disabled hidden>Ano Min.</option>
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <option value="">200<?= $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-lg-3">
                            <label class="d-none" for="year_max">Ano Máx.</label>
                            <select name="year_max" id="year_max" class="form-control">
                                <option value="" selected disabled hidden>Ano Máx.</option>
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <option value="">200<?= $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 col-lg-3 mb-lg-0">
                            <label class="d-none" for="price_min">Preço Min.</label>
                            <select name="price_min" id="price_min" class="form-control">
                                <option value="" selected disabled hidden>Preço Min.</option>
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <option value="">R$ 1.00<?= $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-lg-3 mb-lg-0">
                            <label class="d-none" for="price_max">Preço Máx.</label>
                            <select name="price_max" id="price_max" class="form-control">
                                <option value="" selected disabled hidden>Preço Máx.</option>
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <option value="">R$ 1.00<?= $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-lg-3 mb-sm-0">
                            <label class="d-none" for="city">Cidade</label>
                            <select name="city" id="city" class="form-control">
                                <option value="" selected disabled hidden>Cidade</option>
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <option value="">Juiz de Fora</option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-lg-3 mb-0 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-search"></i>
                                Buscar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/hero-->

<!--listing-->
<section class="py-5">
    <div class="container">
        <header class="text-center mb-5">
            <h2>Últimos Carros</h2>
        </header>
        <div class="row">
            <?php for ($i = 1; $i <= 8; $i++): ?>
                <div class="col-lg-3 mb-4">
                    <article class="card">
                        <img src="//placehold.it/426x240" alt="..." class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Lorem ipsum.</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad asperiores aut culpa error, quam voluptates?</p>
                            <a href="#" class="btn btn-primary">Call To Action</a>
                        </div>
                    </article>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
<!--/listing-->

<!--footer-->
<footer class="py-4 bg-dark text-light text-center">
    <div>Feito com <i class="fas fa-heart text-danger"></i> nas Minas Gerais.</div>
    <div>© 2013-<?= date('Y') . ' ' . SITE_NAME; ?>. Todos os direitos</div>
</footer>
<!--/footer-->

<script src="<?= url('/node_modules/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?= url('/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>