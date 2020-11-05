<?php


namespace App\Core;


use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Model
 * @package App\Core
 */
abstract class Model extends DataLayer
{
    /** @var array */
    private $requiredFields = [];

    /**
     * Model constructor.
     * @param string $entity
     * @param array $required
     * @param string $primary
     * @param bool $timestamps
     */
    public function __construct(string $entity, array $required, string $primary = 'id', bool $timestamps = true)
    {
        parent::__construct($entity, $required, $primary, $timestamps);

        $this->requiredFields = $required;
    }

    /**
     * @return array
     */
    public function requiredFields(): array
    {
        return $this->requiredFields;
    }
}