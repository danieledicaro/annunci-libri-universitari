<?php
class Fdb {

    private $_connection;
    protected $_result;
    private $_error;
    protected $_table;
    protected $_key;
    protected  $_return_class;
    protected $_auto_increment=false;

    public function __construct() {
        global $config;
        $this->connect( $config['db']['type'],
                        $config['db']['host'],
                        $config['db']['dbname'],
                        $config['db']['user'],
                        $config['db']['password']);
    }


    public function connect($type,$host,$dbname,$user,$password) {
        try {
        $this->_connection = new PDO("$type:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
        $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connessione fallita: ' . $e->getMessage();
        }
        debug('Connessione al database avvenuta correttamente');
        $this->doQuery('SET names \'utf8\'');
        return true;

    }

    // doQuery con controllo su errore
    /* public function doQuery($query) {
        $this->_result = $this->_connection->query($query);
        $this->_error = $this->_connection->errorInfo();
        debug($query);
        debug($this->_error);
        if ($this->_error)
            return false;
        else
            return true;
    }*/

    // doQuery con gestione eccezioni
    public function doQuery($query) {
        try{
            $this->_connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $this->_connection->beginTransaction();
            $this->_result = $this->_connection->query($query);
            $this->_connection->commit();
        }
        catch(PDOException $e){
            $this->_connection->rollBack();
            $this->_error = $e->getMessage();
        }
        /*try {
            $this->_result = $this->_connection->query($query);
        } catch(PDOException $e) {
            echo "Query fallita!" . $e->getMessage();
        }
        $this->_error = $this->_connection->errorInfo();*/
        debug($query);
        debug($this->_error);
        if ($this->_error)
            return false;
        else
            return true;
    }

    public function getResultAssoc() {
        if ($this->_result != false) {
            $numero_righe=$this->_result->rowCount();
            debug('Numero risultati:'. $numero_righe);
            if ($numero_righe>0) {
                $return = $this->_result->fetchAll(PDO::FETCH_ASSOC);
                $this->_result=false;
                return $return;
            }
        }
        return false;
    }

    public function getResult() {
        if ($this->_result!=false) {
            $numero_righe=$this->_result->rowCount();
            debug('Numero risultati:'. $numero_righe);
            if ($numero_righe>0) {
                $row = $this->_result->fetch(PDO::FETCH_ASSOC);
                $this->_result=false;
                return $row;
            }
        }
        return false;
    }

    public function getObject() {
        $numero_righe=$this->_result->rowCount();
        debug('Numero risultati:'. $numero_righe);
        if ($numero_righe>0) {
            $row = $this->_result->fetchObject($this->_return_class);
            $this->_result=false;
            return $row;
        } else
            return false;
    }

    public function getObjectArray() {
        $numero_righe=$this->_result->rowCount();
        debug('Numero risultati:'. $numero_righe);
        if ($numero_righe>0) {
            $return=array();
            while ($row = $this->_result->fetchObject($this->_return_class)) {
                $return[]=$row;
            }
            $this->_result=false;
            return $return;
        } else
            return false;
    }

    /**
     *Non funziona o non so a cosa faccia e quando usarlo...
     */
    public function close() {
        /*  La connessione viene automaticamente chiusa alla fine dello script.
            Per chiuderla manualmente: $this->_connection = NULL;
            Invece closeCursor() svuota tutto l'oggetto, che però rimane pronto al riutilizzo.
        */
        $this->_connection->closeCursor;
        debug('Connessione al db chiusa');
    }

    /**
     * Funziona array della tupla
     *
     * @param $object
     * @return bool
     */
    public function store($object) {
        $i=0;
        $values='';
        $fields='';
        debug($this->_table);
        foreach ($object as $key=>$value) {
            if (!($this->_auto_increment && $key == $this->_key) && substr($key, 0, 1)!='_') {
                if ($i==0) {
                    $fields.='`'.$key.'`';
                    $values.='\''.$value.'\'';
                } else {
                    $fields.=', `'.$key.'`';
                    $values.=', \''.$value.'\'';
                }
                $i++;
            }
        }
        $query="INSERT INTO $this->_table ($fields) VALUES ($values)";
        $error = false;
        try{
            $this->_connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $this->_connection->beginTransaction();
            $this->_connection->exec($query);
            $this->_connection->commit();
        }
        catch(PDOException $e){
            $this->_connection->rollBack();
            $error = $e->getMessage();
        }
        /*
        $this->_connection->exec($query);
        $error = $this->_connection->errorInfo();
        */
        if ($error)
            $return = false;
        else
            $return = true;
        debug($query);
        debug($error);
        if ($this->_auto_increment) {
            $result=$this->_connection->lastInsertId();
            return $result;
        } else {
            return $return;
        }
    }

    /**
     * FUNZIONA chiave della tupla
     *
     * @param $key
     * @return bool
     */
    public function load ($key) {
        $query='SELECT * ' .
                'FROM `'.$this->_table.'` ' .
                'WHERE `'.$this->_key.'` = \''.$key.'\'';
        $this->doQuery($query);
        return $this->getObject();
    }

    /**
     * Funziona oggetto preso con load
     *
     * @param $object
     * @return bool
     */
    public function delete(& $object) {
        debug($object);
        $arrayObject=$object->getObjectVars();
        debug($arrayObject);
        $query='DELETE ' .
                'FROM `'.$this->_table.'` ' .
                'WHERE `'.$this->_key.'` = \''.$arrayObject[$this->_key].'\'';
        unset($object);
        return $this->doQuery($query);
    }

    /**
     * FUNZIONA array della tupla con chiave di riferimento alla tupla da modificare
     *
     * @param $object
     * @return bool
     */
    public function update($object) {
        $i=0;
        $fields='';
        foreach ($object as $key=>$value) {
            if (!($this->_auto_increment && $key == $this->_key) && substr($key, 0, 1)!='_') {
                if ($i==0) {
                    $fields.='`'.$key.'` = \''.$value.'\'';
                } else {
                    $fields.=', `'.$key.'` = \''.$value.'\'';
                }
                $i++;
            }
            debug($fields);
        }
        $query='UPDATE `'.$this->_table.'` SET '.$fields.' WHERE `'.$this->_key.'` = \''.$object["$this->_key"].'\'';
        return $this->doQuery($query);
    }
}

?>
