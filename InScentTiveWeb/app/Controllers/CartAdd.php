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
    protected $session;

    public function __construct()
    {
        $this->cartModel = new Cart_model();
        $this->scentModel = new Scent_model();
        $this->userModel = new User_model();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        // Fetch cart information
        $cartItems = $this->cartModel->getUserCarts($this->session->get('user_id'));

        // Prepare data to pass to the view
        $data = [
            'cartItems' => $cartItems,
        ];


        echo view('home/cart', $data);
    }

    public function add()
    {
        $postdata = array(
            "scent_id" => $this->request->getVar("scent_id"),
            "user_id" => $this->session->get('user_id'),
            "quantity" => $this->request->getVar("quantity"),
        );


        $scent = $this->scentModel->getScentById($postdata['scent_id']);
        if ($scent['qty'] < $postdata['quantity']) {
            return redirect()->back()->with('error', 'Quantity is not available.');
        }
        $scentData = $scent;
        $scentData['qty'] = $scent['qty'] - $postdata['quantity'];

        $this->scentModel->updateScentRecord($scent['id'], $scentData);
        $result = $this->cartModel->insertCartItem($postdata);


        if ($result == 1) {
            return redirect()->to('/cartAdded/index');
        }
    }
}
