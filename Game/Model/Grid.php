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
     */
    public function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
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
     * @param Cell $cell
     * @param int $x
     * @param int $y
     */
    public function setCell(Cell $cell, int $x, int $y): void
    {
        $this->cells[$x][$y] = $cell;
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
     * Count live cells around cell with position x,y.
     *
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