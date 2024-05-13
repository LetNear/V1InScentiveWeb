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

    public function addCart(){
      
        
        
        // Check if the quantity is available
        $scentQuantity = $scent['qty'];
        $existingCartItem = $this->cartModel->getCartItem($scentId, $userId);
        $newQuantity = $existingCartItem ? $existingCartItem['quantity'] + 1 : 1;
        if ($newQuantity > $scentQuantity) {
            return redirect()->back()->with('error', 'The quantity exceeds the available stock.');
        }

        // Add the item to the cart
        $cartData = [
            'user_id' => $userId,
            'scent_id' => $scentId,
            'quantity' => $newQuantity
        ];
        $this->cartModel->insertCartItem($cartData);

        // Redirect back to the cart page
        return redirect()->to('/cart/index')->with('success', 'Item added to cart.');
    }

    // public function removeFromCart($cartId)
    // {
    //     // Retrieve the cart item from the database
    //     $cartItem = $this->cartModel->getCartItemById($cartId);

    //     if (!$cartItem) {
    //         return redirect()->back()->with('error', 'Cart item not found.');
    //     }

    //     // Decrease the quantity in the cart by 1
    //     $newQuantity = $cartItem['quantity'] - 1;
    //     if ($newQuantity > 0) {
    //         // If the new quantity is greater than 0, update the cart item quantity
    //         $this->cartModel->updateCartItemQuantity($cartId, $newQuantity);
    //     } else {
    //         // If the new quantity is 0, remove the item from the cart
    //         $this->cartModel->deleteCartItem($cartId);
    //     }

    //     // Update the quantity of the scent in the scent table by increasing it by 1
    //     $this->scentModel->increaseScentQuantity($cartItem['scent_id']);

    //     // Redirect back to the cart page
    //     return redirect()->to('/cart')->with('success', 'Item removed from cart.');
    // }
}
