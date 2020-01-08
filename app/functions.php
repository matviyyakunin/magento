<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

use Magento\Framework\Phrase;

/**
 * Create value-object \Magento\Framework\Phrase
 * @deprecated The global function __() is now loaded via Magento Framework, the below require is only
 *             for backwards compatibility reasons and this file will be removed in a future version
 * @see        Magento\Framework\Phrase\__.php
 * @SuppressWarnings(PHPMD.ShortMethodName)
 * @return Phrase
 */
if (!function_exists('__')) {
    function __()
    {
        $argc = func_get_args();

        $text = array_shift($argc);
        if (!empty($argc) && is_array($argc[0])) {
            $argc = $argc[0];
        }

        return new Phrase($text, $argc);
    }
}
