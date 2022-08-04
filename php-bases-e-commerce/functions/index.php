<?php

function getNbOfPages(int $nbProducts, int $nbProductByPage): int
{
    $res = floor($nbProducts / $nbProductByPage);
    if (($nbProducts % $nbProductByPage) != 0) {
        $res++;
    }
    return $res;
}
