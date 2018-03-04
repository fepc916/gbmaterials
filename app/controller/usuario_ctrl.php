<?php


include("../model/contacto_model.php");
include("../../config/database.php");


class UsuarioCtrl{

   private $db;


   public function __constructor(){
       $db = new Database();
       $this->db = $db->getConnect();
   } 

   //get
   public function getUsuarios(){
       try{
         $query=$this->db->prepare("SELECT * FROM usuario");
         $query->execute();

         while($row = $query->fetch(PDO::FETCH_BOTH)){
            $vect[] = $row["id_usuario"];
            $vect[] = $row["nombre"];            
         }
         return $vect;
         $query = null;
       }catch(PDOException $e){
          echo("Err function getUsuario: ".$e->getMessage());
       }
   }
   
   public function getUsuario($correo){
      $data = "";       
      try{          
         $query=$this->db->prepare("SELECT *FROM usuario where corre = :correo");
         $query->bindparam(":correo",$correo);
         $query->execute();
         $data = $query->fecth(PDO::FECTH_BOTH);
         return $data["correo"];
      }catch(PDOException $e){
          echo("Err function getUsuario: ".$e->getMessage());
      }
   }

   //put
   public function putUsuarioEstatus($estatus,$correo){
      $data = "";
      $resp = "";
      try{
         $query=$this->db->prepare("UPDATE usuario SET estatus=:estatus WHERE correo=:correo");  
         $query->bindparam(":estatus",$estatus);
         $query->bindparam(":correo",$correo);
         $resp = $query->execute();         

         $data = ($resp == True)? True:False; 
         return $data; 
      }catch(PDOException $e){
         echo("Err function putUsuario: ".$e->getMessage());
      }
   }

    public function putUsuarioCodigoConfirmacion($confimacion,$correo){
       $data="";
       $resp="";
       try{
        $query=$this->db->prepare("UPDATE usuario SET codigo_confirmacion=:confirmacion WHERE correo = :correo"); 
        $query->bindparam(":confirmacion",$confimacion);
        $query->bindparam(":correo",$correo);
        $resp = $query->execute();

        $data = ($resp == True)?True:False;
        return $data;
       }catch(PDOException $e){
           echo("Err function putUsuarioCodigoConfirmacion: ".$e->getMessage());
       }
   }  
  
   public function putUsuarioClave($clave, $correo){
       $data = "";
       $resp = "";       
       try{
         $query = $this->db->prepare("UPDATE usuario SET clave=:clave WHERE correo=:correo");
         $query->bindparam(":clave",$clave);
         $query->bindparam(":correo",$correo);
         $resp=$query->execute();

         $data =($resp == True)?True:False;
         return $data;
       }catch(PDOException $e){
            echo("Err function putUsuarioClave: ".$e->getMessage());
       }
   }

   public function putUsuario($Usuario){
       $data="";
       $resp="";
       try{
          $query = $this->db->prepare("UPDATE usuario SET nombre=:nombre, correo=:correo WHERE correo=:correo");
          $query->bindparam(":nombre",$Usuario->nombre);
          $query->bindparam(":correo",$Usuario->correo);          
          $resp = $query->execute(); 

          $data = ($resp == True)? True:False;
          return $data;
       }catch(PDOException $e){
           echo("Err function putUsuario: ".$e-getMessage());   
       }
   } 

   //post
   public function postUsuario($Usuario){
       $data="";
       $resp="";
       try{
          $query = $this->db->prepare("INSERT into usuario (nombre, correo) VALUES (:nombre, :correo");
          $query->bindparam(":nombre",$Usuario->nombre);
          $query->bindparam(":correo",$Usuario->correo);
          $resp = $query->execute(); 

          $data = ($resp == True)? True:False;
          return $data;
       }catch(PDOException $e){
           echo("Err function postUsuario: ".$e-getMessage());   
       }            
   }   

   //delete
   public function deleteUsuario($correo){
       $data="";
       $resp="";
       try{
          $query = $this->db->prepare("DELETE FROM usuario WHERE correo=:correo");          
          $query->bindparam(":correo",$correo);
          $resp = $query->execute(); 

          $data = ($resp == True)? True:False;
          return $data;
       }catch(PDOException $e){
           echo("Err function deleteUsuario: ".$e-getMessage());   
       }     
   }



//endClass
}


?>