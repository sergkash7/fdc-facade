# FDC Facade

Facade for [The FoodData Central API](https://github.com/thephpleague/commonmark).

## Install

``` bash
composer require sergkash7/fdc-facade
```

## Gaining Access

Anyone may access and use the API.
However, a data.gov API key must be incorporated into each API request.
[Sign up to obtain a key](https://fdc.nal.usda.gov/api-key-signup.html).


## Example

``` php
$fdc = new FdcFacade('YOUR_API_KEY');
$food = $fdc->fetch(173441);

print_r([
    'Protein (grams)' => $food->getProtein(),
    'Fat total (grams)' => $food->getFatTotal(),
    'Carbohydrates (grams)' => $food->getCarbohydrates(),
    'Fat saturated (grams)' => $food->getFatSaturated(),
    'Fat monounsaturated (grams)' => $food->getFatMonounsaturated(),
    'Fat polyunsaturated (grams)' => $food->getFatPolyunsaturated(),
    'Fat trans (grams)' => $food->getFatTrans(),
    'Sugar (grams)' => $food->getSugar(),
    'Fiber (grams)' => $food->getFiber(),
    'Water (grams)' => $food->getWater(),
    'Cholesterol (milligrams)' => $food->getCholesterol(),
    'Caffeine (milligrams)' => $food->getCaffeine(),
    'Vitamin A (micrograms)' => $food->getVitaminA(),
    'Thiamin (milligrams)' => $food->getThiamin(),
    'Riboflavin (milligrams)' => $food->getRiboflavin(),
    'Niacin (milligrams)' => $food->getNiacin(),
    'Pantothenic acid (milligrams)' => $food->getPantothenicAcid(),
    'Vitamin B6 (milligrams)' => $food->getVitaminB6(),
    'Vitamin B12 (micrograms)' => $food->getVitaminB12(),
    'Vitamin C (milligrams)' => $food->getVitaminC(),
    'Vitamin D (micrograms)' => $food->getVitaminD(),
    'Vitamin E (milligrams)' => $food->getVitaminE(),
    'Vitamin K (micrograms)' => $food->getVitaminK(),
    'Folate (micrograms)' => $food->getFolate(),
    'Calcium (milligrams)' => $food->getCalcium(),
    'Iron (milligrams)' => $food->getIron(),
    'Magnesium (milligrams)' => $food->getMagnesium(),
    'Phosphorus (milligrams)' => $food->getPhosphorus(),
    'Potassium (milligrams)' => $food->getPotassium(),
    'Sodium (milligrams)' => $food->getSodium(),
    'Zinc (milligrams)' => $food->getZinc(),
    'Copper (milligrams)' => $food->getCopper(),
    'Manganese (milligrams)' => $food->getManganese(),
    'Selenium (micrograms)' => $food->getSelenium(),
]);
```

``` bash
[Protein (grams)] => 3.37
[Fat total (grams)] => 0.97
[Carbohydrates (grams)] => 4.99
[Fat saturated (grams)] => 0.633
[Fat monounsaturated (grams)] => 0.277
[Fat polyunsaturated (grams)] => 0.035
[Fat trans (grams)] => 
[Sugar (grams)] => 5.2
[Fiber (grams)] => 
[Water (grams)] => 89.92
[Cholesterol (milligrams)] => 5
[Caffeine (milligrams)] => 
[Vitamin A (micrograms)] => 14.1
[Thiamin (milligrams)] => 0.02
[Riboflavin (milligrams)] => 0.185
[Niacin (milligrams)] => 0.093
[Pantothenic acid (milligrams)] => 0.361
[Vitamin B6 (milligrams)] => 0.037
[Vitamin B12 (micrograms)] => 0.47
[Vitamin C (milligrams)] => 
[Vitamin D (micrograms)] => 0.025
[Vitamin E (milligrams)] => 0.01
[Vitamin K (micrograms)] => 0.1
[Folate (micrograms)] => 5
[Calcium (milligrams)] => 125
[Iron (milligrams)] => 0.03
[Magnesium (milligrams)] => 11
[Phosphorus (milligrams)] => 95
[Potassium (milligrams)] => 150
[Sodium (milligrams)] => 44
[Zinc (milligrams)] => 0.42
[Copper (milligrams)] => 0.01
[Manganese (milligrams)] => 0.003
[Selenium (micrograms)] => 3.3
```