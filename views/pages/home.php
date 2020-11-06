<?php $v->layout('index'); ?>

<!--hero-->
<div class="jumbotron jumbotron-fluid bg-dark mb-0">
    <div class="container">
        <header class="text-center text-light mb-5">
            <h1 class="display-4">Encontre aqui seu próximo carro</h1>
        </header>
        <div class="card">
            <div class="card-body">
                <form id="smartFilter" action="<?= $route->route('web.filter.redirect'); ?>" data-action="<?= $route->route('web.filter.filter'); ?>" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6 col-lg-4">
                            <label for="brand">Marca</label>
                            <select name="brand" id="brand" class="form-control">
                                <option value="all">Todas</option>
                                <?php if ($brands): foreach ($brands as $brand): ?>
                                    <option value="<?= $brand->id; ?>"><?= $brand->title; ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-lg-4">
                            <label for="model">Modelo</label>
                            <select name="model" id="model" class="form-control">
                                <option value="all">Todos</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-lg-4">
                            <label for="year">Ano</label>
                            <select name="year" id="year" class="form-control">
                                <option value="all">Todos</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-lg-4 mb-lg-0">
                            <label for="price">Preço</label>
                            <select name="price" id="price" class="form-control">
                                <option value="all">Todos</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-lg-4 mb-sm-0">
                            <label for="city">Cidade</label>
                            <select name="city" id="city" class="form-control">
                                <option value="all">Todas</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-lg-4 mb-0 d-flex align-items-end">
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
        <?php if ($cars): ?>
            <div class="row">
                <?php foreach ($cars as $car): ?>
                    <div class="col-lg-3 mb-4">
                        <article class="card">
                            <img src="//placehold.it/426x240" alt="..." class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?= $car->brand()->title . ' - ' . $car->model()->title; ?></h5>
                                <p class="card-text"><?= $car->description; ?></p>
                                <a href="#" class="btn btn-primary">Call To Action</a>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-info" role="alert">
                Não há carros cadastrados. <a href="<?= $route->route('web.cars.create'); ?>">Clique aqui</a> para cadastrar.
            </div>
        <?php endif; ?>
    </div>
</section>
<!--/listing-->
