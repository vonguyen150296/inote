<?php 

class DB
{
    private $__hostname = "localhost";
    private $__username = "root";
    private $__password = "";
    private $__dbname = "inote";
    private $__conn;

    public function connect(){
        if(!$this->__conn){
            $this->__conn = new mysqli($this->__hostname,$this->__username,$this->__password,$this->__dbname);
            if($this->__conn->connect_error){
                die("connected failed :".$this->__conn->connect_error);
            }
            $this->__conn->set_charset("utf8");
        }
    }

    public function dis_connect(){
        if($this->__conn){
            $this->__conn->close();
        }
    }

    public function fetch_assoc($sql=null,$type){
        if($this->__conn){
            $query = $this->__conn->query($sql);

            if($type == 0){ //data with >= 2 rows
                while($row = mysqli_fetch_assoc($query)){
                    $data[] = $row;                
                }
            }
            if($type == 1){ //data with 1 row
                $data = mysqli_fetch_assoc($query);
            }

            return $data;
        }
    }

    public function num_rows($sql = null){ //check data return
        if ($this->__conn){
            $query = $this->__conn->query($sql);
            $row = mysqli_num_rows($query);
            return $row;
        }
    }

    public function real_escape_string($string){ //SQL injection error
        if($this->__conn){
            $string = mysqli_real_escape_string($this->__conn,$string);
        }
        return $string;
    }

    // get id insert
    public function insert_id() {
        if ($this->__conn){
            return mysqli_insert_id($this->__conn);
        }
    }
    
    public function insert($table,$data){
        $value_list="";
        $key_list="";

        foreach($data as $key=>$value){
            $value_list .= ",'".$value."'";
            $key_list .= ",".$key;
        }

        $sql = "INSERT INTO ".$table."(".trim($key_list,",").") VALUES (".trim($value_list, ",").")";
        $this->__conn->query($sql);
    }

    public function update($table,$data,$where){
        $data_tmp="";

        foreach($data as $key=>$value){
            $data_tmp .= ",".$key."='".$value."'"; 
        }

        $sql = "UPDATE ".$table." SET ".trim($data_tmp,",")." WHERE ".$where;
        $this->__conn->query($sql);
    }

    public function delete($table,$where){
        $sql = "DELETE FROM ".$table." WHERE ".$where;
        $this->__conn->query($sql);
    }
    
}

?>