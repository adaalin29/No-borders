<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Gold extends Model
{
    use Translatable;
    protected $translatable = ['text'];
}
