<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;

class Item extends Model
{
    use HasFactory;
    use Searchable;

    protected $connection = 'webumenia';
    protected $indexConfigurator = \App\Elasticsearch\ItemsIndexConfigurator::class;
}
