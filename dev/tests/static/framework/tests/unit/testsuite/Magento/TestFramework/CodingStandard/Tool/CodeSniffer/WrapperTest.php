<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\TestFramework\CodingStandard\Tool\CodeSniffer;

use PHPUnit\Framework\TestCase;

class WrapperTest extends TestCase
{
    public function testSetValues()
    {
        if (!class_exists('\PHP_CodeSniffer\Runner')) {
            $this->markTestSkipped('Code Sniffer is not installed');
        }
        $wrapper = new Wrapper();
        $expected = ['some_key' => 'some_value'];
        $wrapper->setSettings($expected);
    }
}
