<?php

function ObtenerExtension($dato) {
    $extension = explode('.', $dato);
    return $extension[1];
}

?>