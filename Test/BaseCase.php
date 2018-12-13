<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace Flancer32\Base\Test;

/**
 * Base test case unit with Object Manager and Resource/Connection.
 */
class BaseCase
    extends \PHPUnit\Framework\TestCase
{
    /** @var \Magento\Framework\DB\Adapter\AdapterInterface */
    protected static $conn;
    /** @var \Magento\Framework\App\ObjectManager */
    protected static $manObj;
    /** @var \Magento\Framework\App\ResourceConnection */
    protected static $resource;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::$manObj = \Magento\Framework\App\ObjectManager::getInstance();
        self::$resource = self::$manObj->get(\Magento\Framework\App\ResourceConnection::class);
        self::$conn = self::$resource->getConnection();
    }
}