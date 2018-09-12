<?php
/**
 * Created by PhpStorm.
 * User: juliengreletpro
 * Date: 02/10/2017
 * Time: 10:50
 */

add_action('genesis_after_header', 'testCat');

function textCat(){
    echo 'blablabla';
}

genesis();