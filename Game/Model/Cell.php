<?php


namespace App\Model;


/**
 * Class Cell
 *
 * @package App\Model
 */
class Cell
{

    const STATUS_ALIVE = true;

    const STATUS_DEAD = false;

    /**
     * @var bool
     */
    private bool $lifeStatus;

    /**
     * @var int
     */
    private int $x;

    /**
     * @var int
     */
    private int $y;

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * Cell constructor.
     *
     * @param bool $lifeStatus
     */
    private function __construct(bool $lifeStatus, $x, $y)
    {
        $this->lifeStatus = $lifeStatus;

        $this->x = $x;
        $this->y = $y;
    }

    /**
     * Return new dead cell.
     *
     * @param int $x
     * @param int $y
     *
     * @return Cell
     */
    public static function getDead(int $x, int $y): Cell
    {
        return new self(self::STATUS_DEAD, $x, $y);
    }

    /**
     * @param bool $lifeStatus
     */
    public function setLifeStatus(bool $lifeStatus): void
    {
        $this->lifeStatus = $lifeStatus;
    }


    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->lifeStatus ? '1' : '0';
    }

    /**
     * @return bool
     */
    public function isAlive(): bool
    {
        return $this->lifeStatus;
    }

}