<?php
/**
 * Base class to create query builders.
 *
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace Flancer32\Base\App\Repo\Query;

/**
 * Base for query builders.
 */
abstract class Builder
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
     * Build query that is optionally based on other query. Builder modifies $source query.
     *
     * @param \Magento\Framework\DB\Select $source
     * @return \Magento\Framework\DB\Select
     */
    public abstract function build($source = null);
}