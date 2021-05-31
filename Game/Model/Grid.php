<?php


namespace App\Model;


/**
 * Class Grid
 * @package App\Model
 */
class Grid
{

    /**
     * @var int
     */
    private int $width = 25;

    /**
     * @var int
     */
    private int $height = 25;

    /**
     * @var array
     */
    private array $cells;

    /**
     * Grid constructor.
     * @param int $width
     * @param int $height
     * @param array $aliveCells
     */
    public function __construct(int $width, int $height, array $aliveCells)
    {
        $this->width = $width;
        $this->height = $height;

        // Feel grid with empty cells
        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                $alive = false;

                if (!$alive) {
                    $this->cells[$x][$y] = Cell::getDead($x, $y);
                }
            }
        }

        // Feel grid with alive cells
        foreach ($aliveCells as $aliveCell) {
            list($x, $y) = $aliveCell;

            if (isset($this->cells[$x][$y])) {
                $this->cells[$x][$y]->setLifeStatus(Cell::STATUS_ALIVE);
            }
        }
    }


    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getCells()
    {
        return $this->cells;
    }

    /**
     * @param mixed $cells
     */
    public function setCells($cells): void
    {
        $this->cells = $cells;
    }

    /**
     * @param int $x
     * @param int $y
     * @return Cell
     */
    public function getCell(int $x, int $y): Cell
    {
        return $this->getCells()[$x][$y];
    }

    /**
     * @param int $x
     * @param int $y
     * @return array
     */
    public function getCellsAround(int $x, int $y): array
    {
        $cells = [];

        for ($i = $x - 1; $i < $x + 2; $i++) {
            for ($j = $y - 1; $j < $y + 2; $j++) {
                if ($x === $i && $j === $y) {
                    continue;
                }

                if (isset($this->cells[$i][$j])) {
                    $cells[] = $this->cells[$i][$j];
                }
            }
        }

        return $cells;
    }

    /**
     * @param int $x
     * @param int $y
     * @return int
     */
    public function countAliveNeighbors(int $x, int $y): int
    {
        $cells = $this->getCellsAround($x, $y);

        $count = 0;
        /** @var Cell $cell */
        foreach ($cells as $cell) {
            $count += (int)$cell->isAlive();
        }

        return $count;
    }
}