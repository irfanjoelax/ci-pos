<?php

function uang($angka)
{
    $hasil = number_format($angka,0,',','.');
    return $hasil;
}