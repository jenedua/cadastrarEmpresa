<?php
namespace app\database\entity;
abstract class Entity{ 
    protected array $attributes = [];
    public function __set(string $property, string $value){
        $this->attributes[$property] = $value;
    }
    /**
     * Summary of __get
     * @param string $property
     * @return mixed
     */
    public function  __get(string $property){
        return $this->attributes[$property];
    }
    public function getAttributes()
    {
        return $this->attributes;
    }

} 


?>