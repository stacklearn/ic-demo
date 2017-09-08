<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $guarded = [];
    protected $dates = ['birth_date'];

    public function getFormattedBirthDateAttribute(){
      return $this->birth_date->format('F j, Y');
    }
}
