<?php

namespace Maartenpaauw\Chartscss\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;

class Table extends Component
{
    public DatasetsContract $datasets;

    public ConfigurationContract $configuration;

    public function __construct(DatasetsContract $datasets, ConfigurationContract $configuration)
    {
        $this->datasets = $datasets;
        $this->configuration = $configuration;
    }

    public function render(): View
    {
        return view('charts-css::components.table');
    }
}
