<?php


namespace App\View;

use App\ViewContext;

/**
 * Interface ViewInterface
 *
 * @package App\View
 */
interface ViewInterface
{

    /**
     * @param ViewContext $viewContext
     */
    public function draw(ViewContext $viewContext): void;

}