<?php

namespace Maartenpaauw\Chart\Tests\Data\Datasets;

use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Tests\TestCase;

class DatasetsTest extends TestCase
{
    private DatasetsContract $datasets;

    protected function setUp(): void
    {
        parent::setUp();

        $this->datasets = new Datasets([
            new Dataset([
                new Entry('100k', 100000),
                new Entry('200k', 200000),
            ], 'Europe'),
            new Dataset([
                new Entry('400k', 400000),
                new Entry('300k', 300000),
            ], 'Asian'),
        ]);
    }

    /** @test */
    public function it_should_calculate_the_size_correctly(): void
    {
        $this->assertEquals(2, $this->datasets->size());
    }

    /** @test */
    public function it_should_calculate_the_max_data_entry_correctly(): void
    {
        $this->assertEquals(400000, $this->datasets->max());
    }

    /** @test */
    public function it_should_return_an_array_correctly(): void
    {
        $this->assertIsArray($this->datasets->toArray());
        $this->assertCount(2, $this->datasets->toArray());
    }
}