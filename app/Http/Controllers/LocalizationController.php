<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Http\RedirectResponse;

class LocalizationController extends Controller
{
    /**
     * @params locale
     * @return RedirectResponse
     */

     public function index($locale) {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
     }
}
