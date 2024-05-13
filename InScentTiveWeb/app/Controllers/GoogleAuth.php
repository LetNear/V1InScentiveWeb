<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Session\Session; // Assuming you're using CodeIgniter's Session class

use Google\Client;

class GoogleAuth extends Controller {

    protected $session;

    public function __construct() {
        $this->session = \Config\Services::session();
    }

    public function index() {
        // Load Google API client
        $client = new Client();
        $client->setClientId('98060644702-kbd5313bt39ptupbe6ku08rq6dnb399s.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri(base_url('/'));
        $client->addScope('email');
        $client->addScope('profile');

        $authUrl = $client->createAuthUrl();    

        // Redirect to Google authentication page
        return redirect()->to($authUrl);
    }

    public function callback() {
        $client = new Client();
        $client->setClientId('98060644702-kbd5313bt39ptupbe6ku08rq6dnb399s.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri(base_url('googleauth/callback'));
        $client->addScope('email');
        $client->addScope('profile');

        // Exchange authorization code for access token
        $client->authenticate($this->request->getGet('code'));
        $accessToken = $client->getAccessToken();

        // Store access token in session or database
        $this->session->set('access_token', $accessToken);

        // Redirect to dashboard or desired page
        return redirect()->to('dashboard');
    }

    public function logout() {
        // Clear session data
        $this->session->remove('access_token');

        // Redirect to home or login page
        return redirect()->to('login/login');
    }
}
