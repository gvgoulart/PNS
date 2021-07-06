<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class DashboardController extends Controller
{
    public function index() {

        if(Auth::user()->hasRole('user')) {
            return view('userdash');
        }
        elseif(Auth::user()->hasRole('admin')) {
            return view('admindash');
        }
    }

    public function notificacoes() {
        return view('notificacoes');
    }

    public function envnotificacoes() {
        return view('envnotificacoes');
    }

    public function registrar() {
        return view('registrar');
    }
}


