<?php

// TODO: use a dedicated class for response
function view($pageName, $data = [])
{
    extract($data);
    return require "app/views/{$pageName}.view.php";
}

function redirect($path)
{
    header("Location: /{$path}");
}
