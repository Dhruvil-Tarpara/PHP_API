<?php


    class Config
    {
        public $HOST = "127.0.0.1";
        public $SERVER = "root";
        public $PASSWORD = "";
        public $DB_name = "stock_management";
        public $conn;
        public $STOCK_TABLE = "stocks";
        

        
        public function connect(){
           $this->conn = mysqli_connect($this->HOST,$this->SERVER,$this->PASSWORD,$this->DB_name);
        }


        public function insert($category){
            $this->connect();
            $quary = "INSERT INTO $this->STOCK_TABLE(category) VALUES('$category');";
            $res = mysqli_query($this->conn, $quary); // bool
            return $res;
        }

        public  function fetchAllRecords(){
            $this->connect();

           $query = "SELECT * FROM $this->STOCK_TABLE;";
           $res = mysqli_query($this->conn, $query); //object of mysqli_result()
           $records = [];

           while($record = mysqli_fetch_assoc($res)){
            array_push($records,$record);
           }
           
           return $records;
         }


         public function update($category,$id){
            $this->connect();

            $query = "UPDATE $this->STOCK_TABLE SET category='$category' WHERE id=$id;";
           
            $res = mysqli_query($this->data, $query); //bool

            return $res;
        }


         public function fetchSingleRecord($id){
            $this->connect();
           $query = "SELECT * FROM $this->STOCK_TABLE WHERE id=$id;";

           $res = mysqli_query($this->conn, $query);
           $record = mysqli_fetch_assoc($res);

           if($record != null){
            return true;

           }else{
            return false;
           }
         }

         public function delete($id){
            $this->connect();

            $isRecordAvailable = $this->fetchSingleRecord($id);

            if($isRecordAvailable){
                $query = "DELETE FROM $this->STOCK_TABLE WHERE id=$id;";
                $res = mysqli_query($this->conn, $query);

                return true;
            } else {
                return false;
            }
         }


         // user sign_up and sign_in

    }

?>