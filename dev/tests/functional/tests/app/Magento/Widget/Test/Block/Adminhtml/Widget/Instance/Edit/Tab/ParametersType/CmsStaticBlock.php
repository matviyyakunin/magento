<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Widget\Test\Block\Adminhtml\Widget\Instance\Edit\Tab\ParametersType;

use Magento\Widget\Test\Block\Adminhtml\Widget\Instance\Edit\Tab\ParametersType\CmsStaticBlock\Grid;

/**
 * Filling Widget Options that have cms static block type.
 */
class CmsStaticBlock extends ParametersForm
{
    /**
     * Cms Page Link grid block.
     *
     * @var string
     */
    protected $gridBlock = './ancestor::body//*[contains(@id, "responseCntoptions_fieldset")]';

    /**
     * Path to grid.
     *
     * @var string
     */
    // @codingStandardsIgnoreStart
    protected $pathToGrid = Grid::class;
    // @codingStandardsIgnoreEnd
}
