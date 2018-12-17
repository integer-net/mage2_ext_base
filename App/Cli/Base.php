<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace Flancer32\Base\App\Cli;


class Base
    extends \Symfony\Component\Console\Command\Command
{
    public function __construct($name, $desc)
    {
        parent::__construct($name);
        $this->setDescription($desc);
    }

    /**
     * Check area code in commands that require code to be set.
     * This method should be used in 'execute()' methods (not in'configure()')
     * to prevent " Area code is already set" error on "setup:upgrade".
     */
    protected function checkAreaCode()
    {
        /**
         * I don't use constructor arguments to get dependencies
         * cause I want to prevent constructor signature spam with extra args in children.
         */
        $manObj = \Magento\Framework\App\ObjectManager::getInstance();
        /** @var \Magento\Framework\App\State $appState */
        $appState = $manObj->get(\Magento\Framework\App\State::class);
        try {
            /* area code should be set only once */
            $appState->getAreaCode();
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            /* exception will be thrown if no area code is set */
            $areaCode = \Magento\Framework\App\Area::AREA_GLOBAL;
            $appState->setAreaCode($areaCode);
            /** @var \Magento\Framework\ObjectManager\ConfigLoaderInterface $configLoader */
            $configLoader = $manObj->get(\Magento\Framework\ObjectManager\ConfigLoaderInterface::class);
            $config = $configLoader->load($areaCode);
            $manObj->configure($config);
        }
    }
}