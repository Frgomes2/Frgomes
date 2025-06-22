<?php

function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function dd($var, $die = 0){
    echo "<pre>";
    print_r($var);
    echo "</pre>";

    if($die){
        die();
    }
}

function puts($var, $die = 0){
    if($_SESSION['SIC_GRUPO'] == 1){
        echo "<pre>";
        print_r($var);
        echo "</pre>";

        if($die){
            die();
        }
    }
}