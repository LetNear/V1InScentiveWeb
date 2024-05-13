<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User_model;


class Login extends Controller
{
    protected $session;

    public function __construct()
    {
        // Load session library
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        // Load view for login page
        return view('login/login');
    }

    public function authenticate()
    {
        // Load the model
        $userModel = new \App\Models\User_model();

        // Get the input values from the form
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        var_dump($password);
        // Get user info by email
        $user = $userModel->getUserInfoByEmail($email);

        if ($user) {
            // Verify the password
            if (password_verify($password, $user->password)) {
                // Authentication successful, set session and redirect to dashboard
                $session = session();
                $session->set('user_id', $user->userID);
                return redirect()->to('/');
            }
        }

        // Authentication failed, redirect back to login page with error message
        return redirect()->to('/login')->with('error', 'Invalid email or password');
    }

    public function logout()
    {
        // Destroy the session and redirect to login page
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
