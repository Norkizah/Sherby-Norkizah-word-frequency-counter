<?php

/**
 * Calculates the total price of items in a shopping cart.
 *
 * @param array $items The array of items in cart.
 * @return float Total price
 */
function calculateTotalPrice(array $items): float
{
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'];
    }
    return $total;
}

/**
 * Performs a series of string manipulations.
 *
 * @param string $string The input string.
 * @return string The modified string.
 */
function manipulateString(string $string): string
{
    // Remove spaces and convert to lowercase
    $string = str_replace(' ', '', $string);
    $string = strtolower($string);
    return $string;
}

/**
 * Checks if a number is even or odd.
 *
 * @param int $number The input number.
 * @return string The result message.
 */
function checkNumber(int $number): string
{
    if ($number % 2 == 0) {
        return "The number " . $number . " is even.";
    } else {
        return "The number " . $number . " is odd.";
    }
}

// Calculate the total price of items in a shopping cart
$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
];
$totalPrice = calculateTotalPrice($items);
echo "Total price: $" . $totalPrice;

// Perform a series of string manipulations
$inputString = "This is a poorly written program with little structure and readability.";
$modifiedString = manipulateString($inputString);
echo "\nModified string: " . $modifiedString;

// Check if a number is even or odd
$number = 42;
$resultMessage = checkNumber($number);
echo "\n" . $resultMessage;