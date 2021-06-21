<?php

namespace Maartenpaauw\Chart\Examples\Data;

use Maartenpaauw\Chart\Chart;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\ConfigurationContract;
use Maartenpaauw\Chart\Data\Axes\NullAxes;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\Value\Value;

class DataExample2 extends Chart
{
    protected function id(): string
    {
        return 'data-example-2';
    }

    protected function heading(): string
    {
        return 'Data Example #2 - Front End Developer Salary';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new NullAxes(),
            [
                new Dataset([
                    new Entry(new Value(40, '$40k')),
                    new Entry(new Value(60, '$60k')),
                    new Entry(new Value(75, '$75k')),
                    new Entry(new Value(90, '$90k')),
                    new Entry(new Value(100, '$100k')),
                ]),
            ],
        );
    }

    protected function configuration(): ConfigurationContract
    {
        return new Configuration(
            $this->identity(),
            $this->legend(),
            $this->modifications(),
            $this->colorscheme(),
        );
    }
}