<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use Laravel\Scout\Searchable;


class Job extends Model
{
    use Searchable;
    use Translatable;
    protected $translatable = ['title','Description'];

    public $asYouType = true;

    public function locatie() {
        return $this->hasOne(Location::class, 'id', 'loc_id');
    }

    public function categorie() {
        return $this->hasOne(Category::class, 'id', 'cat_id');
    }

    public function toSearchableArray() {
        return $this->only(['id', 'title', 'Description']);
    }
}
