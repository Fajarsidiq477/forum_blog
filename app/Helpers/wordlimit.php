<?php

function wordlimit($text, $limit = 10) {
    if( strlen($text) > $limit ) $word = mb_substr($text, 0, $limit-3) . "..." ;  
    else $word = $text ;
    
    return $word ;
}