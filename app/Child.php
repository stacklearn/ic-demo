<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{

    use Uuids;

    protected $guarded = [];
    protected $dates = ['birth_date'];

    public function getFormattedBirthDateAttribute(){
      return $this->birth_date->format('F j, Y');
    }

    public function getAgeAttribute(){
      return Carbon::parse($this->birth_date)->diff(Carbon::now())->format('%y');
    }
}
