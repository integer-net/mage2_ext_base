<?php
/**
 * Filter is $condition or $group of conditions (not both).
 *
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace Flancer32\Base\App\Repo\Data\ClauseSet;

/**
 * Filter is $condition or $group of conditions (not both).
 */
class Filter
{
    /** @var \Flancer32\Base\App\Repo\Data\ClauseSet\Filter\Condition */
    public $condition;
    /** @var \Flancer32\Base\App\Repo\Data\ClauseSet\Filter\Group */
    public $group;
}