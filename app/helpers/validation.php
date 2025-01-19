<?php

function sanitize_input(string $input): string
{
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

function validateLength(string $string, string $varName, int $min, int $max): ?string
{
    if (strlen($string) < $min || strlen($string) > $max) {
        $varNameCapitalized = ucfirst($varName); // Capitalize the first letter
        return "$varNameCapitalized must be between $min and $max characters.";
    }
    return null; // Return null if validation passes
}

function validateEmail(string $string): string
{
    if (!filter_var($string, FILTER_VALIDATE_EMAIL)) {
        return "Please enter a valid email address.";
    }
    return $string;
}
