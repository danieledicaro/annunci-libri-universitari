<?php
class Fdb {

    private $db;
    private $_connection;
    private $_result;
    private $_error;
    protected $_table;
    protected $_key;
    protected  $_return_class;
    protected $_auto_increment=false;

    public function __construct() {
        global $config;
        $this->connect( $config['db']['type'],
                        $config['db']['host'],
                        $config['db']['database'],
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
        try {
            $this->_result = $this->_connection->query($query);
        } catch(PDOException $e) {
            echo "Query fallita!" . $e->getMessage();
        }
        debug($query);
        $this->_error = $this->_connection->errorInfo();
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

    public function close() {
        /*  La connessione viene automaticamente chiusa alla fine dello script.
            Per chiuderla manualmente: $this->_connection = NULL;
            Invece closeCursor() svuota tutto l'oggetto, che però rimane pronto al riutilizzo.
        */
        $this->_connection->closeCursor;
        debug('Connessione al db chiusa');
    }

    public function store($object) {
        $i=0;
        $values='';
        $fields='';
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
        $this->_connection->exec($query);
        $error = $this->_connection->errorInfo();
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

    public function load($key) {
        $query='SELECT * ' .
                'FROM `'.$this->_table.'` ' .
                'WHERE `'.$this->_key.'` = \''.$key.'\'';
        $this->doQuery($query);
        return $this->getObject();
    }

    public function delete(& $object) {
        $arrayObject=get_object_vars($object);
        $query='DELETE ' .
                'FROM `'.$this->_table.'` ' .
                'WHERE `'.$this->_key.'` = \''.$arrayObject[$this->_key].'\'';
        unset($object);
        return $this->doQuery($query);
    }

    public function update($object) {
        $i=0;
        $fields='';
        foreach ($object as $key=>$value) {
            if (!($key == $this->_key) && substr($key, 0, 1)!='_') {
                if ($i==0) {
                    $fields.='`'.$key.'` = \''.$value.'\'';
                } else {
                    $fields.=', `'.$key.'` = \''.$value.'\'';
                }
                $i++;
            }
        }
        $arrayObject=get_object_vars($object);
        $query='UPDATE `'.$this->_table.'` SET '.$fields.' WHERE `'.$this->_key.'` = \''.$arrayObject[$this->_key].'\'';
        return $this->doQuery($query);
    }

    public function search($parametri = array(), $ordinamento = '', $limit = '') {
        $filtro='';
        for ($i=0; $i<count($parametri); $i++) {
            if ($i>0) $filtro .= ' AND';
            $filtro .= ' `'.$parametri[$i][0].'` '.$parametri[$i][1].' \''.$parametri[$i][2].'\'';
        }
        $query='SELECT * ' .
                'FROM `'.$this->_table.'` ';
        if ($filtro != '')
            $query.='WHERE '.$filtro.' ';
        if ($ordinamento!='')
            $query.='ORDER BY '.$ordinamento.' ';
        if ($limit != '')
            $query.='LIMIT '.$limit.' ';
        $this->doQuery($query);
        return $this->getObjectArray();
    }
}

?>
