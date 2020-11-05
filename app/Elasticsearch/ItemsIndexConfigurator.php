<?php

namespace App\Elasticsearch;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class ItemsIndexConfigurator extends IndexConfigurator
{
    use Migratable;
    protected $name = 'items_cs';

    /**
     * @var array
     */
    protected $settings = [
        //
    ];
}
