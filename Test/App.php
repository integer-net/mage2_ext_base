<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace Flancer32\Base\Test;

/**
 * Test application to be used in test bootstrap scripts.
 */
class App
    implements \Magento\Framework\AppInterface
{
    /** @var \Magento\Framework\App\Console\Response */
    private $response;
    /** @var \Magento\Store\Model\StoreManagerInterface */
    private $storeManager;

    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Console\Response $response
    ) {
        $this->storeManager = $storeManager;
        $this->response = $response;
    }

    /**
     * Ability to handle exceptions that may have occurred during bootstrap and launch
     *
     * Return values:
     * - true: exception has been handled, no additional action is needed
     * - false: exception has not been handled - pass the control to Bootstrap
     *
     * @param \Magento\Framework\App\Bootstrap $bootstrap
     * @param \Exception $exception
     *
     * @return bool
     */
    public function catchException(
        \Magento\Framework\App\Bootstrap $bootstrap,
        \Exception $exception
    ) {
        return false;
    }

    /**
     * Launch application. Prevent application termination on sent response, initialize DB connection.
     *
     * @return \Magento\Framework\App\ResponseInterface
     */
    public function launch()
    {
        $this->response->terminateOnSend(false);
        $this->storeManager->getStores(false, true);
        return $this->response;
    }
}