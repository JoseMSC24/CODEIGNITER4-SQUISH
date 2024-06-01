<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Product extends BaseController
{
    public function index()
    {
        $model = new ProductModel();
        $data['products'] = $model->findAll();
        
        return view('product/index', $data);
    }

    public function show($id)
    {
        $model = new ProductModel();
        $data['product'] = $model->find($id);

        return view('product/show', $data);
    }

    public function search()
    {
        $query = $this->request->getGet('query');
        $model = new ProductModel();

        if ($query) {
            $data['products'] = $model->searchProductsByName($query);
            $data['query'] = $query; // Mantener el valor de búsqueda en el campo de búsqueda
        } else {
            $data['products'] = $model->findAll();
        }

        return view('product/index', $data);
    }
}
