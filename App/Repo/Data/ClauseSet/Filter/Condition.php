<?php
/**
 * Standalone condition for filtering set.
 *
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace Flancer32\Base\App\Repo\Data\ClauseSet\Filter;

/**
 * Standalone condition for filtering set:
 *      WHERE (MAX(amount)>1024) AND ...
 */
class Condition
{
    /** @var string alias for table's column or expression. */
    public $alias;
    /** @var string equation or function. */
    public $func;
    /** @var string|string[] function's arguments ("WHERE amount>0 OR id IN (1, 20, 300)"). */
    public $value;
}