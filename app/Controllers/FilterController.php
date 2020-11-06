<?php


namespace App\Controllers;


use App\Core\Controller;
use App\Models\Car;
use App\Models\Category;
use App\Support\Formatter;

class FilterController extends Controller
{
    public function filter(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        //brand to model
        if ($data['select'] == 'brand') {
            $models = (new Car())
                ->find(
                    'brand_id = :brand',
                    "brand={$data['brand']}",
                    'model_id'
                )
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
                ->find(
                    'model_id = :model AND brand_id = :brand',
                    "model={$data['model']}&brand={$data['brand']}",
                    'year'
                )
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
                ->find(
                    'year = :y AND model_id = :model AND brand_id = :brand',
                    "y={$data['year']}&model={$data['model']}&brand={$data['brand']}",
                    'price'
                )
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
                ->find(
                    'price = :p AND year = :y AND model_id = :model AND brand_id = :brand',
                    "p={$data['price']}&y={$data['year']}&model={$data['model']}&brand={$data['brand']}",
                    'city'
                )
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

        $this->route->redirect('web.filter.search', [
            'brand' => ($data['brand'] ?? 'all'),
            'model' => ($data['model'] ?? 'all'),
            'year' => ($data['year'] ?? 'all'),
            'price' => ($data['price'] ?? 'all'),
            'city' => ($data['city'] ?? 'all'),
        ]);
    }

    public function search(array $data)
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $brand = null;
        if ($data['brand'] != 'all') {
            $brand = [
                'term' => ' AND brand_id = :brand_id',
                'param' => "&brand_id={$data['brand']}",
            ];
        }

        $model = null;
        if ($data['model'] != 'all') {
            $model = [
                'term' => ' AND model_id = :model_id',
                'param' => "&model_id={$data['model']}",
            ];
        }

        $year = null;
        if ($data['year'] != 'all') {
            $year = [
                'term' => ' AND year = :year',
                'param' => "&year={$data['year']}",
            ];
        }

        $price = null;
        if ($data['price'] != 'all') {
            $price = [
                'term' => ' AND price = :price',
                'param' => "&price={$data['price']}",
            ];
        }

        $city = null;
        if ($data['city'] != 'all') {
            $city = [
                'term' => ' AND city = :city',
                'param' => "&city={$data['city']}",
            ];
        }

        $cars = (new Car())
            ->find(
                '1 = :a' . $brand['term'] . $model['term'] . $year['term'] . $price['term'] . $city['term'],
                'a=1' . $brand['param'] . $model['param'] . $year['param'] . $price['param'] . $city['param']
            )
            ->fetch(true);

        echo $this->view->render('pages/cars/index', [
            'title' => 'Carros',
            'cars' => $cars,
            'brands' => (new Category())->scopeType(Category::TYPE_BRAND)->fetch(true),
        ]);
    }
}