<?php


namespace App\View;

use App\ViewContext;

interface ViewInterface
{

    public function draw(ViewContext $viewContext): void;

}