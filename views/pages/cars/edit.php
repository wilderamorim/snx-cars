<?php $v->layout('index'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $route->route('web.home'); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $route->route('web.cars.index'); ?>">Carros</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar</li>
    </ol>
</nav>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">

                <?php if (!empty($alert->type) && !empty($alert->message)): ?>
                    <div class="alert alert-<?= $alert->type; ?>" role="alert">
                        <?= $alert->message; ?>
                    </div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-body p-5">
                        <form action="<?= $route->route('web.cars.update', ['car' => $car->id]); ?>" method="post">
                            <?= form_spoofing(); ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="brand_id">Marca *</label>
                                    <select name="brand_id" id="brand_id" class="form-control form-control-lg" required>
                                        <option value="" selected disabled hidden>Selecione...</option>
                                        <?php if ($brands): foreach ($brands as $brand): ?>
                                            <option <?= $select($brand->id, 'brand_id'); ?> value="<?= $brand->id; ?>"><?= $brand->title; ?></option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="model_id">Modelo *</label>
                                    <select name="model_id" id="model_id" class="form-control form-control-lg" required>
                                        <option value="" selected disabled hidden>Selecione...</option>
                                        <?php if ($models): foreach ($models as $model): ?>
                                            <option <?= $select($model->id, 'model_id'); ?> value="<?= $model->id; ?>"><?= $model->title; ?></option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="year">Ano *</label>
                                    <input type="number" name="year" id="year" value="<?= $car->year; ?>" class="form-control form-control-lg" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price">Preço *</label>
                                    <input type="text" name="price" id="price" value="<?= $car->price; ?>" class="mask-money form-control form-control-lg" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city">Cidade *</label>
                                <input type="text" name="city" id="city" value="<?= $car->city; ?>" class="form-control form-control-lg" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <textarea name="description" id="description" rows="2" class="form-control form-control-lg"><?= $car->description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="content">Conteúdo</label>
                                <textarea name="content" id="content" rows="3" class="form-control form-control-lg"><?= $car->content; ?></textarea>
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
