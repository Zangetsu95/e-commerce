<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function French()
    {
        //pour éviter tout conflit, on va dire a la session
        //d'oublier la session qu'on a crée
        session()->get('language');
        session()->forget('language');
        //Crée une session avec le language french
        Session::put('language','french');
        //retour sur la même page
        return redirect()->back();
    }

    public function English()
    {
        //pour éviter tout conflit, on va dire a la session
        //d'oublier la session qu'on a crée
        session()->get('language');
        session()->forget('language');
        //Crée une session avec le language french
        Session::put('language','english');
        //retour sur la même page
        return redirect()->back();
    }

}
