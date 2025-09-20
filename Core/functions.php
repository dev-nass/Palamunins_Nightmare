<?php

function dd($msg)
{
    echo "<pre>";
    var_dump($msg);
    echo "</pre>";

    die();
}