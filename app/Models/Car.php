<?php


namespace App\Models;


use App\Core\Model;
use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Car
 * @package App\Models
 */
class Car extends Model
{
    /**
     * Car constructor.
     */
    public function __construct()
    {
        parent::__construct('cars', ['brand_id', 'model_id', 'year', 'price', 'city']);
    }

    /**
     * @return DataLayer
     */
    public function brand(): DataLayer
    {
        return (new Category())->findById($this->brand_id);
    }

    /**
     * @return DataLayer
     */
    public function model(): DataLayer
    {
        return (new Category())->findById($this->model_id);
    }
}