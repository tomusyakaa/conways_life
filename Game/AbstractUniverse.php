<?php


namespace App;

use App\Model\Grid;

/**
 * Class AbstractUniverse
 * @package App
 */
abstract class AbstractUniverse implements GenerationInterface, ViewableInterface
{

    /**
     * @var int
     */
    protected int $generationCount = 0;

    /**
     * @var Grid
     */
    protected Grid $grid;

    /**
     * AbstractUniverse constructor.
     *
     * @param int $width
     * @param int $height
     * @param array $aliveCells
     */
    public function __construct(int $width, int $height)
    {
        $this->grid = new Grid($width, $height);
    }

    /**
     * @return ViewContext
     */
    public function getViewContext(): ViewContext
    {
        return new ViewContext($this->generationCount, $this->grid->getCells());
    }
}