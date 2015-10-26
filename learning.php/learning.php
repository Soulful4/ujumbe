<?php

$x = 45;
$y = 30;

function math () {
    global $x, $y;
    $y = $x + $y;

}
math ();
echo $y;

?>