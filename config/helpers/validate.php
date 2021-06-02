<?php

function rip_tags($string) {

    // ----- remove HTML TAGs -----
    $string = preg_replace('/<[^\\>]*>/', ' ', $string);
    $string = preg_replace("/\{(.*?)\}/", ".", $string);
    $string = preg_replace("/\[(.*?)\]/", ".", $string);
    $string = preg_replace("/\<(.*?)\>/", ".", $string);

    //------ remove parenthesis----
    $string = str_replace(['(', ')'], '', $string);
    // ----- remove control characters -----
    $string = str_replace("\r", '', $string);    // --- replace with empty space
    $string = str_replace("\n", ' ', $string);   // --- replace with space
    $string = str_replace("\t", ' ', $string);   // --- replace with space
    $string = str_replace(['//', '/', ':', '='], '', $string);
    $string = str_replace(['\\', '<', '>', '´', '{', '}', '[', '*', ']'], '', $string);
    $string = str_replace(['*\*', 'http', 'tfp', 'telnet'], '', $string);
    $string = str_replace(['""', '"', '?', '¿', '||', '+', '.', '_', '@', '-', ';'], '', $string);
    // ----- remove multiple spaces -----
    $string = trim(preg_replace('/ {2,}/', ' ', $string));
    return $string;
}

function validaRequerido($valor) {
    if (trim($valor) == '') {
        return false;
    } else {
        return true;
    }
}

function validarEntero($valor, $opciones = null) {
    if (filter_var($valor, FILTER_VALIDATE_INT, $opciones) === FALSE) {
        return false;
    } else {
        return true;
    }
}

function validaEmail($valor) {
    if (filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE) {
        return false;
    } else {
        return true;
    }
}

function validateInteger($val) {
    $data = filter_var($val, FILTER_SANITIZE_NUMBER_INT);
    return htmlspecialchars($data);
}

function validateEmail($val) {
    $data = trim(filter_var($val, FILTER_SANITIZE_EMAIL));
    $data = preg_replace('/[^A-Za-z0-9_.@\-]/', '', $data); // We remove special chars and accept only Alphs&Nums&.&@
    return $data;
}

function validateURL($val) {
    $val = filter_var($val, FILTER_VALIDATE_URL);
    if ($val === false) {
        return false;
    } else {
        return true;
    }
}

?>