<?php

namespace Tests\Feature;

use Tests\TestCase;
use Faker\Factory;

abstract class FeatureTest extends TestCase
{

    protected $faker;

    public function __construct(string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->faker = Factory::create();
    }

}