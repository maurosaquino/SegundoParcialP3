<?php
class AccesoDatos
{
    private static $ObjetoAccesoDatos;
    private $objetoPDO;
 
    private function __construct($param)
    {
        try { 
            $this->objetoPDO = new PDO('mysql:host=localhost;dbname='.$param.';charset=utf8', 'root', '', 
										array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $this->objetoPDO->exec("SET CHARACTER SET utf8");
            } 
        catch (PDOException $e) { 
            print "Error!: " . $e->getMessage(); 
            die();
        }
    }
 
    public function RetornarConsulta($sql)
    { 
        return $this->objetoPDO->prepare($sql); 
    }
    
     public function RetornarUltimoIdInsertado()
    { 
        return $this->objetoPDO->lastInsertId(); 
    }
 
    public static function dameUnObjetoAcceso($param)
    { 
        if (!isset(self::$ObjetoAccesoDatos)) {          
            
            if($param=='CD'){
            self::$ObjetoAccesoDatos = new AccesoDatos('cdcols');
            }else{
            self::$ObjetoAccesoDatos = new AccesoDatos('login_pdo');    
            } 

        } 
        return self::$ObjetoAccesoDatos;        
    }

    public function __clone()
    { 
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR); 
    }


}
?>