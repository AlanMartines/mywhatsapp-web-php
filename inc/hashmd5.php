<?php

//
function Hashes($var_one, $var_two)
{
    $one = $var_one;
    $two = $var_two;
    $thr = $one . $two;
    $fou = $thr . $one;
    $fiv = $fou . $one;
    $six = $thr . $thr;
    $sev = $one . $two . $thr . $one;
    $md1 = md5($sev . $two . md5($one . $fiv . md5($sev . strrev($sev))));
    $md2 = md5($md1 . md5($one . $thr . $fou . md5($sev . $md1)));
    $md3 = md5($md2 . md5($md1));
    $md4 = md5($md3 . $md1 . $md2 . md5($sev));
    return $md2 . $md1 . $md4 . md5($md3 . $md2);
}
//
$rashmd5 = Hashes('','');
print $rashmd5;
?>