<?php
class Database{
    private $connection;
    function __construct(){
        $this->connect_db();
    }
    #database access information
    public function connect_db(){
        $this->connection=mysqli_connect('172.31.22.43', 'Aleksandr200544581', 'PKpf0BU5Lv', 'Aleksandr200544581');
        if(mysqli_connect_error()){
            die("Database connection failed" . mysqli_connect_error());
        }
    }
    #function to insert info into table. used after pressing the submit button
    public function create($p_name, $tel, $email, $p_address, $p_type, $p_size, $quantity){
        $sql="INSERT INTO phpPizza(p_name, tel, email, p_address, p_type, p_size, quantity) 
VALUES ('$p_name', '$tel', '$email', '$p_address', '$p_type', '$p_size', '$quantity')";
        $res=mysqli_query($this->connection, $sql);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }
    #read info from existing table
    public function read($id=null){
        $sql= "SELECT * FROM phpPizza";
        if($id){
            $sql .=" WHERE id=$id";
        }
        $res=mysqli_query($this->connection, $sql);
        return $res;
    }
    #sanitize input to prevent sql injection
    public function sanitize($var)
    {
        $return = mysqli_real_escape_string($this->connection, $var);
        return $return;
    }
}
    $database=new Database();
?>