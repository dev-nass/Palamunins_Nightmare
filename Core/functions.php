<?php


function dd($msg)
{
    echo "<pre>";
    var_dump($msg);
    echo "</pre>";

    die();
}

/**
 * don't understood the path, /.../, provided yet
 */
function urlIs($path)
{
    return $_SERVER['REQUEST_URI'] === `/.../.../public/index.php/{$path}`;
}


function base_path($path)
{
    return str_replace('\\', '/', BASE_PATH . '/' . $path);
}


function view($path, $attributes = [])
{

    extract($attributes);


    $viewPath = base_path("/resources/views/pages/{$path}");

    if (!file_exists($viewPath)) {
        dd('The file does not exist');
    }

    require base_path("/resources/views/pages/{$path}");

}


function redirect($path)
{
    header("Location: {$path}");
    exit();
}
