<?php
/**
 * Number Guessing Game
 *
 * This PHP script plays a simple number guessing game where the user needs to guess a random number
 * within a specified range. The script takes optional command-line arguments to set the minimum
 * and maximum values of the range.
 *
 * Usage:
 *   php number_guessing_game.php --min=<min_value> --max=<max_value>
 *
 * Options:
 *   --min=<min_value>  The minimum value of the number range (default is 1).
 *   --max=<max_value>  The maximum value of the number range (default is 100).
 *
 * How to Play:
 *   - The script generates a random number within the specified range.
 *   - The user is prompted to enter their guess.
 *   - If the user's guess is too high or too low, they are given a hint.
 *   - The game continues until the user guesses the correct number.
 */

// Parse command-line options using getopt
$options = getopt("", ["min::", "max::"]);

// Set the minimum and maximum values for the number range
$min = (int)($options["min"] ?? 1); // Default minimum value is 1
$max = (int)($options["max"] ?? 100); // Default maximum value is 100

// Generate a random number within the specified range
$number = rand($min, $max);

// Start the game loop
while (true) {
    // Read user input
    $user_input = (int)readline("Enter Your Number: ");

    // Check if the user entered a valid integer
    if (!is_numeric($user_input)) {
        echo "Please enter a valid number.\n";
        continue;
    }

    // Compare user input with the random number
    if ($user_input < $number) {
        echo "Please guess a bigger number.\n";
    } elseif ($user_input > $number) {
        echo "Please guess a lower number.\n";
    } else {
        echo "Congratulations! You guessed the right answer! 😁\n";
        break;
    }
}
?>
