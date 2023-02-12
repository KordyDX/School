<?php

function intFunc(int $var){
    echo $var, ",";
}

function floatFunc(float $var){
    echo $var, ",";
}

function stringFunc(string $var){
    echo $var, ",";
}

function boolFunc(bool $var){
    echo $var, ",";
}

function arrayFunc(array $var){
    echo $var, ",";
}

$variables = [
    5,
    1.5,
    "Vsichni jsou mrtvi Dave. I Rimmer? Je mtrvy Dave. Vsichni jsou mrtvi Dave. Vsichni jsou uz mrtvi.",
    true,
    [12, 5]
];
echo " INTEGER ";
foreach($variables as $variable){
    try {
        intFunc($variable);
    } catch (TypeError) {
        echo "  (", gettype($variable), ": error)  ";
    }
}
echo " FLOAT ";
foreach($variables as $variable){
    try {
        floatFunc($variable);
    } catch (TypeError) {
        echo "  (", gettype($variable), ": error)  ";
    }
}
echo " STRING ";
foreach($variables as $variable){
    try {
        stringFunc($variable);
    } catch (TypeError) {
        echo "  (", gettype($variable), ": error)  ";
    }
}
echo " BOOL ";
foreach($variables as $variable){
    try {
        boolFunc($variable);
    } catch (TypeError) {
        echo "  (", gettype($variable), ": error)  ";
    }
}
echo " ARRAY ";
foreach($variables as $variable){
    try {
        arrayFunc($variable);
    } catch (TypeError) {
        echo "  (", gettype($variable), ": error)  ";
    }
}
?>