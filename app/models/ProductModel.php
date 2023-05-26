<?php

namespace App\Models;

use App\Core\Model;

class ProductModel extends Model
{
    public $name;
    public $co2;

    public function __construct()
    {
        /*FIXME: $this->pdo = NULL */
    }
}
