<?php
class Database
{
    protected $_conexion;
    protected $_result;
    protected $_numRows;
    private $_host = "localhost";
    private $_username = "usuarioCCDB";
    private $_password = "gQX5qZSbL0bhITxO";
    private $_database = "CCDB";

    // Establish connection to database, when class is instantiated
    public function __construct()
    {
        $this->_conexion = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
        if (mysqli_connect_errno()) {
            echo "Connection Failed: " . mysqli_connect_errno();
            exit();
        }
    }

    // Enviar query a la conexión y retorna un mysqli_result
    public function Query($sql)
    {
        //$this->_result = $this->_conexion->query($sql) or die(mysqli_error($this->_result));

        $this->_result = mysqli_query($this->GetConn(),$sql);
        //$this->_numRows = mysqli_num_rows($this->_result);
        return $this->_result;
        //return (mysqli_query($this->GetConn(),$sql));
    }

    // Inserts into databse
    public function UpdateDb($sql)
    {
        $this->_result = $this->_conexion->query($sql) or die(mysqli_error($this->_result));
        //$this->_result = mysqli_query($this->GetConn(),$sql) or die(mysqli_error($this->_result));
        return $this->_result;
    }

    // Return the number of rows
    public function NumRows()
    {
        return $this->_numRows;
    }

    // Fetchs the rows and return them
    public function Rows()
    {
        $rows = array();

        for ($x = 0; $x < $this->NumRows(); $x++) {
          $rows[] = mysqli_fetch_assoc($this->_result);
        }
        return $rows;
    }

    // Used by other classes to get the connection
    public function GetConn()
    {
        return $this->_conexion;
    }

    // Securing input data
    public function SecureInput($value)
    {
        return mysqli_real_escape_string($this->_conexion, $value);
    }

    public function Close()
    {
        $this->_conexion->close();
    }
    public function getRoles($sql){

        return (mysqli_query($this->GetConn(),$sql));

    }
}
