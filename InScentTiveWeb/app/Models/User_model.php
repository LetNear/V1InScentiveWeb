<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'user'; // Set the table name

    protected $allowedFields = ['nickName', 'fullName', 'email', 'password']; // Specify the fields that can be mass-assigned

    public function getUserInfo()
    {
        return $this->findAll(); // Retrieve all user records
    }

    public function getUserInfoBySN($SN)
    {
        return $this->find($SN); // Retrieve a user record by userID
    }

    public function getUserInfoByEmail($email)
    {
        return $this->where('email', $email)->first(); // Retrieve a user record by email
    }

    public function insertUserRecord($data)
    {
        return $this->insert($data); // Insert a new user record
    }

    public function updateUserRecord($SN, $data)
    {
        return $this->update($SN, $data); // Update a user record by userID
    }

    public function deleteUserRecord($SN)
    {
        return $this->delete($SN); // Delete a user record by userID
    }

    public function getUserCart($userID)
    {
        // Assuming 'cart' is a separate model and represents the cart table
        $cartModel = new Cart_model();
        return $cartModel->where('user_id', $userID)->findAll(); // Retrieve cart details for a user
    }
}
