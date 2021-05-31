<?php

namespace App;

/**
 * Interface ViewableInterface
 *
 * @package App
 */
interface ViewableInterface
{

    /**
     * @return ViewContext
     */
    public function getViewContext(): ViewContext;

}