<?php


include("../model/contacto_model.php");
include("../../config/database.php");


class ContactoCtrl{
   
   private $db;


   public function __constructor(){
       $db = new Database();
       $this->db = $db->getConnect();
   } 
   
   //get
   public function getContactos(){
       try{
         $query=$this->db->prepare("SELECT * FROM cliente");
         $query->execute();

         while($row = $query->fetch(PDO::FETCH_BOTH)){
            $vect[] = $row["id_cliente"];
            $vect[] = $row["nombre"];            
         }
         return $vect;
         $query = null;
       }catch(PDOException $e){
          echo("Err function getContactos: ".$e->getMessage());
       }
   }

   public function getContacto($correo){
      $data = "";       
      try{          
         $query=$this->db->prepare("SELECT *FROM cliente where corre = :correo");
         $query->bindparam(":correo",$correo);
         $query->execute();
         $data = $query->fecth(PDO::FECTH_BOTH);
         return $data["correo"];
      }catch(PDOException $e){
          echo("Err function getContacto: ".$e->getMessage());
      }
   }

   //put
   public function putContactoEstatus($estatus,$correo){
      $data = "";
      $resp = "";
      try{
         $query=$this->db->prepare("UPDATE cliente SET estatus=:estatus WHERE correo=:correo");  
         $query->bindparam(":estatus",$estatus);
         $query->bindparam(":correo",$correo);
         $resp = $query->execute();         

         $data = ($resp == True)? True:False; 
         return $data; 
      }catch(PDOException $e){
         echo("Err function putContacto: ".$e->getMessage());
      }
   }
    
   public function putContactoCodigoConfirmacion($confimacion,$correo){
       $data="";
       $resp="";
       try{
        $query=$this->db->prepare("UPDATE cliente SET codigo_confirmacion=:confirmacion WHERE correo = :correo"); 
        $query->bindparam(":confirmacion",$confimacion);
        $query->bindparam(":correo",$correo);
        $resp = $query->execute();

        $data = ($resp == True)?True:False;
        return $data;
       }catch(PDOException $e){
           echo("Err function putContactoCodigoConfirmacion: ".$e->getMessage());
       }
   }  
  
   public function putContactoClave($clave, $correo){
       $data = "";
       $resp = "";       
       try{
         $query = $this->db->prepare("UPDATE cliente SET clave=:clave WHERE correo=:correo");
         $query->bindparam(":clave",$clave);
         $query->bindparam(":correo",$correo);
         $resp=$query->execute();

         $data =($resp == True)?True:False;
         return $data;
       }catch(PDOException $e){
            echo("Err function putContactoClave: ".$e->getMessage());
       }
   }

   public function putContacto($Contacto){
       $data="";
       $resp="";
       try{
          $query = $this->db->prepare("UPDATE cliente SET nombre=:nombre, correo=:correo, telefono=:telefono, mensaje=:mensaje WHERE correo=:correo");
          $query->bindparam(":nombre",$Contacto->nombre);
          $query->bindparam(":correo",$Contacto->correo);
          $query->bindparam(":telefono",$Contacto->telefono);
          $query->bindparam(":mensaje",$Contacto->mensaje);
          $query->bindparam(":correo",$Conctato->correo);    
          $resp = $query->execute(); 

          $data = ($resp == True)? True:False;
          return $data;
       }catch(PDOException $e){
           echo("Err function putContacto: ".$e-getMessage());   
       }
   } 
  
   //post
   public function postContacto($Contacto){
       $data="";
       $resp="";
       try{
          $query = $this->db->prepare("INSERT into cliente (nombre, correo, telefono, mensaje, estatus) VALUES (:nombre, :correo, :telefono, :mensaje, :estatus");
          $query->bindparam(":nombre",$Contacto->nombre);
          $query->bindparam(":correo",$Contacto->correo);
          $query->bindparam(":telefono",$Contacto->telefono);
          $query->bindparam(":mensaje",$Contacto->mensaje);          
          $query->bindparam(":estatus",$Conctato->estatus);
          $resp = $query->execute(); 

          $data = ($resp == True)? True:False;
          return $data;
       }catch(PDOException $e){
           echo("Err function postContacto: ".$e-getMessage());   
       }            
   }   

   //delete
   public function deleteContacto($correo){
       $data="";
       $resp="";
       try{
          $query = $this->db->prepare("DELETE FROM cliente WHERE correo=:correo");          
          $query->bindparam(":correo",$correo);
          $resp = $query->execute(); 

          $data = ($resp == True)? True:False;
          return $data;
       }catch(PDOException $e){
           echo("Err function deleteContacto: ".$e-getMessage());   
       }     
   }

   //opertions
   public function sendClave(){
      //...
   }
    
//endClass
}


?>