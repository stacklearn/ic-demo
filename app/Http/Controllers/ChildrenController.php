<?php

namespace App\Http\Controllers;

use App\Child;
use App\Http\Controllers\Controller;

class ChildrenController extends Controller
{
    public function show($id){
      $child = Child::find($id);
      return view('children.show',['child' => Child::findOrFail($id)]);
    }
}
