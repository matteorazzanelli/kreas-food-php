<?php

namespace App\Models;

use App\Core\Model;

class OrderModel extends Model
{
    public $date;
    public $country;

    public function __construct()
    {
        /*FIXME: $this->pdo = NULL */
    }
}
