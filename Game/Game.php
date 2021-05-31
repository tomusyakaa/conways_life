<?php


namespace App;


use App\View\ViewInterface;

/**
 * Class Game
 *
 * @package App
 */
class Game
{

    /**
     * @var ViewInterface
     */
    protected ViewInterface $view;

    /**
     * @var AbstractUniverse
     */
    protected AbstractUniverse $universe;

    /**
     * @param ViewInterface $view
     *
     * @return $this
     */
    public function setView(ViewInterface $view): self
    {
        $this->view = $view;

        return $this;
    }

    /**
     * @param AbstractUniverse $abstractUniverse
     *
     * @return $this
     */
    public function setUniverse(AbstractUniverse $abstractUniverse): self
    {
        $this->universe = $abstractUniverse;

        return $this;
    }

    /**
     * Run game till $iterations done.
     *
     * @param int $iterations
     */
    public function run(int $iterations): void
    {
        for ($i = 0; $i < $iterations; $i++) {
            $this->view->draw($this->universe->getViewContext());
            $this->universe->generation();
        }
    }

}