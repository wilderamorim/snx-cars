<?php


namespace App\Models;


use App\Core\Model;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{
    /**
     * Category constructor.
     */
    public function __construct()
    {
        parent::__construct('categories', ['title', 'type']);
    }
}