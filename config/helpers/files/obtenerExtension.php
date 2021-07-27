<?php
function obtenerExtensionArchivo($file){
    return pathinfo($file, PATHINFO_EXTENSION);   
}

function crearDirectorioTercero(){

}

function nombreArchivo($extension){
   return uniqid() . '.' . $extension;
}