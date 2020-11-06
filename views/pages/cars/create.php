<?php $v->layout('index'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $route->route('web.home'); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $route->route('web.cars.index'); ?>">Carros</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
    </ol>
</nav>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">

                <?= $v->insert('partials/alert'); ?>

                <div class="card">
                    <div class="card-body p-5">
                        <h5 class="card-title h3"><?= $title; ?></h5>
                        <hr>
                        <form action="<?= $route->route('web.cars.store'); ?>" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="brand_id">Marca *</label>
                                    <select name="brand_id" id="brand_id" class="form-control form-control-lg" required>
                                        <option value="" selected disabled hidden>Selecione...</option>
                                        <?php if ($brands): foreach ($brands as $brand): ?>
                                            <option value="<?= $brand->id; ?>"><?= $brand->title; ?></option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="model_id">Modelo *</label>
                                    <select name="model_id" id="model_id" class="form-control form-control-lg" required>
                                        <option value="" selected disabled hidden>Selecione...</option>
                                        <?php if ($models): foreach ($models as $model): ?>
                                            <option value="<?= $model->id; ?>"><?= $model->title; ?></option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="year">Ano *</label>
                                    <input type="number" name="year" id="year" value="<?= date('Y'); ?>" class="form-control form-control-lg" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price">Preço *</label>
                                    <input type="text" name="price" id="price" class="mask-money form-control form-control-lg" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city">Cidade *</label>
                                <input type="text" name="city" id="city" class="form-control form-control-lg" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <textarea name="description" id="description" rows="2" class="form-control form-control-lg"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="content">Conteúdo</label>
                                <textarea name="content" id="content" rows="3" class="form-control form-control-lg"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                <i class="fas fa-save"></i>
                                Salvar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
