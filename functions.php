<?php

function view($view, $data = []) {
    foreach ($data as $key => $value) {
        $$key = $value;
    }
    require "views/template/app.php";
}

function dgocheff(...$dump) {
    cmdzin($dump);
    die();
}

function cmdzin(...$dump) {
    var_dump($dump);
}


function abort($code) {
    http_response_code($code);
    view($code);
    exit();
}

function flash() {
    return new Flash;
}

