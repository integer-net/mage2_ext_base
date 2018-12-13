<?php
/**
 * Structure to restrict data set by size.
 *
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace Flancer32\Base\App\Repo\Data\ClauseSet;

/**
 * Structure to restrict data set by size:
 *  SQL: "LIMIT $limit OFFSET $offset"
 */
class Pagination
{
    /** @var int */
    public $limit;
    /** @var int */
    public $offset;
}