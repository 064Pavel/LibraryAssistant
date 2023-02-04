<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AppController extends Controller
{
    public function index() : View{
        return view('index');
    }

    public function getUser() : Authenticatable
    {
        return Auth::user();
    }
}
