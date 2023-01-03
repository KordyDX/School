<?php
$reply = [];
$numbers = explode(",", filter_input(INPUT_GET, "numbers"));
switch (filter_input(INPUT_GET, "operation")) {
    case "sum":
        if (count($numbers) < 2) {
            $reply = ["report" => "ERR", "result" => "Not enough numbers. At least two."];
            break;
        }
        $sum = 0;
        foreach ($numbers as $number) {
            $sum += $number;
        }
        $reply = ["report" => "OK", "result" => $sum];
        break;
    case "sub":
        if (count($numbers) < 2) {
            $reply = ["report" => "ERR", "result" => "Not enough numbers. At least two."];
            break;
        }
        $sub = $numbers[0];
        array_shift($numbers);
        foreach ($numbers as $number) {
            $sub -= $number;
        }
        $reply = ["report" => "OK", "result" => $sub];
        break;
    case "mul":
        if (count($numbers) < 2) {
            $reply = ["report" => "ERR", "result" => "Not enough numbers. At least two."];
            break;
        }
        $mul = $numbers[0];
        array_shift($numbers);
        foreach ($numbers as $number) {
            $mul *= $number;
        }
        $reply = ["report" => "OK", "result" => $mul];
        break;
    case "div":
        if (count($numbers) < 2) {
            $reply = ["report" => "ERR", "result" => "Not enough numbers. At least two."];
            break;
        }
        $div = $numbers[0];
        array_shift($numbers);
        foreach ($numbers as $number) {
            $div /= $number;
        }
        $reply = ["report" => "OK", "result" => $div];
        break;
    case "mod":
        $mod = $numbers[0];
        array_shift($numbers);
        foreach ($numbers as $number) {
            $mod %= $number;
        }
        $reply = ["report" => "OK", "result" => $mod];
        break;
    case "sqrt":
        if (count($numbers) > 1) {
            $reply = ["report" => "ERR", "result" => "Too many numbers. Sqrt takes only one."];
            break;
        }
        $sqrt = floatval($numbers[0]);
        $reply = ["report" => "OK", "result" => sqrt($sqrt)];
        break;
    default:
        $reply = ["report" => "ERR", "result" => "Input error."];    
}
echo json_encode($reply);
?>