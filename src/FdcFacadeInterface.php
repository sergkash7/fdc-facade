<?php

declare(strict_types=1);

namespace FdcFacade;

/**
 * Interface FdcFacadeInterface
 * @package FdcFacade
 */
interface FdcFacadeInterface
{

    /**
     * @param int $fdcId
     * @return FoodNutrientDataInterface
     */
    public function fetch(int $fdcId): FoodNutrientDataInterface;

}