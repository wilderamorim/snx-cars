<?php


namespace App\Controllers;


use App\Core\Controller;
use App\Models\Car;
use App\Support\Formatter;

class FilterController extends Controller
{
    public function filter(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        //brand to model
        if ($data['select'] == 'brand') {
            $models = (new Car())
                ->find('brand_id = :b', "b={$data['brand']}", 'model_id')
                ->group('model_id')
                ->order('model_id')
                ->fetch(true);

            $json['models'] = null;
            if ($models) {
                $json['models'] = $this->view->render('partials/option');
                foreach ($models as $model) {
                    $json['models'] .= $this->view->render('partials/option', [
                        'value' => $model->model()->id,
                        'content' => $model->model()->title,
                    ]);
                }
            }

            echo json_encode($json);
            return;
        }

        //model to year
        if ($data['select'] == 'model') {
            $years = (new Car())
                ->find('model_id = :m', "m={$data['model']}", 'year')
                ->group('year')
                ->order('year')
                ->fetch(true);

            $json['years'] = null;
            if ($years) {
                $json['years'] = $this->view->render('partials/option');
                foreach ($years as $year) {
                    $json['years'] .= $this->view->render('partials/option', [
                        'value' => $year->year,
                        'content' => $year->year,
                    ]);
                }
            }

            echo json_encode($json);
            return;
        }

        //year to price
        if ($data['select'] == 'year') {
            $prices = (new Car())
                ->find('year = :y', "y={$data['year']}", 'price')
                ->group('price')
                ->order('price')
                ->fetch(true);

            $json['prices'] = null;
            if ($prices) {
                $json['prices'] = $this->view->render('partials/option');
                foreach ($prices as $price) {
                    $json['prices'] .= $this->view->render('partials/option', [
                        'value' => $price->price,
                        'content' => 'R$ ' . Formatter::moneyHuman($price->price),
                    ]);
                }
            }

            echo json_encode($json);
            return;
        }

        //price to city
        if ($data['select'] == 'price') {
            $cities = (new Car())
                ->find('price = :p', "p={$data['price']}", 'city')
                ->group('city')
                ->order('city')
                ->fetch(true);

            $json['cities'] = null;
            if ($cities) {
                $json['cities'] = $this->view->render('partials/option');
                foreach ($cities as $city) {
                    $json['cities'] .= $this->view->render('partials/option', [
                        'value' => $city->city,
                        'content' => $city->city,
                    ]);
                }
            }

            echo json_encode($json);
            return;
        }
    }

    public function redirect(array $data)
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        echo json_encode([
            'redirect' => $this->route->route('web.filter.search', [
                'brand' => ($data['brand'] ?? 'all'),
                'model' => ($data['model'] ?? 'all'),
                'year_min' => ($data['year'] ?? 'all'),
                'price_min' => ($data['price'] ?? 'all'),
                'city' => ($data['city'] ?? 'all'),
            ])
        ]);
    }

    public function search(array $data)
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        //
    }
}