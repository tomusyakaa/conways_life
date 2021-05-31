<?php


namespace App;


use App\Model\Cell;
use App\Model\Grid;

/**
 * Class Universe
 * @package App
 */
class Universe extends AbstractUniverse
{

    /**
     * Kill queue of cells.
     *
     * @var array
     */
    private array $toKill = [];

    /**
     * Born queue of cells.
     *
     * @var array
     */
    private array $toBorn = [];

    /**
     * Universe constructor.
     * @param int $width
     * @param int $height
     * @param array $aliveCells
     */
    public function __construct(int $width, int $height, array $aliveCells)
    {
        parent::__construct($width, $height);

        // Fill grid with cells.
        $this->fillGrid($aliveCells);
    }

    /**
     *  Make new generation of cells that depends on rules:
     *
     * 1. Any live cell with fewer than two live neighbors dies as if caused by underpopulation.
     * 2. Any live cell with two or three live neighbors lives on to the next generation.
     * 3. Any live cell with more than three live neighbors dies, as if by overcrowding.
     * 4. Any dead cell with exactly three live neighbors becomes a live cell, as if by reproduction.
     *
     */
    public function generation(): void
    {
        $cells = $this->grid->getCells();
        $this->generationCount++;

        for ($x = 0; $x < $this->grid->getHeight(); $x++) {
            for ($y = 0; $y < $this->grid->getWidth(); $y++) {
                $neighborCount = $this->grid->countAliveNeighbors($x, $y);

                $this->fillKillQueue($cells[$x][$y], $neighborCount);
                $this->fillBornQueue($cells[$x][$y], $neighborCount);
            }
        }

        $this->runQueues();
        $this->toKill = $this->toBorn = [];
    }


    /**
     * Fill kill queue
     *
     * @param Cell $cell
     * @param int $neighborCount
     */
    private function fillKillQueue(Cell $cell, int $neighborCount): void
    {
        if ($cell->isAlive() && ($neighborCount < 2 || $neighborCount > 3)) {
            $this->toKill[] = $cell;
        }
    }

    /**
     * Fill born queue.
     *
     * @param Cell $cell
     * @param int $neighborCount
     */
    private function fillBornQueue(Cell $cell, int $neighborCount): void
    {
        if (!$cell->isAlive() && $neighborCount === 3) {
            $this->toBorn[] = $cell;
        }
    }

    /**
     *  Run toKill and toBorn queues.
     */
    private function runQueues(): void
    {
        /** @var Cell $cell */
        foreach ($this->toBorn as $cell){
            $cell->setLifeStatus(Cell::STATUS_ALIVE);
        }

        foreach ($this->toKill as $cell) {
            $cell->setLifeStatus(Cell::STATUS_DEAD);
        }
    }

    /**
     * @param array $aliveCells
     */
    protected function fillGrid(array $aliveCells)
    {
        // Feel grid with empty cells
        for ($x = 0; $x < $this->grid->getWidth(); $x++) {
            for ($y = 0; $y < $this->grid->getHeight(); $y++) {
                $this->grid->setCell(Cell::getDead(), $x, $y);
            }
        }

        // Feel grid with alive cells
        foreach ($aliveCells as $aliveCell) {
            list($x, $y) = $aliveCell;

            if ($x && $y) {
                $this->grid->getCell($x, $y)->setLifeStatus(Cell::STATUS_ALIVE);
            }
        }
    }
}