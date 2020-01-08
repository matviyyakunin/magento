<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Test\Integrity\Library;

use Magento\Core\Model\Object;
use Magento\TestFramework\Integrity\Library\Injectable;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject;
use ReflectionException;
use Zend\Code\Reflection\ClassReflection;
use Zend\Code\Reflection\FileReflection;
use Zend\Code\Reflection\MethodReflection;
use Zend\Code\Reflection\ParameterReflection;

/**
 */
class InjectableTest extends TestCase
{
    /**
     * @var Injectable
     */
    protected $injectable;

    /**
     * @var FileReflection
     */
    protected $fileReflection;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    protected $parameterReflection;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    protected $declaredClass;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        $this->injectable = new Injectable();
        $this->fileReflection = $this->getMockBuilder(
            FileReflection::class
        )->disableOriginalConstructor()->getMock();

        $classReflection = $this->getMockBuilder(
            ClassReflection::class
        )->disableOriginalConstructor()->getMock();

        $methodReflection = $this->getMockBuilder(
            MethodReflection::class
        )->disableOriginalConstructor()->getMock();

        $this->parameterReflection = $this->getMockBuilder(
            ParameterReflection::class
        )->disableOriginalConstructor()->getMock();

        $this->declaredClass = $this->getMockBuilder(
            ClassReflection::class
        )->disableOriginalConstructor()->getMock();

        $methodReflection->expects(
            $this->once()
        )->method(
            'getDeclaringClass'
        )->will(
            $this->returnValue($this->declaredClass)
        );

        $methodReflection->expects(
            $this->any()
        )->method(
            'getParameters'
        )->will(
            $this->returnValue([$this->parameterReflection])
        );

        $classReflection->expects(
            $this->once()
        )->method(
            'getMethods'
        )->will(
            $this->returnValue([$methodReflection])
        );

        $this->fileReflection->expects(
            $this->once()
        )->method(
            'getClasses'
        )->will(
            $this->returnValue([$classReflection])
        );
    }

    /**
     * Covered getDependencies
     *
     * @test
     */
    public function testGetDependencies()
    {
        $classReflection = $this->getMockBuilder(
            ClassReflection::class
        )->disableOriginalConstructor()->getMock();

        $classReflection->expects(
            $this->once()
        )->method(
            'getName'
        )->will(
            $this->returnValue(Object::class)
        );

        $this->parameterReflection->expects(
            $this->once()
        )->method(
            'getClass'
        )->will(
            $this->returnValue($classReflection)
        );

        $this->assertEquals(
            [Object::class],
            $this->injectable->getDependencies($this->fileReflection)
        );
    }

    /**
     * Covered getDependencies
     *
     * @test
     */
    public function testGetDependenciesWithException()
    {
        $this->parameterReflection->expects($this->once())->method('getClass')->will(
            $this->returnCallback(
                function () {
                    throw new ReflectionException('Class Magento\Core\Model\Object does not exist');
                }
            )
        );

        $this->assertEquals(
            [Object::class],
            $this->injectable->getDependencies($this->fileReflection)
        );
    }

    /**
     * Covered with some different exception method
     *
     * @test
     * @expectedException ReflectionException
     */
    public function testGetDependenciesWithOtherException()
    {
        $this->parameterReflection->expects($this->once())->method('getClass')->will(
            $this->returnCallback(
                function () {
                    throw new ReflectionException('Some message');
                }
            )
        );

        $this->injectable->getDependencies($this->fileReflection);
    }

    /**
     * Covered when method declared in parent class
     *
     * @test
     */
    public function testGetDependenciesWhenMethodDeclaredInParentClass()
    {
        $this->declaredClass->expects($this->once())->method('getName')->will($this->returnValue('ParentClass'));

        $this->injectable->getDependencies($this->fileReflection);
    }
}
