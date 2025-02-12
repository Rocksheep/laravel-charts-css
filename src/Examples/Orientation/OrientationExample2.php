<?php

namespace Maartenpaauw\Chartscss\Examples\Orientation;

use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Appearance\ReverseOrientation;
use Maartenpaauw\Chartscss\Chart;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Chartscss\Data\Axes\Axes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Label\Label;
use Maartenpaauw\Chartscss\Types\Bar;
use Maartenpaauw\Chartscss\Types\ChartType;

class OrientationExample2 extends Chart
{
    protected function id(): string
    {
        return 'orientation-example-2';
    }

    protected function heading(): string
    {
        return 'Orientation Example #2';
    }

    protected function type(): ChartType
    {
        return new Bar();
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Year', 'Progress'),
            new Dataset([
                new Entry(new Value(0.2, ''), new Label('2016')),
                new Entry(new Value(0.4, ''), new Label('2017')),
                new Entry(new Value(0.6, ''), new Label('2018')),
                new Entry(new Value(0.8, ''), new Label('2019')),
                new Entry(new Value(1, ''), new Label('2020')),
            ]),
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

    protected function modifications(): Modifications
    {
        return parent::modifications()
            ->add(new ReverseOrientation());
    }
}
