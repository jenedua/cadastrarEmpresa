<?php  
namespace app\database\entity;
use Exception;

class EmpresaEntity extends Entity{

   public function CNPJIsValid()
    {
        if(strlen($this->attributes['cnpj']) != 14 ){
            throw new Exception("CNPJ invalid");
        }
        return $this->attributes['cnpj'];
       ;
     }

}

?>