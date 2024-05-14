<?php

namespace App\Controllers;

use App\Models\Scent_model;

class Scent extends BaseController
{
    protected $scentModel;

    public function __construct()
    {
        $this->scentModel = new Scent_model();
    }

    public function index()
    {
        $data['scent_info'] = $this->scentModel->getScentInfo();
        $data['Header'] = 'This is the new Header';
        echo view('template/header', $data);
        echo view('scent/index', $data);
        echo view('template/footer');
    }

    public function createScent()
    {
        $data['Title'] = "Add Scent Record";
    
        if ($this->request->getMethod() == "POST") {
            $validation = \Config\Services::validation();
    
            $rules = [
                "Name" => [
                    "label" => "Scent Name",
                    "rules" => "required|min_length[3]|max_length[100]"
                ],
                "Quantity" => [
                    "label" => "Scent Quantity",
                    "rules" => "required|numeric"
                ],
                "Price" => [
                    "label" => "Scent Price",
                    "rules" => "required|numeric"
                ],
                "Description" => [
                    "label" => "Scent Description",
                    "rules" => "required"
                ]
            ];
    
            if ($this->validate($rules)) {
                $postdata = [
                    "name" => $this->request->getVar("Name"),
                    "qty" => $this->request->getVar("Quantity"),
                    "price" => $this->request->getVar("Price"),
                    "description" => $this->request->getVar("Description")
                ];
                $result = $this->scentModel->insertScentRecord($postdata);
                if ($result == 1) {
                    return redirect()->to('/scent/index');
                }
            } else {
                $data["validation"] = $validation->getErrors();
            }
        }
    
        $data['Title'] = 'ITEC 222 Title';
        $data['Header'] = 'This is the new Header';
        echo view('template/header');
        echo view('scent/addScent', $data);
        echo view('template/footer');
    }
    
    public function editScent($id)
    {
        $data['Title'] = "Edit Scent Record";
    
        $data['scent_info'] = $this->scentModel->getScentById($id);
    
        if ($this->request->getMethod() == "POST") {
    
            $validation = \Config\Services::validation();
    
            $rules = [
                "Name" => [
                    "label" => "Scent Name",
                    "rules" => "required|min_length[3]|max_length[100]"
                ],
                "Quantity" => [
                    "label" => "Scent Quantity",
                    "rules" => "required|numeric"
                ],
                "Price" => [
                    "label" => "Scent Price",
                    "rules" => "required|numeric"
                ],
                "Description" => [
                    "label" => "Scent Description",
                    "rules" => "required"
                ]
            ];
    
            if ($this->validate($rules)) {
                $postdata = [
                    "name" => $this->request->getVar("Name"),
                    "qty" => $this->request->getVar("Quantity"),
                    "price" => $this->request->getVar("Price"),
                    "description" => $this->request->getVar("Description")
                ];
                $result = $this->scentModel->updateScentRecord($id, $postdata);
    
                if ($result == 1) {
                    return redirect()->to('/scent/index');
                }
            } else {
                $data["validation"] = $validation->getErrors();
            }
        }
    
        $data['Title'] = 'ITEC 222 Title';
        $data['Header'] = 'This is the new Header';
        echo view('template/header');
        echo view('scent/editScent', $data);
        echo view('template/footer');
    }
    

    public function deleteScent($id)
    {
        $result = $this->scentModel->deleteScentRecord($id);

        if ($result == 1) {
            return redirect()->to('/scent/index');
        }
    }
}
