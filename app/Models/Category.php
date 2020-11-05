<?php


namespace App\Models;


use App\Core\Model;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{
    public const TYPE_BRAND = 'brand';

    public const TYPE_MODEL = 'model';

    /**
     * Category constructor.
     */
    public function __construct()
    {
        parent::__construct('categories', ['title', 'type']);
    }

    /**
     * @param string $type
     * @return Category
     */
    public function scopeType(string $type): Category
    {
        return parent::find('type = :t', "t={$type}");
    }
}