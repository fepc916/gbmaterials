<?php


class UsuarioModel{
    private $nombre;
    private $correo;
    private $clave;
    private $codigo_confirmacion;
    private $estatus;

     
//setter
public function setNombre($nombre){
   $this->nombre = $nombre;
}

public function setCorreo($correo){
   $this->correo = $correo;
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