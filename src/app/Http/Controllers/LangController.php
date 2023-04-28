<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LangController extends Controller
{
    public function setLanguage($language){        
        if(array_key_exists($language, config('languages'))){            
           session()->put('applocale', $language);        
        }        
        return back();     
     }
}
