<?php

namespace App\Controllers;

use App\Core\{App, Controller};

class ProductsController extends Controller
{
    public function index()
    {
        $model = App::get('model');
        $products = $model->selectAll('products', 'App\\Models\\ProductModel');

        if(!is_array($products)) {// if it is not an array it was returned false => bad request!
            $this->setCode(400);
            return $this->renderApi([
              'result' => [],
              'page' => 'products',
              'message' => 'bad request'
            ]);
        }

        // if the array is empty it doesn't mean the query is wrong
        $this->setCode(200);
        return $this->renderApi([
          'result' => $products,
          'page' => 'products',
          'message' => 'showing complete list'
        ]);
    }

    public function store()
    {
        $model = App::get('model');
        $newProduct = $model->insert('products', [
          'name' => $_POST['name'],
          'co2' => $_POST['co2']
        ]);
        if(!$newProduct) {
            $this->setCode(400);
            return $this->renderApi([
              'result' => [],
              'page' => 'products',
              'message' => 'may be the product is already added'
            ]);
        }
        $this->setCode(201);
        return $this->renderApi([
          'result' => $newProduct,
          'page' => 'products',
          'message' => 'new product added with ID'
        ]);
    }

    public function delete()
    {
        $model = App::get('model');
        $deletedProduct = $model->delete('products', 'id', $_POST['id']);
        if(!$deletedProduct) {
            $this->setCode(404);
            return $this->renderApi([
              'result' => '-1', // fail
              'page' => 'products',
              'message' => 'product does not exist'
            ]);
        }
        $this->setCode(200);
        return $this->renderApi([
          'result' => $_POST['id'],
          'page' => 'products',
          'message' => 'deleted correctly product '
        ]);
    }

    public function patch()
    {
        $model = App::get('model');
        $updatedProduct = $model->update('products', 'id', $_POST['id'], [
          'name' => $_POST['name'],
          'co2' => $_POST['co2']
        ]);
        if(!$updatedProduct) {
            $this->setCode(404);
            return $this->renderApi([
              'result' => '-1', // fail
              'page' => 'products',
              'message' => 'product does not exist'
            ]);
        }
        $this->setCode(200);
        return $this->renderApi([
          'result' => $_POST['id'],
          'page' => 'products',
          'message' => 'updated correctly product '
        ]);
    }
}
