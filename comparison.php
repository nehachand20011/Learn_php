<?php
$a=10;
$b="10";                                        
echo $a===$b ;//this is false because of equal value but not type. If false output does not print
echo "<br>";

//OR,

$a=10;
$b=3;
echo $a!=$b ; //this is thue because of these values is not equal. If true 1 is print
echo "<br>";

//OR,
$a=3;
$b=10;
echo $a<=>$b ;// <=> this sign is spaceship so if less value -1 ,if equal value 0 and if grater value 1.


?>

