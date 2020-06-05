<?php

declare(strict_types=1);

namespace JustSteveKing\Tests\Config\Support;

use JustSteveKing\Config\Repository;
use JustSteveKing\Config\Support\Dig;
use PHPUnit\Framework\TestCase;

class DigTest extends TestCase
{
    public function testAccessible()
    {
        $string = '';
        $int = 1;
        $array = [];
        $arrayAccess = Repository::build([]);

        $this->assertTrue(
            Dig::accessible($array)
        );

        $this->assertTrue(
            Dig::accessible($arrayAccess)
        );

        $this->assertFalse(
            Dig::accessible($string)
        );

        $this->assertFalse(
            Dig::accessible($int)
        );

    }

    public function testExists()
    {
        $array = [
            'key' => 'value'
        ];

        $this->assertTrue(
            Dig::exists($array, 'key')
        );

        $this->assertTrue(
            Dig::exists(Repository::build($array), 'key')
        );

        $this->assertFalse(
            Dig::exists($array, 'not-exists')
        );

        $this->assertFalse(
            Dig::exists(Repository::build($array), 'not-exists')
        );
    }

    public function testGet()
    {
        $array = [
            'key' => [
                'value' => 'foo'
            ]
        ];

        $this->assertEquals(
            ['value' => 'foo'],
            Dig::get($array, 'key')
        );

        $this->assertEquals(
            ['value' => 'foo'],
            Dig::get(Repository::build($array), 'key')
        );

        $this->assertEquals(
            'foo',
            Dig::get(Repository::build($array), 'key.value')
        );
    }

    public function testSet()
    {
        $array = [
            'test' => []
        ];

        $this->assertEquals(
            ['test' => ['framework' => 'phpunit']],
            Dig::set($array, 'test', ['framework' => 'phpunit'])
        );
    }

    public function testValue()
    {
        $value = 'test';

        $closure = function () {
            return 'test';
        };

        $this->assertEquals(
            'test',
            Dig::value($value)
        );

        $this->assertEquals(
            'test',
            Dig::value($closure)
        );
    }
}
