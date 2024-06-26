<?php

namespace App\Controllers;

use App\Models\Cart_model;
use App\Models\Scent_model;
use App\Models\User_model;

class Cart extends BaseController
{
    protected $cartModel;



    public function __construct()
    {
        $this->Cart_model = new Cart_model();
        $this->Scent_model = new Scent_model();
        $this->User_model = new User_model();

    }

    public function index()
    {
        // Fetch cart information
        $data['cart_info'] = $this->Cart_model->getCartInfo();

        // Assuming you have methods in your models to fetch single values for scent ID and user ID
        // $scent = $this->scentModel->getScentInfo(); // Replace with your method
        // $user = $this->userModel->getUserInfo(); // Replace with your method

        // If you want to fetch a single scent ID and user ID, assuming the methods exist in your models
        // $data['scent_id'] = $scent['id'];
        // $data['user_id'] = $user['id'];

        // Load views with data
        echo view('template/header', $data);
        echo view('cart/index', $data);
        echo view('template/footer');
    }


    public function addToCart()
    {
        echo "add rto cart";
        $data['scents'] = $this->Scent_model->getScentInfo();
        $data['users'] = $this->User_model->getUserInfo();
        echo view('template/header', $data);
        echo view('cart/addCart', $data);
        echo view('template/footer');

    }

    public function addCart()
    {

        $validation = \Config\Services::validation();

        $rules = [

            "scent_id" => [
                "label" => "Scent",
                "rules" => "required"
            ],
            "user_id" => [
                "label" => "User",
                "rules" => "required"
            ],
            "quantity" => [
                "label" => "Quantity",
                "rules" => "required|numeric|greater_than[0]"
            ],

        ];
        if (!$this->validate($rules)) {
            $data["validation"] = $validation->getErrors();
            echo view('template/header', $data);
            echo view('cart/addCart', $data);
            echo view('template/footer');
            return;
        }

        $postdata = array(
            "scent_id" => $this->request->getVar("scent_id"),
            "user_id" => $this->request->getVar("user_id"),
            "quantity" => $this->request->getVar("quantity"),
        );

        $scent = $this->Scent_model->getScentById($postdata['scent_id']);
        if($scent['qty'] < $postdata['quantity']) {
            return redirect()->back()->with('error', 'Quantity is not available.');
        }
        $scentData = $scent;
        $scentData['qty'] = $scent['qty'] - $postdata['quantity'];

        $this->Scent_model->updateScentRecord($scent['id'], $scentData);
        $result = $this->Cart_model->insertCartItem($postdata);


        if ($result == 1) {
            return redirect()->to('/cart/index');
        }
    }

    public function removeFromCart($cartId)
    {
        // Retrieve the cart item from the database
        $cartItem = $this->Cart_model->getCartItemById($cartId);
    
        if (!$cartItem) {
            return redirect()->back()->with('error', 'Cart item not found.');
        }
    
        // Remove the item from the cart
        $this->Cart_model->deleteCartItem($cartId);
    
        // Update the quantity of the scent in the scent table by increasing it by the quantity that was removed
        $this->Scent_model->increaseScentQuantity($cartItem['scent_id'], $cartItem['quantity']);
    
        // Redirect back to the cart page
        return redirect()->to('/cart/index')->with('success', 'Item removed from cart.');
    }
    
}
