<?php

namespace App\Http\Controllers;

use App\Child;
use App\Http\Controllers\Controller;

class ChildrenController extends Controller
{
    public function show($id){
      return view('children.show',['child' => Child::findOrFail($id)]);
    }
}
