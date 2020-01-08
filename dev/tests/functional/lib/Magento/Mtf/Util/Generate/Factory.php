<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Mtf\Util\Generate;

use Magento\Mtf\Util\Generate\Factory\Block;
use Magento\Mtf\Util\Generate\Factory\Fixture;
use Magento\Mtf\Util\Generate\Factory\Handler;
use Magento\Mtf\Util\Generate\Factory\Page;
use Magento\Mtf\Util\Generate\Factory\Repository;

/**
 * Factory classes generator.
 *
 * @deprecated
 */
class Factory extends AbstractGenerate
{
    /**
     * Generate Handlers.
     *
     * @return bool
     */
    public function launch()
    {
        $this->objectManager->create(Block::class)->launch();
        $this->objectManager->create(Fixture::class)->launch();
        $this->objectManager->create(Handler::class)->launch();
        $this->objectManager->create(Page::class)->launch();
        $this->objectManager->create(Repository::class)->launch();

        return true;
    }

    /**
     * Generate single class.
     *
     * @param string $className
     * @return bool
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function generate($className)
    {
        return false;
    }
}
