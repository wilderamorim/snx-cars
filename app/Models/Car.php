<?php


namespace App\Models;


use App\Core\Model;

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
        parent::__construct('cars', ['brand_id', 'model_id', 'year_min', 'year_max', 'price_min', 'price_max', 'city']);
    }
}