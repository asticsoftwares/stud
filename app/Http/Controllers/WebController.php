<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ValidationController;

class WebController extends Controller
{
    public function index() {
        $ValidationController = new ValidationController;

        if($ValidationController->isUserLoggedIn() == 1) {
            return redirect()->to('/dashboard')->send();
        } else {
            return view('web.index');
        }
    }

    public function register() {
        $ValidationController = new ValidationController;

        if($ValidationController->isUserLoggedIn() == 1) {
            return redirect()->to('/home')->send();
        } else {
            return view('web.authentication.register');
        }
    }

    public function login() {
        $ValidationController = new ValidationController;

        if($ValidationController->isUserLoggedIn() == 1) {
            return redirect()->to('/home')->send();
        } else {
            return view('web.authentication.login');
        }
    }

    public function dashboard() {
        $ValidationController = new ValidationController;

        if($ValidationController->isUserLoggedIn() == 0) {
            return redirect()->to('/login')->send();
        } else {
            return view('web.dashboard');
        }
    }

    public function logout() {
        setcookie('_BRICKSESSION', '', time() - 1, "/");
        return redirect()->to('/')->send();
    }
}
