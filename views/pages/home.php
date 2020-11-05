<?php $v->layout('index'); ?>

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
                            <label class="d-none" for="brand_id">Marca</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="" selected disabled hidden>Marca</option>
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <option value="">Audi</option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-lg-3">
                            <label class="d-none" for="model_id">Modelo</label>
                            <select name="model_id" id="model_id" class="form-control">
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
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad asperiores
                                aut culpa error, quam voluptates?</p>
                            <a href="#" class="btn btn-primary">Call To Action</a>
                        </div>
                    </article>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
<!--/listing-->