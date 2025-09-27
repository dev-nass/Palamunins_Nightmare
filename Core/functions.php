<?php


function dd($msg)
{
    echo "<pre>";
    var_dump($msg);
    echo "</pre>";

    die();
}


function base_path($path)
{
    return str_replace('\\', '/', BASE_PATH . $path);
}


function view($path, $attributes = [])
{

    extract($attributes);


    $viewPath = base_path("/resources/views/{$path}");

    if (!file_exists($viewPath)) {
        dd('The file does not exist');
    }

    require base_path("/resources/views/{$path}");

}
