<?php


namespace App\Controllers;


use App\Core\Controller;
use App\Models\Car;
use App\Models\Category;

class CarController extends Controller
{
    public function index()
    {
        echo $this->view->render('pages/cars/index', [
            'title' => 'Carros',
            'cars' => (new Car())->find()->fetch(true),
        ]);
    }

    public function create()
    {
        echo $this->view->render('pages/cars/create', [
            'title' => 'Novo Carro',
            'brands' => (new Category())->scopeType(Category::TYPE_BRAND)->fetch(true),
            'models' => (new Category())->scopeType(Category::TYPE_MODEL)->fetch(true),
        ]);
    }

    public function store(array $data)
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $car = new Car();
        $car->brand_id = $data['brand_id'];
        $car->model_id = $data['model_id'];
        $car->year = $data['year'];
        $car->price = str_replace(',', '.', str_replace('.', null, $data['price']));
        $car->city = $data['city'];
        $car->description = $data['description'];
        $car->content = $data['content'];

        //validator
        foreach ($car->requiredFields() as $field) {
            if (!$data[$field]) {
                $this->route->redirect('web.cars.create', [
                    'type' => 'warning',
                    'message' => 'Preencha todos os campos obrigatórios.'
                ]);
                return;
            }
        }

        //error
        if (!$car->save()) {
            $this->route->redirect('web.cars.create', [
                'type' => 'danger',
                'message' => 'Não foi possível cadastrar. Tente novamente.'
            ]);
            return;
        }

        //success
        $this->route->redirect('web.cars.create', [
            'type' => 'success',
            'message' => 'Cadastrado com sucesso.'
        ]);
    }

    public function edit(array $data)
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        $id = filter_var($data['car'], FILTER_VALIDATE_INT);

        $car = (new Car())->findById($id);
        if (!$car) {
            $this->route->redirect('web.cars.index');
        }

        echo $this->view->render('pages/cars/edit', [
            'title' => 'Editar Carro',
            'car' => $car,
            'brands' => (new Category())->scopeType(Category::TYPE_BRAND)->fetch(true),
            'models' => (new Category())->scopeType(Category::TYPE_MODEL)->fetch(true),
            'select' => function ($value, $field) use ($car) {
                return ($car->$field == $value ? 'selected' : null);
            },
        ]);
    }

    public function update(array $data)
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        $id = filter_var($data['car'], FILTER_VALIDATE_INT);

        $car = (new Car())->findById($id);
        if ($car) {
            $car->brand_id = $data['brand_id'];
            $car->model_id = $data['model_id'];
            $car->year = $data['year'];
            $car->price = str_replace(',', '.', str_replace('.', null, $data['price']));
            $car->city = $data['city'];
            $car->description = $data['description'];
            $car->content = $data['content'];

            //validator
            foreach ($car->requiredFields() as $field) {
                if (!$data[$field]) {
                    $this->route->redirect('web.cars.edit', [
                        'car' => $car->id,
                        'type' => 'warning',
                        'message' => 'Preencha todos os campos obrigatórios.'
                    ]);
                    return;
                }
            }

            //error
            if (!$car->save()) {
                $this->route->redirect('web.cars.edit', [
                    'car' => $car->id,
                    'type' => 'danger',
                    'message' => 'Não foi possível atualizar. Tente novamente.'
                ]);
                return;
            }

            //success
            $this->route->redirect('web.cars.edit', [
                'car' => $car->id,
                'type' => 'success',
                'message' => 'Atualizado com sucesso.'
            ]);
        }
    }

    public function destroy(array $data)
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        $id = filter_var($data['car'], FILTER_VALIDATE_INT);

        $car = (new Car())->findById($id);
        if ($car) {
            $car->destroy();

            //success
            echo json_encode([
                'redirect' => $this->route->route('web.cars.index', [
                    'type' => 'success',
                    'message' => 'Excluído com sucesso.'
                ])
            ]);
        }
    }
}