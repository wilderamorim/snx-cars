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
            'alert' => (object)filter_input_array(INPUT_GET, FILTER_SANITIZE_STRIPPED),
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
}