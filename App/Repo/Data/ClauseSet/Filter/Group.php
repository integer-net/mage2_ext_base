<?php
/**
 * Group of filters.
 *
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace Flancer32\Base\App\Repo\Data\ClauseSet\Filter;


/**
 * Group of filters. Group contains $enries (simple conditions and/or other groups)
 * and operation to unite entries ('OR', 'AND', ...):
 *      WHERE (MAX(amount)>1024) AND (country='ES')
 */
class Group
{
    /**#@+ Operations to apply to group of entries. */
    const OP_AND = 'AND';
    const OP_NOT = 'NOT';
    const OP_OR = 'OR';
    /**#@-  */

    /** @var array filter entries. */
    public $entries;
    /** @var string operation to apply to group of entries (see self::OP_). */
    public $with;
}