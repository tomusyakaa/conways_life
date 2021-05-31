<?php


namespace App;

use App\Model\Grid;

abstract class AbstractUniverse implements GenerationInterface, ViewableInterface
{

    protected int $generationCount = 0;

    protected Grid $grid;

    public function __construct(int $width, int $height, array $aliveCells)
    {
        $this->grid = new Grid($width, $height, $aliveCells);
    }

    public function getViewContext(): ViewContext
    {
        return new ViewContext($this->generationCount, $this->grid->getCells());
    }
}