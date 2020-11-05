<?php $v->layout('index'); ?>

<section class="py-5">
    <div class="container">
        <?php if ($cars): ?>
            <div class="row">
                <!--sidebar-->
                <aside class="col-3">
                    <div class="card">
                        <div class="card-body p-4">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label class="d-none" for="brand_id">Marca</label>
                                    <select name="brand_id" id="brand_id" class="form-control">
                                        <option value="" selected disabled hidden>Marca</option>
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <option value="">Audi</option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="d-none" for="model_id">Modelo</label>
                                    <select name="model_id" id="model_id" class="form-control">
                                        <option value="" selected disabled hidden>Modelo</option>
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <option value="">A3</option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="d-none" for="year_min">Ano Min.</label>
                                    <select name="year_min" id="year_min" class="form-control">
                                        <option value="" selected disabled hidden>Ano Min.</option>
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <option value="">200<?= $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="d-none" for="year_max">Ano Máx.</label>
                                    <select name="year_max" id="year_max" class="form-control">
                                        <option value="" selected disabled hidden>Ano Máx.</option>
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <option value="">200<?= $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="d-none" for="price_min">Preço Min.</label>
                                    <select name="price_min" id="price_min" class="form-control">
                                        <option value="" selected disabled hidden>Preço Min.</option>
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <option value="">R$ 1.00<?= $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="d-none" for="price_max">Preço Máx.</label>
                                    <select name="price_max" id="price_max" class="form-control">
                                        <option value="" selected disabled hidden>Preço Máx.</option>
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <option value="">R$ 1.00<?= $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="d-none" for="city">Cidade</label>
                                    <select name="city" id="city" class="form-control">
                                        <option value="" selected disabled hidden>Cidade</option>
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <option value="">Juiz de Fora</option>
                                        <?php endfor; ?>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fas fa-search"></i>
                                    Buscar
                                </button>
                            </form>
                        </div>
                    </div>
                </aside>
                <!--/sidebar-->

                <!--listing-->
                <div class="col-9">
                    <?php foreach ($cars as $car): ?>
                        <div class="card mb-4">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="//placehold.it/426x240" alt="..." class="card-img">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $car->brand()->title . ' - ' . $car->model()->title; ?></h5>
                                        <p class="card-text"><?= $car->description; ?></p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!--listing-->
            </div>
        <?php else: ?>
            <div class="alert alert-info" role="alert">
                Não há carros cadastrados. <a href="<?= $route->route('web.cars.create'); ?>">Clique aqui</a> para cadastrar.
            </div>
        <?php endif; ?>
    </div>
</section>