<?php

declare(strict_types=1);

namespace FdcFacade;

use LogicException;
use UnexpectedValueException;

/**
 * Class FdcFacade
 * @package FdcFacade
 */
class FdcFacade implements FdcFacadeInterface
{

    private const API_URL_PATTERN = 'https://api.nal.usda.gov/fdc/v1/%d?api_key=%s';

    private const PROTEIN_NUMBER = '203';
    private const FAT_TOTAL_NUMBER = '204';
    private const FAT_SATURATED_NUMBER = '606';
    private const FAT_MONOUNSATURATED_NUMBER = '645';
    private const FAT_POLYUNSATURATED_NUMBER = '646';
    private const FAT_TRANS_NUMBER = '605';
    private const CARBOHYDRATES_NUMBER = '205';
    private const SUGAR_NUMBER = '269';
    private const FIBER_NUMBER = '291';
    private const WATER_NUMBER = '255';
    private const CHOLESTEROL_NUMBER = '601';
    private const CAFFEINE_NUMBER = '262';
    private const THIAMIN_NUMBER = '404';
    private const RIBOFLAVIN_NUMBER = '405';
    private const NIACIN_NUMBER = '406';
    private const PANTOTHENIC_ACID_NUMBER = '410';
    private const VITAMIN_B6_NUMBER = '415';
    private const VITAMIN_B12_NUMBER = '418';
    private const VITAMIN_C_NUMBER = '401';
    private const VITAMIN_E_NUMBER = '323';
    private const VITAMIN_K_NUMBER = '430';
    private const FOLATE_NUMBER = '417';
    private const CALCIUM_NUMBER = '301';
    private const IRON_NUMBER = '303';
    private const MAGNESIUM_NUMBER = '304';
    private const PHOSPHORUS_NUMBER = '305';
    private const POTASSIUM_NUMBER = '306';
    private const SODIUM_NUMBER = '307';
    private const ZINC_NUMBER = '309';
    private const COPPER_NUMBER = '312';
    private const MANGANESE_NUMBER = '315';
    private const SELENIUM_NUMBER = '317';
    private const VITAMIN_A_NUMBER = '318';
    private const VITAMIN_D_NUMBER = '324';

    private const MG_UNIT_NAME = 'mg';
    private const G_UNIT_NAME = 'g';
    private const MKG_UNIT_NAME = 'µg';
    private const IU_UNIT_NAME = 'IU';

    private const UNIT_NAME_BY_NUTRIENT_NUMBER = [
        self::PROTEIN_NUMBER => self::G_UNIT_NAME,
        self::FAT_TOTAL_NUMBER => self::G_UNIT_NAME,
        self::FAT_SATURATED_NUMBER => self::G_UNIT_NAME,
        self::FAT_MONOUNSATURATED_NUMBER => self::G_UNIT_NAME,
        self::FAT_POLYUNSATURATED_NUMBER => self::G_UNIT_NAME,
        self::FAT_TRANS_NUMBER => self::G_UNIT_NAME,
        self::CARBOHYDRATES_NUMBER => self::G_UNIT_NAME,
        self::SUGAR_NUMBER => self::G_UNIT_NAME,
        self::FIBER_NUMBER => self::G_UNIT_NAME,
        self::WATER_NUMBER => self::G_UNIT_NAME,
        self::CHOLESTEROL_NUMBER => self::MG_UNIT_NAME,
        self::CAFFEINE_NUMBER => self::MG_UNIT_NAME,
        self::THIAMIN_NUMBER => self::MG_UNIT_NAME,
        self::RIBOFLAVIN_NUMBER => self::MG_UNIT_NAME,
        self::NIACIN_NUMBER => self::MG_UNIT_NAME,
        self::PANTOTHENIC_ACID_NUMBER => self::MG_UNIT_NAME,
        self::VITAMIN_B6_NUMBER => self::MG_UNIT_NAME,
        self::VITAMIN_B12_NUMBER => self::MKG_UNIT_NAME,
        self::VITAMIN_C_NUMBER => self::MG_UNIT_NAME,
        self::VITAMIN_E_NUMBER => self::MG_UNIT_NAME,
        self::VITAMIN_K_NUMBER => self::MKG_UNIT_NAME,
        self::FOLATE_NUMBER => self::MKG_UNIT_NAME,
        self::CALCIUM_NUMBER => self::MG_UNIT_NAME,
        self::IRON_NUMBER => self::MG_UNIT_NAME,
        self::MAGNESIUM_NUMBER => self::MG_UNIT_NAME,
        self::PHOSPHORUS_NUMBER => self::MG_UNIT_NAME,
        self::POTASSIUM_NUMBER => self::MG_UNIT_NAME,
        self::SODIUM_NUMBER => self::MG_UNIT_NAME,
        self::ZINC_NUMBER => self::MG_UNIT_NAME,
        self::COPPER_NUMBER => self::MG_UNIT_NAME,
        self::MANGANESE_NUMBER => self::MG_UNIT_NAME,
        self::SELENIUM_NUMBER => self::MKG_UNIT_NAME,
        self::VITAMIN_A_NUMBER => self::IU_UNIT_NAME,
        self::VITAMIN_D_NUMBER => self::IU_UNIT_NAME,
    ];

    private const IU_FACTOR_BY_NUTRIENT_NUMBER = [
        self::VITAMIN_A_NUMBER => 0.3,
        self::VITAMIN_D_NUMBER => 0.025,
    ];

    private string $apiKey;

    /**
     * FdcFacade constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @inheritDoc
     */
    public function fetch(int $fdcId): FoodNutrientDataInterface
    {
        $apiUrl = sprintf(
            self::API_URL_PATTERN,
            $fdcId,
            urlencode($this->apiKey)
        );
        $foodData = json_decode(file_get_contents($apiUrl), true);
        $foodNutrientData = new FoodNutrientData();
        foreach ($foodData['foodNutrients'] as $foodNutrientItem) {
            $nutrientNumber = $foodNutrientItem['nutrient']['number'];
            if (!array_key_exists($nutrientNumber, self::UNIT_NAME_BY_NUTRIENT_NUMBER)) {
                continue;
            }
            if ($foodNutrientItem['nutrient']['unitName'] !== self::UNIT_NAME_BY_NUTRIENT_NUMBER[$nutrientNumber]) {
                throw new UnexpectedValueException();
            }
            $amount = $foodNutrientItem['amount'];
            if (!is_float($amount)) {
                throw new UnexpectedValueException();
            }
            if ($amount === 0.) {
                continue;
            }
            if (array_key_exists($nutrientNumber, self::IU_FACTOR_BY_NUTRIENT_NUMBER)) {
                $amount = $amount * self::IU_FACTOR_BY_NUTRIENT_NUMBER[$nutrientNumber];
            }
            switch ($nutrientNumber) {
                case self::PROTEIN_NUMBER:
                    $foodNutrientData->protein = $amount;
                    break;
                case self::FAT_TOTAL_NUMBER:
                    $foodNutrientData->fatTotal = $amount;
                    break;
                case self::FAT_SATURATED_NUMBER:
                    $foodNutrientData->fatSaturated = $amount;
                    break;
                case self::FAT_MONOUNSATURATED_NUMBER:
                    $foodNutrientData->fatMonounsaturated = $amount;
                    break;
                case self::FAT_POLYUNSATURATED_NUMBER:
                    $foodNutrientData->fatPolyunsaturated = $amount;
                    break;
                case self::FAT_TRANS_NUMBER:
                    $foodNutrientData->fatTrans = $amount;
                    break;
                case self::CARBOHYDRATES_NUMBER:
                    $foodNutrientData->carbohydrates = $amount;
                    break;
                case self::SUGAR_NUMBER:
                    $foodNutrientData->sugar = $amount;
                    break;
                case self::FIBER_NUMBER:
                    $foodNutrientData->fiber = $amount;
                    break;
                case self::WATER_NUMBER:
                    $foodNutrientData->water = $amount;
                    break;
                case self::CHOLESTEROL_NUMBER:
                    $foodNutrientData->cholesterol = $amount;
                    break;
                case self::CAFFEINE_NUMBER:
                    $foodNutrientData->caffeine = $amount;
                    break;
                case self::THIAMIN_NUMBER:
                    $foodNutrientData->thiamin = $amount;
                    break;
                case self::RIBOFLAVIN_NUMBER:
                    $foodNutrientData->riboflavin = $amount;
                    break;
                case self::NIACIN_NUMBER:
                    $foodNutrientData->niacin = $amount;
                    break;
                case self::PANTOTHENIC_ACID_NUMBER:
                    $foodNutrientData->pantothenicAcid = $amount;
                    break;
                case self::VITAMIN_B6_NUMBER:
                    $foodNutrientData->vitaminB6 = $amount;
                    break;
                case self::VITAMIN_B12_NUMBER:
                    $foodNutrientData->vitaminB12 = $amount;
                    break;
                case self::VITAMIN_C_NUMBER:
                    $foodNutrientData->vitaminC = $amount;
                    break;
                case self::VITAMIN_E_NUMBER:
                    $foodNutrientData->vitaminE = $amount;
                    break;
                case self::VITAMIN_K_NUMBER:
                    $foodNutrientData->vitaminK = $amount;
                    break;
                case self::FOLATE_NUMBER:
                    $foodNutrientData->folate = $amount;
                    break;
                case self::CALCIUM_NUMBER:
                    $foodNutrientData->calcium = $amount;
                    break;
                case self::IRON_NUMBER:
                    $foodNutrientData->iron = $amount;
                    break;
                case self::MAGNESIUM_NUMBER:
                    $foodNutrientData->magnesium = $amount;
                    break;
                case self::PHOSPHORUS_NUMBER:
                    $foodNutrientData->phosphorus = $amount;
                    break;
                case self::POTASSIUM_NUMBER:
                    $foodNutrientData->potassium = $amount;
                    break;
                case self::SODIUM_NUMBER:
                    $foodNutrientData->sodium = $amount;
                    break;
                case self::ZINC_NUMBER:
                    $foodNutrientData->zinc = $amount;
                    break;
                case self::COPPER_NUMBER:
                    $foodNutrientData->copper = $amount;
                    break;
                case self::MANGANESE_NUMBER:
                    $foodNutrientData->manganese = $amount;
                    break;
                case self::SELENIUM_NUMBER:
                    $foodNutrientData->selenium = $amount;
                    break;
                case self::VITAMIN_A_NUMBER:
                    $foodNutrientData->vitaminA = $amount;
                    break;
                case self::VITAMIN_D_NUMBER:
                    $foodNutrientData->vitaminD = $amount;
                    break;
                default:
                    throw new LogicException();
            }
        }
        return $foodNutrientData;
    }

}