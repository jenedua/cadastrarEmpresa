<?php 
namespace app\database\model;

//use app\database\Connection;
use app\database\entity\Entity;
use Connection;
use Exception;
use PDO;
use ReflectionClass;


abstract class Model{
    protected string $table;

    private function getEntity(){
        $reflect = new ReflectionClass(static::class);
        $class = $reflect->getShortName();
        $entity = "app\\database\\entity\\{$class}Entity";

        if(!class_exists($entity)){
            throw new Exception("Entity {$entity} does not found");
        }
        return $entity;
        //var_dump($entity);

    }
    public function all(string $fields = '*')
    {
        try {
            $connection = Connection::getConnection();
            $query = "select {$fields} from {$this->table}";
            $stmt = $connection->query($query);
            return $stmt->fetchAll(PDO::FETCH_CLASS, $this->getEntity());
        } catch (\PDOException $th) {
            var_dump($th->getMessage());
        }
    }
    public function create(Entity $entity)
    {
        try {
            $connection = Connection::getConnection();
            $query = "insert into {$this->table} (";
            $query .= implode(',', array_keys($entity->getAttributes())) .') Values(';
            $query .= ':'. implode(',:', array_keys($entity->getAttributes())).')' ;

            $prepare = $connection->prepare($query);
           $result= $prepare->execute($entity->getAttributes());
             session_start();

           if($result){
                $_SESSION['msg'] = " 
							<div id='alert' class='alert alert-success' style='font-family:Montserrat; font: 10pt Verdana, Geneva, sans-serif;'>							
								Empresa cadastrado com sucesso!
							</div>
							
								";
                header("Location: index.php");

                //$_SESSION['message']= "empresa cadastrado com sucesso";
           }

            //return $prepare->execute($entity->getAttributes());

            //var_dump($query);
        } catch (\PDOException $th) {
            var_dump($th->getMessage());
        }
        
    }
}
?>