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
     * Cell constructor.
     *
     * @param bool $lifeStatus
     */
    private function __construct(bool $lifeStatus)
    {
        $this->lifeStatus = $lifeStatus;
    }

    /**
     * Return new dead cell.
     *
     * @return Cell
     */
    public static function getDead(): Cell
    {
        return new self(self::STATUS_DEAD);
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