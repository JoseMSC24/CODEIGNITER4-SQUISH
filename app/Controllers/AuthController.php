<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function processRegister()
    {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Simulación de registro exitoso
        return redirect()->to('/login')->with('success', 'Registro exitoso. Por favor, inicia sesión.');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function processLogin()
    {
        $name = $this->request->getPost('name');

        // Simulación de inicio de sesión exitoso
        return redirect()->to('/product')->with('welcome', "Bienvenido, $name");
    }

    public function logout()
    {
        // Simulación de cierre de sesión
        return redirect()->to('/login')->with('info', 'Sesión cerrada.');
    }
}
