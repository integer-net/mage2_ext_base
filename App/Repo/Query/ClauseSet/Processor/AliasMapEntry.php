<?php
/**
 * Data object to map data source aliases to table & expressions/column pairs.
 *
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace Flancer32\Base\App\Repo\Query\ClauseSet\Processor;


/**
 * Data object to map data source aliases to table & expressions/column pairs.
 */
class AliasMapEntry
{
    public $alias;
    public $expression;
    public $table;
}