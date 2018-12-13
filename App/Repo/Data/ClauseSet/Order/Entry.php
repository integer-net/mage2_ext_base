<?php
/**
 * SQL clause for ordering.
 *
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace Flancer32\Base\App\Repo\Data\ClauseSet\Order;

/**
 * SQL clause for ordering:
 *  "ORDER BY $alias"
 *  "ORDER BY $alias DESC"
 */
class Entry
{
    /** @var string alias for column or expression. */
    public $alias;
    /** @var bool 'true' to set ordering direction to DESCENDING. */
    public $desc;
}