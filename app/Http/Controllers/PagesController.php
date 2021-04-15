<?php

namespace App\Http\Controllers;

use App\Models\Glossary;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //

    public function glossary()
    {
        //
        $glossaries = Glossary::all();
        return view('glossary.index')->with(compact('glossaries'));
    }

    public function contact()
    {
        //
    
        return view('contact.index');
    }

}
