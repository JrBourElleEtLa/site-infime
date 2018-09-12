<?php
/**
 * Created by PhpStorm.
 * User: juliengreletpro
 * Date: 02/10/2017
 * Time: 10:42
 */

add_action( 'genesis_after_header' , 'test' );

function test(){
    echo 'test';
}

genesis();