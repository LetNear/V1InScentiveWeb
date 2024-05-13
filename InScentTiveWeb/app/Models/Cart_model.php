<?php

namespace App\Models;

use CodeIgniter\Model;

class Cart_model extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'scent_id', 'quantity'];

    public function getCartInfo(): array
    {
        return $this->findAll(); // Retrieve all cart items
    }

    public function getCartItemById(int $id): ?array
    {
        return $this->find($id); // Retrieve a cart item by ID
    }

    public function insertCartItem(array $data): bool
    {
        return $this->insert($data); // Insert a new cart item
    }

    public function updateCartItemQuantity(int $id, int $quantity): bool
    {
        return $this->update($id, ['quantity' => $quantity]); // Update cart item quantity by ID
    }

    public function deleteCartItem(int $id): bool
    {
        return $this->delete($id); // Delete a cart item by ID
    }
}
