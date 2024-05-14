<?php

namespace App\Controllers;

use App\Models\Cart_model;
use App\Models\Scent_model;
use App\Models\User_model;

class CartAdd extends BaseController
{
    protected $cartModel;
    protected $scentModel;
    protected $userModel;

    public function __construct()
    {
        $this->cartModel = new Cart_model();
        $this->scentModel = new Scent_model();
        $this->userModel = new User_model();
    }

    public function index()
    {
        // Fetch cart information
        $cartItems = $this->cartModel->getCartInfo();

        // Prepare data to pass to the view
        $data = [
            'cartItems' => $cartItems
        ];


        echo view('home/cart', $data);

    }
}
