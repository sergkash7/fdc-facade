<?php

declare(strict_types=1);

namespace FdcFacade;

/**
 * Class FoodNutrientData
 * @package FdcFacade
 */
class FoodNutrientData implements FoodNutrientDataInterface
{

    public ?float $protein = null;
    public ?float $fatTotal = null;
    public ?float $carbohydrates = null;
    public ?float $fatSaturated = null;
    public ?float $fatMonounsaturated = null;
    public ?float $fatPolyunsaturated = null;
    public ?float $sugar = null;
    public ?float $fiber = null;
    public ?float $water = null;
    public ?float $cholesterol = null;
    public ?float $caffeine = null;
    public ?float $fatTrans = null;
    public ?float $vitaminA = null;
    public ?float $thiamin = null;
    public ?float $riboflavin = null;
    public ?float $niacin = null;
    public ?float $pantothenicAcid = null;
    public ?float $vitaminB6 = null;
    public ?float $vitaminB12 = null;
    public ?float $vitaminC = null;
    public ?float $vitaminD = null;
    public ?float $vitaminE = null;
    public ?float $vitaminK = null;
    public ?float $folate = null;
    public ?float $calcium = null;
    public ?float $iron = null;
    public ?float $magnesium = null;
    public ?float $phosphorus = null;
    public ?float $potassium = null;
    public ?float $sodium = null;
    public ?float $zinc = null;
    public ?float $copper = null;
    public ?float $manganese = null;
    public ?float $selenium = null;

    /**
     * @inheritDoc
     */
    public function getProtein(): ?float
    {
        return $this->protein;
    }

    /**
     * @inheritDoc
     */
    public function getFatTotal(): ?float
    {
        return $this->fatTotal;
    }

    /**
     * @inheritDoc
     */
    public function getCarbohydrates(): ?float
    {
        return $this->carbohydrates;
    }

    /**
     * @inheritDoc
     */
    public function getFatSaturated(): ?float
    {
        return $this->fatSaturated;
    }

    /**
     * @inheritDoc
     */
    public function getFatMonounsaturated(): ?float
    {
        return $this->fatMonounsaturated;
    }

    /**
     * @inheritDoc
     */
    public function getFatPolyunsaturated(): ?float
    {
        return $this->fatPolyunsaturated;
    }

    /**
     * @inheritDoc
     */
    public function getSugar(): ?float
    {
        return $this->sugar;
    }

    /**
     * @inheritDoc
     */
    public function getFiber(): ?float
    {
        return $this->fiber;
    }

    /**
     * @inheritDoc
     */
    public function getWater(): ?float
    {
        return $this->water;
    }

    /**
     * @inheritDoc
     */
    public function getCholesterol(): ?float
    {
        return $this->cholesterol;
    }

    /**
     * @inheritDoc
     */
    public function getCaffeine(): ?float
    {
        return $this->caffeine;
    }

    /**
     * @inheritDoc
     */
    public function getFatTrans(): ?float
    {
        return $this->fatTrans;
    }

    /**
     * @inheritDoc
     */
    public function getVitaminA(): ?float
    {
        return $this->vitaminA;
    }

    /**
     * @inheritDoc
     */
    public function getThiamin(): ?float
    {
        return $this->thiamin;
    }

    /**
     * @inheritDoc
     */
    public function getRiboflavin(): ?float
    {
        return $this->riboflavin;
    }

    /**
     * @inheritDoc
     */
    public function getNiacin(): ?float
    {
        return $this->niacin;
    }

    /**
     * @inheritDoc
     */
    public function getPantothenicAcid(): ?float
    {
        return $this->pantothenicAcid;
    }

    /**
     * @inheritDoc
     */
    public function getVitaminB6(): ?float
    {
        return $this->vitaminB6;
    }

    /**
     * @inheritDoc
     */
    public function getVitaminB12(): ?float
    {
        return $this->vitaminB12;
    }

    /**
     * @inheritDoc
     */
    public function getVitaminC(): ?float
    {
        return $this->vitaminC;
    }

    /**
     * @inheritDoc
     */
    public function getVitaminD(): ?float
    {
        return $this->vitaminD;
    }

    /**
     * @inheritDoc
     */
    public function getVitaminE(): ?float
    {
        return $this->vitaminE;
    }

    /**
     * @inheritDoc
     */
    public function getVitaminK(): ?float
    {
        return $this->vitaminK;
    }

    /**
     * @inheritDoc
     */
    public function getFolate(): ?float
    {
        return $this->folate;
    }

    /**
     * @inheritDoc
     */
    public function getCalcium(): ?float
    {
        return $this->calcium;
    }

    /**
     * @inheritDoc
     */
    public function getIron(): ?float
    {
        return $this->iron;
    }

    /**
     * @inheritDoc
     */
    public function getMagnesium(): ?float
    {
        return $this->magnesium;
    }

    /**
     * @inheritDoc
     */
    public function getPhosphorus(): ?float
    {
        return $this->phosphorus;
    }

    /**
     * @inheritDoc
     */
    public function getPotassium(): ?float
    {
        return $this->potassium;
    }

    /**
     * @inheritDoc
     */
    public function getSodium(): ?float
    {
        return $this->sodium;
    }

    /**
     * @inheritDoc
     */
    public function getZinc(): ?float
    {
        return $this->zinc;
    }

    /**
     * @inheritDoc
     */
    public function getCopper(): ?float
    {
        return $this->copper;
    }

    /**
     * @inheritDoc
     */
    public function getManganese(): ?float
    {
        return $this->manganese;
    }

    /**
     * @inheritDoc
     */
    public function getSelenium(): ?float
    {
        return $this->selenium;
    }

}