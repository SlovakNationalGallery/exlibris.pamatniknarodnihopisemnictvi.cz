<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Item extends Model
{
    use HasFactory;
    use Searchable;

    public $incrementing = false;

    protected $connection = 'webumenia';

    public function searchableAs()
    {
        return 'webumenia_items_cs';
    }

    public function getScoutKey()
    {
        return $this->attributes['id'];
    }
}
