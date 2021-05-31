<?php


namespace App\View;


use App\Model\Grid;
use App\ViewContext;

/**
 * Class Console
 * @package App\View
 */
class Console implements ViewInterface
{

    /**
     * Draw matrix of cells in console.
     *
     * @param ViewContext $context
     */
    public function draw(ViewContext $context): void
    {
        echo "____________________________________________________________________________\n";

        $cells = $context->getCells();
        for ($x = 0; $x < count($cells); $x++) {
            for ($y = 0; $y < count($cells[$x]); $y++) {
                $cell = $cells[$x][$y];

                if (!$cell->isAlive()) {
                    echo "\033[31m{$cell} \033[0m";
                } else {
                    echo "\033[32m{$cell} \033[0m";
                }
            }

            echo PHP_EOL;
        }

        echo PHP_EOL;
    }

}