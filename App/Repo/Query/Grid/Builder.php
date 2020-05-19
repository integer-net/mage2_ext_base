<?php
/**
 * Base class to create query builders for grids data providers.
 *
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace Flancer32\Base\App\Repo\Query\Grid;

/**
 * Base class to create query builders for grids data providers.
 */
abstract class Builder
    implements \Flancer32\Base\App\Repo\Query\Grid
{
    /** @var  \Magento\Framework\DB\Adapter\AdapterInterface */
    protected $conn; // default connection

    /** @var \Magento\Framework\App\ResourceConnection */
    protected $resource;

    public function __construct(
        \Magento\Framework\App\ResourceConnection $resource
    ) {
        $this->resource = $resource;
        $this->conn = $resource->getConnection();
    }

    /**
     * Use in children to create mapping for aliases to table.column or expression.
     *
     * @param $alias
     * @param $table
     * @param $expression
     * @return \Flancer32\Base\App\Repo\Query\ClauseSet\Processor\AliasMapEntry
     */
    protected function createAliasMapEntry($alias, $table, $expression)
    {
        $result = new \Flancer32\Base\App\Repo\Query\ClauseSet\Processor\AliasMapEntry();
        $result->alias = $alias;
        $result->table = $table;
        $result->expression = $expression;
        return $result;
    }
}
