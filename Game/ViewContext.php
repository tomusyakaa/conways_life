<?php


namespace App;


class ViewContext
{

    private int $generationNumber;

    private array $cells;

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