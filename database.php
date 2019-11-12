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

    // Establecer conexión con la base de datos.

    public function __construct()
    {
        $this->_conexion = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
        if (mysqli_connect_errno()) {
            echo "Fallo en la conexión: " . mysqli_connect_errno();
            exit();
        }
    }

    // Enviar query a la conexión y retorna un mysqli_result
    public function Query($sql)
    {
        $this->_result = mysqli_query($this->GetConn(),$sql);
        return $this->_result;
    }

    // Inserciones en la base de datos
    public function UpdateDb($sql)
    {
        $this->_result = $this->_conexion->query($sql) or die(mysqli_error($this->_result));
        return $this->_result;
    }

    // Devuelve el número de líneas
    public function NumRows()
    {
        return $this->_numRows;
    }

    // Devuelve los datos de la última llamada.
    public function Rows()
    {
        $rows = array();

        for ($x = 0; $x < $this->NumRows(); $x++) {
          $rows[] = mysqli_fetch_assoc($this->_result);
        }
        return $rows;
    }

    // Usada por otras clases para conseguir la conexión.
    public function GetConn()
    {
        return $this->_conexion;
    }

    // Inserción segura de datos
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
