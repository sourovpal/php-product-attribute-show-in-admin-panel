<?php

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
        'White',
        'Green',
        'Blue',
        'Yellow',
        'Orange',
        'Black',
        'Red',
        'Blue',
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











$arrays = [
    ['Red', 'Green', 'Yellow'], 
    ['S', 'M', 'L']
];
$result = [[]];
foreach($arrays as $array_key => $array_values){
    $temp = [];
    foreach($result as $result_key => $result_value){
        foreach($array_values as $key => $value){
            $temp[] = $result_value + array($array_key => $value);
        }
        $index = 0;
    }
    $result =  $temp;
}
echo '<pre>';
print_r($result);




$array_groups = [];
  
    foreach($result as $key => $items){
        if($key == 0){
        foreach($items as $k => $item){
            $array_groups[$k] = [$item];
        }
        }else{
            foreach($items as $k => $item){
                $current = $array_groups[$k];
                if(!in_array($item, $current)){
                    $current[] = $item;
                }
                $array_groups[$k] = $current;
            }
        }
    }
echo '<pre>';
print_r($array_groups);




  
  $array_groups = [];
  
    foreach($result as $key => $items){
        foreach($items as $k => $item){
            if($key == 0){
                $array_groups = array_chunk($items, 1);
            }else{
                $current = $array_groups[$k];
                if(!in_array($item, $current)){
                    $current[] = $item;
                }
                $array_groups[$k] = $current;
            }
        }
    }
echo '<pre>';
print_r($array_groups);











