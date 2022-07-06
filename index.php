<?php

$a = ['a', 'b', 'c'];
$b = ['1', '2', '3'];
$c = ['+', '*'];

function get_combinations($arrays) {
    $result = array(array());
    foreach ($arrays as $property => $property_values) {
        $tmp = array();
        foreach ($result as $result_item) {
            foreach ($property_values as $property_value) {
                $tmp[] = $result_item + array(uniqid() => $property_value);
            }
        }
        $result = $tmp;
    }
    return $result;
}


$new = get_combinations (Array
(
    Array
    (
        '1' => 'White',
        '2' => 'Green',
        '3' => 'Blue',
        '7' => 'Yellow',
        '8' => 'Orange',
        '9' => 'Black',
        '10' => 'Red',
        '11' => 'Blue',
    ),
    Array
    (
        'S',
        'M',
        'L',
        'XL',
        'XXL',
    )
    ));

    // print_r($new);


echo '<ul>';
foreach($new as $attrs){
    echo '<li>';
    foreach($attrs as $att){
        echo '<input value="'.$att.'" >';
    }
    echo '<input placeholder="Price" >';
    echo '<input placeholder="SKU" >';
    echo '<input placeholder="Stock" >';
    echo '</li>';
}
echo '</ul>';