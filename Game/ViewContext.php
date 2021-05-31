<?php


namespace App;


class ViewContext
{

    /**
     * @var int
     */
    private int $generationNumber;

    /**
     * @var array
     */
    private array $cells;

    /**
     * ViewContext constructor.
     * @param int $generationNumber
     * @param array $cells
     */
    public function __construct(int $generationNumber, array $cells)
    {
        $this->cells            = $cells;
        $this->generationNumber = $generationNumber;
    }

    /**
     * @return int
     */
    public function getGenerationNumber(): int
    {
        return $this->generationNumber;
    }

    /**
     * @param int $generationNumber
     */
    public function setGenerationNumber(int $generationNumber): void
    {
        $this->generationNumber = $generationNumber;
    }

    /**
     * @return array
     */
    public function getCells(): array
    {
        return $this->cells;
    }

    /**
     * @param array $cells
     */
    public function setCells(array $cells): void
    {
        $this->cells = $cells;
    }

}