<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= url('/node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= url('/node_modules/@fortawesome/fontawesome-free/css/all.min.css'); ?>">
    <title><?= $title . ' - ' . SITE_NAME; ?></title>
</head>
<body>
<!--navbar-->
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?= $route->route('web.home'); ?>"><?= SITE_NAME; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $route->route('web.home'); ?>">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Carros
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= $route->route('web.cars.index'); ?>">Ver Carros</a>
                        <a class="dropdown-item" href="<?= $route->route('web.cars.create'); ?>">Novo Carro</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--/navbar-->

<!--content-->
<?= $v->section('content'); ?>
<!--/content-->

<!--footer-->
<footer class="py-4 bg-dark text-light text-center">
    <div>Feito com <i class="fas fa-heart text-danger"></i> nas Minas Gerais.</div>
    <div>© 2013-<?= date('Y') . ' ' . SITE_NAME; ?>. Todos os direitos</div>
</footer>
<!--/footer-->

<script src="<?= url('/node_modules/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?= url('/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= url('/node_modules/jquery-mask-plugin/dist/jquery.mask.min.js'); ?>"></script>
<script src="<?= asset('/js/script.js'); ?>"></script>
<?= $v->section('js'); ?>
</body>
</html>