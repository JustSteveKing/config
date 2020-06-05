<?php

declare(strict_types=1);

namespace JustSteveKing\Tests\Config;

use JustSteveKing\Config\Repository;
use PHPUnit\Framework\TestCase;

class RepositoryTest extends TestCase
{
    protected array $defaultConfig = [
        'version' => 'v1.0.0',
        'app' => [
            'language' => 'php'
        ]
    ];

    public function buildInstance(array $items = []): Repository
    {
        return Repository::build($items);
    }

    public function testInstanceCanBeBuilt()
    {
        $this->assertInstanceOf(
            Repository::class,
            $this->buildInstance()
        );

        $this->assertInstanceOf(
            Repository::class,
            $this->buildInstance(['foo' => 'bar'])
        );
    }

    public function testCheckIfConfigHasItem()
    {
        $config = $this->buildInstance($this->defaultConfig);

        $this->assertTrue(
            $config->has('app.language')
        );

        $this->assertFalse(
            $config->has('app.language.version')
        );
    }

    public function testCheckThatICanGetConfigValues()
    {
        $config = $this->buildInstance($this->defaultConfig);

        $this->assertEquals(
            'v1.0.0',
            $config->get('version')
        );

        $this->assertEquals(
            ['language' => 'php'],
            $config->get('app')
        );

        $this->assertEquals(
            'php',
            $config->get('app.language')
        );
    }

    public function testCheckThatICanGetManyConfigValues()
    {
        $config = $this->buildInstance($this->defaultConfig);

        $this->assertIsArray(
            $config->getMany(['version', 'app.language'])
        );

        $this->assertArrayHasKey(
            'version',
            $config->getMany(['version', 'app.language'])
        );

        $this->assertArrayHasKey(
            'app.language',
            $config->getMany(['version', 'app.language'])
        );
    }

    public function testCheckThatICanSetNewValues()
    {
        $config = $this->buildInstance($this->defaultConfig);

        $this->assertEquals(
            $this->defaultConfig,
            $config->all()
        );

        $config->set('app.framework', 'phpunit');

        $this->assertEquals(
            [
                'version' => 'v1.0.0',
                'app' => [
                    'language' => 'php',
                    'framework' => 'phpunit'
                ]
            ],
            $config->all()
        );
    }
}
