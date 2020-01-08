<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\TestFramework\Utility;

use Magento\Catalog\Api\Data\ProductLinkInterfaceFactory;
use Magento\Catalog\Model\Indexer\Product\Flat\Table\BuilderInterfaceFactory;
use Magento\Catalog\Model\Product\OptionFactory;
use Magento\Framework\UrlFactory;
use Magento\TestFramework\Utility\PartialNamespace\BarFactory as PartialNamespaceBarFactory;
use PHPUnit\Framework\TestCase;

class AutogeneratedClassNotInConstructorFinderTest extends TestCase
{
    /**
     * @param string $fileContent
     * @param string[] $expected
     * @dataProvider getNameWithNamespaceDataProvider
     */
    public function testGetNameWithNamespace($fileContent, $expected)
    {
        require_once __DIR__ . '/Foo.php';

        $classNameExtractor = new ClassNameExtractor();
        $instantiatedByObjectManagerClassExtractor = new AutogeneratedClassNotInConstructorFinder(
            $classNameExtractor
        );
        $this->assertEquals(
            $expected,
            $instantiatedByObjectManagerClassExtractor->find($fileContent)
        );
    }

    /**
     * @return array
     */
    public function getNameWithNamespaceDataProvider()
    {
        return [
            [
                file_get_contents(__DIR__ . '/Foo.php'),
                [
                    BuilderInterfaceFactory::class,
                    BarFactory::class,
                    PartialNamespaceBarFactory::class,
                    UrlFactory::class,
                    OptionFactory::class,
                    ProductLinkInterfaceFactory::class
                ]
            ]
        ];
    }
}
