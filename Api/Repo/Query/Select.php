<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2020
 */

namespace Flancer32\Base\Api\Repo\Query;


interface Select
{
    /**
     * Build SELECT query that is optionally based on other SELECT query (this builder modifies $source query).
     *
     * @param \Magento\Framework\DB\Select $source
     * @return \Magento\Framework\DB\Select
     */
    public function build($source = null);
}
