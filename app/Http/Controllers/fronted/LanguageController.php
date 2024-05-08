<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function languageBangla()
    {
        Session::get('lang');
        session()->forget('lang');
        session()->put('lang', 'bangla');
        return back();
    }

    public function languageEnglish()
    {
        Session::get('lang');
        session()->forget('lang');
        session()->put('lang', 'english');
        return back();
    }
}
