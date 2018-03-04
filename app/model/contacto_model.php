<?php


class ContactoModel{


private $nombre;
private $correo;
private $telefono;
private $mensaje;
private $clave;
private $codigo_confimacion;
private $estatus;


//setter
public function setNombre($nombre){
   $this->nombre = $nombre;
}

public function setCorreo($correo){
   $this->correo = $correo;
}

public function setTelefono($telefono){
   $this->telefono = $telefono;
}

public function setMensaje($mensaje){
    $this->mensaje = $mensaje;
}


public function setClave($clave){
   $this->clave = $clave;
}

public function setCodigoConfirmacion($codigo_confimacion){
   $this->codigo_confirmacion = $codigo_confimacion;
}

public function setEstatus($estatus){
   $this->estatus = $estatus;
}


//getter
public function getNombre(){
   return $this->nombre;
}

public function getCorreo(){
    return $this->correo;
}

public function getTelefono(){
    return $this->telefono;
}

public function getMensaje(){
    return $this->mensaje;
}

public function getClave(){
    return $this->clave;
}

public function getCodigoConfirmacion(){
    return $this->getCodigoConfirmacion;
}

public function getEstatus(){
    return $this->estatus;
}

//endClass
}


?>