<?php

namespace App\Controllers;
use App\Models\Scent_model;
use App\Models\User_model;

class Home extends BaseController
{

    public function __construct()
    {
        $this->scentModel = new Scent_model();
        $this->UserModel = new User_model();

        
    }
   public function index(): string
    {
        $scentModel = new Scent_model();
        $userModel = new User_model();

        // Get all scent records
        $data['products'] = $scentModel->getScentInfo();

        // Get the first user's ID from the user records
        $userRecords = $userModel->getUserInfo();
        $data['user_id'] = !empty($userRecords) ? $userRecords[0]['userID'] : null;

        return view('home/home', $data);
    }
    
    
}
