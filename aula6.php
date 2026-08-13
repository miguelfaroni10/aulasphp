<?php
$numeros = [2,9,7,3,4,8,9,47,89,34,55,69,23,56,567767,4,5354546,768868,454];
for($i=0;$i <count($numeros);$i++) {
    if($numeros[$i] % 2 == 0){
        print("pares: $numeros[$i] <br>");
    }else{
        print("ímpares: $numeros[$i] <br>");
    }
}
?>
