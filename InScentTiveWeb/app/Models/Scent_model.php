<?php

namespace App\Models;

use CodeIgniter\Model;

class Scent_model extends Model
{
    protected $table = 'scent';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'qty', 'price', 'description']; // Include 'description' field

    public function getScentInfo(): array
    {
        return $this->findAll(); // Retrieve all scent records
    }

    public function getScentById(int $id): ?array
    {
        return $this->find($id); // Retrieve a scent record by ID
    }

    public function insertScentRecord(array $data): bool
    {
        return $this->insert($data); // Insert a new scent record
    }

    public function updateScentRecord(int $id, array $data): bool
    {
        return $this->update($id, $data); // Update a scent record by ID
    }

    public function deleteScentRecord(int $id): bool
    {
        return $this->delete($id); // Delete a scent record by ID
    }

    public function increaseScentQuantity($scentId, $quantity)
    {
        // Retrieve the scent item from the database
        $scentItem = $this->getScentById($scentId);

        if ($scentItem) {
            // Increase the quantity of the scent by the quantity being removed from the cart
            $newQuantity = $scentItem['qty'] + $quantity;

            // Update the scent item with the new quantity
            $data = [
                'qty' => $newQuantity
            ];

            $this->updateScentRecord($scentId, $data);
        }
    }

}
