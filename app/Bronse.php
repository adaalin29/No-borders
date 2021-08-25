<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Bronse extends Model
{
    use Translatable;
    protected $translatable = ['text'];
}
