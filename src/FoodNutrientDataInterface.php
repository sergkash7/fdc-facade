<?php

declare(strict_types=1);

namespace FdcFacade;

/**
 * Interface FoodNutrientDataInterface
 * @package FdcFacade
 */
interface FoodNutrientDataInterface
{

    /**
     * @return float|null grams
     */
    public function getProtein(): ?float;

    /**
     * @return float|null grams
     */
    public function getFatTotal(): ?float;

    /**
     * @return float|null grams
     */
    public function getCarbohydrates(): ?float;

    /**
     * @return float|null grams
     */
    public function getFatSaturated(): ?float;

    /**
     * @return float|null grams
     */
    public function getFatMonounsaturated(): ?float;

    /**
     * @return float|null grams
     */
    public function getFatPolyunsaturated(): ?float;

    /**
     * @return float|null grams
     */
    public function getFatTrans(): ?float;

    /**
     * @return float|null grams
     */
    public function getSugar(): ?float;

    /**
     * @return float|null grams
     */
    public function getFiber(): ?float;

    /**
     * @return float|null grams
     */
    public function getWater(): ?float;

    /**
     * @return float|null milligrams
     */
    public function getCholesterol(): ?float;

    /**
     * @return float|null milligrams
     */
    public function getCaffeine(): ?float;

    /**
     * @return float|null micrograms
     */
    public function getVitaminA(): ?float;

    /**
     * @return float|null milligrams
     */
    public function getThiamin(): ?float;

    /**
     * @return float|null milligrams
     */
    public function getRiboflavin(): ?float;

    /**
     * @return float|null milligrams
     */
    public function getNiacin(): ?float;

    /**
     * @return float|null milligrams
     */
    public function getPantothenicAcid(): ?float;

    /**
     * @return float|null milligrams
     */
    public function getVitaminB6(): ?float;

    /**
     * @return float|null micrograms
     */
    public function getVitaminB12(): ?float;

    /**
     * @return float|null milligrams
     */
    public function getVitaminC(): ?float;

    /**
     * @return float|null micrograms
     */
    public function getVitaminD(): ?float;

    /**
     * @return float|null milligrams
     */
    public function getVitaminE(): ?float;

    /**
     * @return float|null micrograms
     */
    public function getVitaminK(): ?float;

    /**
     * @return float|null micrograms
     */
    public function getFolate(): ?float;

    /**
     * @return float|null milligrams
     */
    public function getCalcium(): ?float;

    /**
     * @return float|null milligrams
     */
    public function getIron(): ?float;

    /**
     * @return float|null milligrams
     */
    public function getMagnesium(): ?float;

    /**
     * @return float|null milligrams
     */
    public function getPhosphorus(): ?float;

    /**
     * @return float|null milligrams
     */
    public function getPotassium(): ?float;

    /**
     * @return float|null milligrams
     */
    public function getSodium(): ?float;

    /**
     * @return float|null milligrams
     */
    public function getZinc(): ?float;

    /**
     * @return float|null milligrams
     */
    public function getCopper(): ?float;

    /**
     * @return float|null milligrams
     */
    public function getManganese(): ?float;

    /**
     * @return float|null micrograms
     */
    public function getSelenium(): ?float;

}
