<?php
/**
 * Set of clauses to restrict data set by filter and/or size, to group and to order data.
 *
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace Flancer32\Base\App\Repo\Data;

/**
 * Set of clauses to restrict data set by filter and/or size, to group and to order data.
 */
class ClauseSet
{
    /** @var \Flancer32\Base\App\Repo\Data\ClauseSet\Filter */
    public $filter;
    /** @var \Flancer32\Base\App\Repo\Data\ClauseSet\Order */
    public $order;
    /** @var \Flancer32\Base\App\Repo\Data\ClauseSet\Pagination */
    public $pagination;
}