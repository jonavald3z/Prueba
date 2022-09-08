<?php
namespace Install;
defined("APPPATH") OR die("Access denied");
use \PDO;
Class Database{

    static $_instance;
    static $_mysqli;

    static $_debug;
    static $_mail;

    private function __construct(){
        $this->conectar();
    }

    private function __clone(){ }

    public static function getInstance($debug = true, $mail = false){

        self::$_debug = $debug;
        self::$_mail = $mail;

        if (!(self::$_instance instanceof self)){
            self::$_instance=new self();
        }
        return self::$_instance;
    }

    private function conectar(){

        //load from config/config.ini
        $config = App::getConfig();
        $this->_dbHost = $config["host"];
        $this->_dbUser = $config["user"];
        $this->_dbPassword = $config["password"];
        $this->_dbName = $config["database"];
        $this->_dbPort =$config["port"];

        try {

            $this->_mysqli = new PDO("mysql:host=".$this->_dbHost.";port={$this->_dbPort};dbname=".$this->_dbName, $this->_dbUser , $this->_dbPassword);
            $this->_mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(\PDOException $e){
            if(self::$_debug)
                echo $e->getMessage();
            if(self::$_mail)
                mail(self::MAIL,'error en conexion '.self::TEMA,$e->getMessage());

            die();
        }
    }

    public function insert($sql,$params = ''){

        if($params == '' ){
            try{
                $this->_mysqli->beginTransaction();
                $stmt = $this->_mysqli->exec($sql);
                $res = $this->_mysqli->lastInsertId();
                $this->_mysqli->commit();
                return $res;
            }catch(\PDOException $e){
                $this->_mysqli->rollback();
                if(self::$_mail)
                    mail(self::MAIL,'error en insert '.self::TEMA,"Error sql : ".$e->getMessage()."\nSql : $sql \n params :\n".print_r($params,1));
                if(self::$_debug)
                    return false;
            }
        }else{
            try{
                $this->_mysqli->beginTransaction();
                $stmt = $this->_mysqli->prepare($sql);
                $stmt->execute($params);
                $res = $this->_mysqli->lastInsertId();
                $this->_mysqli->commit();
                return $res;
            }catch(\PDOException $e){
                $this->_mysqli->rollback();
                if(self::$_mail)
                    mail(self::MAIL,'error en insert '.self::TEMA,"Error sql : ".$e->getMessage()."\nSql : $sql \n params :\n".print_r($params,1));
                if(self::$_debug)
                    return false;
            }
        }
    }

    public function update($sql,$params = ''){

        if($params == ''){
            try{
                $this->_mysqli->beginTransaction();
                $stmt = $this->_mysqli->exec($sql);
                $this->_mysqli->commit();
                return $stmt;
            }catch(\PDOException $e){
                $this->_mysqli->rollback();
                if(self::$_mail)
                    mail(self::MAIL,'error en update '.self::TEMA,"Error sql : ".$e->getMessage()."\nSql : $sql \n params :\n".print_r($params,1));
                if(self::$_debug)
                    return false;
            }
        }else{
            try{
                $this->_mysqli->beginTransaction();
                $stmt = $this->_mysqli->prepare($sql);
                $stmt->execute($params);
                $this->_mysqli->commit();
                return $stmt->rowCount();
            }catch(\PDOException $e){
                $this->_mysqli->rollback();
                if(self::$_mail)
                    mail(self::MAIL,'error en update '.self::TEMA,"Error sql : ".$e->getMessage()."\nSql : $sql \n params :\n".print_r($params,1));
                if(self::$_debug)
                    return false;
            }
        }
    }

    public function delete($sql,$params = ''){

        if($params == ''){
            try{
                $this->_mysqli->beginTransaction();
                $stmt = $this->_mysqli->exec($sql);
                $this->_mysqli->commit();
                return $stmt;
            }catch(\PDOException $e){
                $this->_mysqli->rollback();
                if(self::$_mail)
                    mail(self::MAIL,'error en delete '.self::TEMA,"Error sql : ".$e->getMessage()."\nSql : $sql \n params :\n".print_r($params,1));
                if(self::$_debug)
                    return false;
            }
        }else{
            try{
                $this->_mysqli->beginTransaction();
                $stmt = $this->_mysqli->prepare($sql);
                $stmt->execute($params);
                $this->_mysqli->commit();
                return $stmt->rowCount();
            }catch(\PDOException $e){
                $this->_mysqli->rollback();
                if(self::$_mail)
                    mail(self::MAIL,'error en delete '.self::TEMA,"Error sql : ".$e->getMessage()."\nSql : $sql \n params :\n".print_r($params,1));
                if(self::$_debug)
                    //echo "Error sql : ".$e->getMessage()."\nSql : $sql \n params :\n".print_r($params,1);
                    return false;
            }
        }
    }

    public function queryAll($sql,$params = ''){

        if($params == ''){
            try{
                $stmt = $this->_mysqli->query($sql);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(\PDOException $e){
                if(self::$_mail)
                    mail(self::MAIL,'error en queryAll '.self::TEMA,"Error sql : ".$e->getMessage()."\nSql : $sql \n params :\n".print_r($params,1));
                if(self::$_debug)
                    return false;
            }
        }else{
            try{
                $stmt = $this->_mysqli->prepare($sql);
                foreach($params AS $values=>$val)
                    $stmt->bindParam($values,$val);
                $stmt->execute($params);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(\PDOException $e){
                if(self::$_mail)
                    mail(self::MAIL,'error en queryAll '.self::TEMA,"Error sql : ".$e->getMessage()."\nSql : $sql \n params :\n".print_r($params,1));
                if(self::$_debug)
                    return false;
            }
        }
    }
}
