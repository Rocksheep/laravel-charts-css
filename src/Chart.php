<?php

namespace Maartenpaauw\Chart;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chart\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\Specifications\HasColorscheme;
use Maartenpaauw\Chart\Configuration\Specifications\HasHeading;
use Maartenpaauw\Chart\Configuration\Specifications\HasLabels;
use Maartenpaauw\Chart\Data\DatasetsContract;
use Maartenpaauw\Chart\Identity\Identity;
use Maartenpaauw\Chart\Legend\Legend;

abstract class Chart extends Component
{
    abstract protected function id(): string;

    abstract protected function heading(): string;

    abstract protected function datasets(): DatasetsContract;

    protected function legend(): Legend
    {
        return new Legend();
    }

    protected function modifications(): ModificationsBag
    {
        return new ModificationsBag();
    }

    protected function colorscheme(): ColorschemeContract
    {
        return new Colorscheme();
    }

    private function configuration(): Configuration
    {
        return new Configuration(
            $this->identity(),
            $this->legend(),
            $this->modifications(),
            $this->colorscheme(),
        );
    }

    private function identity(): Identity
    {
        return new Identity($this->heading(), $this->id());
    }

    public function render(): View
    {
        return view('charts-css::components.chart', [
            'configuration' => $this->configuration(),
            'datasets' => $this->datasets(),
            'hasColorscheme' => (new HasColorscheme())->isSatisfiedBy($this->configuration()),
            'hasHeading' => (new HasHeading())->isSatisfiedBy($this->configuration()),
            'hasLabels' => (new HasLabels())->isSatisfiedBy($this->configuration()),
        ]);
    }
}