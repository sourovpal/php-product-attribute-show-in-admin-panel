<?php
//https://github.com/bpolaszek/cartesian-product
$attr_list = [
    [
        'Red',
        'Green',
    ],[
        "L",
        "M",
        "S",
    ],[
        "100",
        "200",
        "300",
    ]
];


function myFun($attr_list){

    $return = [[]];

    foreach($attr_list as $attr){

        $tmp = [];

        foreach($return as $return_attr){


            foreach($attr as $attrValue){

                $tmp[] = $return_attr + [uniqid() => $attrValue];

            }
        }
        
        $return = $tmp;
    }

    return $return;
};

$new = myFun($attr_list);

if(isset($_POST['submit'])){
    echo '<pre>';
    print_r($_POST);
}


$attcon = 0;
echo '<form method="post"> <ul>';
foreach($new as $attrs){
    echo '<li style="margin-bottom:5px;">';
    foreach($attrs as $key => $att){
        echo '<input class="attr" name="attr['.$attcon.'][attr_list][]" style="width: 100px;margin-right: 25px;" value="'.$att.'" >';
    }
    echo '<input name="attr['.$attcon.'][price]" style="width: 100px;margin-right: 25px;" placeholder="Price" >';
    echo '<input name="attr['.$attcon.'][sku]" style="width: 100px;margin-right: 25px;" placeholder="SKU" >';
    echo '<input name="attr['.$attcon.'][stock]" style="width: 100px;margin-right: 25px;" placeholder="Stock" >';
    echo '<button>Add</button>';
    echo '<button class="delete">Del</button>';
    echo '</li>';
    $attcon +=1; 
}
echo '</ul>';






?>

<?php

$attr_list = [
    [
        'Red',
        'Green',
    ],[
        "L",
        "M",
        "S",
    ]
];


function myFun($attr_list){

    $return = [[]];

    foreach($attr_list as $attr){

        $tmp = [];

        foreach($return as $return_attr){


            foreach($attr as $attrValue){

                $tmp[] = $return_attr + [uniqid() => $attrValue];

            }
        }
        
        $return = $tmp;
    }

    return $return;
};

$new = myFun($attr_list);

if(isset($_POST['submit'])){
    echo '<pre>';
    $i = 0;
    foreach($_POST['attr'] as $attr){
        $attr['image'] = [
            'name' => $_FILES['image']['name'][$i],
            'type' => $_FILES['image']['type'][$i],
            'tmp_name' => $_FILES['image']['tmp_name'][$i],
            'error' => $_FILES['image']['error'][$i],
            'size' => $_FILES['image']['size'][$i],
        ];
        $index = 0;
        foreach($attr['image']['name'] as $name){
            move_uploaded_file($attr['image']['tmp_name'][$index], __DIR__.'/upload/'.$name);
            $index++;
        }
        $i++;
    }
}


$attcon = 0;
echo '<form method="post" enctype="multipart/form-data"> <ul>';
foreach($new as $attrs){
    echo '<li style="margin-bottom:5px;">';
    foreach($attrs as $key => $att){
        echo '<input class="attr" name="attr['.$attcon.'][attr_list][]" style="width: 100px;margin-right: 25px;" value="'.$att.'" >';
    }
    echo '<input name="attr['.$attcon.'][price]" style="width: 100px;margin-right: 25px;" placeholder="Price" >';
    echo '<input name="attr['.$attcon.'][sku]" style="width: 100px;margin-right: 25px;" placeholder="SKU" >';
    echo '<input name="attr['.$attcon.'][stock]" style="width: 100px;margin-right: 25px;" placeholder="Stock" >';
    echo '<input name="image['.$attcon.'][]" type="file" style="margin-right: 25px;" multiple>';
    echo '<button>Add</button>';
    echo '<button class="delete">Del</button>';
    echo '</li>';
    $attcon +=1; 
}
echo '</ul>';






?>

<button name="submit" id="submit">Submit</button>

</form>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    // (function(){
    //     $('#submit').click(function(){
    //         $('.attr').map(function(test, val){
    //             console.log($());
    //         });
    //     });
    // })();
</script>
