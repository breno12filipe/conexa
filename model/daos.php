<?php
require_once('database.php');

class DAO extends DataBase{
    /*
        What is a DAO? 
        https://pt.stackoverflow.com/questions/113840/como-funciona-o-padr%C3%A3o-dao

        OOP in PHP
        https://www.w3schools.com/php/php_oop_what_is.asp

    */

    function __construct(){
        // Initialize database connection
    }

    function __destruct(){
        // End database connection
    }


    /*
        Usage example:
            insert('login', ['UserEmail','UserPassword'], ['johndoe@somedomain.com', '123456']);
            observation: values and fields parameter must be passed as array!
            returns true if it managed to persist the data
    */
    public function insert($tableName, $fields, $values){
        $values = $this->adjustArraySQLSyntax($values);
        $fields = $this->adjustArraySQLSyntax($fields, true);
        $tableCols = $this->getTableColumns($tableName, true);
        $insertQuery = "INSERT INTO $tableName ($fields) VALUES ($values);";
        $insertRtn = mysqli_query($this->connect(), $insertQuery);

        if($insertRtn){
            return True;
        }else{
            return False;
        }

        $this->connect()->close();
        
    }

    /*
    for selected data use array ['field1', 'field2']
        Usage example:
            select(['field1', 'field2'], 'table name', 'condition']);
            condition is a optional parameter
    */
    public function select($selectedData, $tableName, $condition=NULL){

        $selectedData = $this->adjustArraySQLSyntax($selectedData, true);

        $selectQuery = "SELECT $selectedData FROM $tableName;";
        if($condition != NULL){
            $selectQuery = "SELECT $selectedData FROM $tableName WHERE $condition;";
        }
        $selectRtn = mysqli_query($this->connect(), $selectQuery);
        //$row = mysqli_num_rows($result);

        $occurrences = array();
        $iterator = 0;
        while ($row = $selectRtn->fetch_assoc()) {
            $occurrences[$iterator] = $row;
            $iterator++;
        }

        return $occurrences;
    }

    public function update($tableName, $values, $condition){
        /*
            UPDATE $tableName
            SET column1 = $values,
            WHERE $condition; 
        */

        $tableCols = $this->getTableColumns($tableName);
        $setStr = "";
        for ($i = 0; $i < sizeof($tableCols); $i++){
            if ($i == array_key_last($tableCols)){
                $setStr .= $tableCols[$i] . " = " . "'" . $values[$i] . "'";
            }else{
                $setStr .= $tableCols[$i] . " = " . "'" . $values[$i] . "'" . ",";
            }
        }
        $updateQuery = "UPDATE $tableName SET $setStr WHERE $condition;";
        $updateRtn = mysqli_query($this->connect(), $updateQuery);

        if($updateRtn){
            return True;
        }else{
            return False;
        }
    }

    public function delete($tableName, $condition){
        $deleteQuery = "DELETE FROM $tableName WHERE $condition;";
        $deleteRtn = mysqli_query($this->connect(), $deleteQuery);

        if($deleteRtn){
            return True;
        }else{
            return False;
        }
    }

    private function getTableColumns($tableName, $adjustArray=NULL){
        $getTableColsQuery = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$tableName';";
        $getTableColsRtn = mysqli_query($this->connect(), $getTableColsQuery);
        
        $tableCols = array();
        $iterator = 0;
        while ($row = $getTableColsRtn->fetch_assoc()) {
            $tableCols[$iterator] = $row["COLUMN_NAME"];        
            $iterator++;
        }        

        if ($adjustArray){
            $tableCols = $this->adjustArraySQLSyntax($tableCols);
        }

        
        return $tableCols;
    }

    private function adjustArraySQLSyntax($array, $ajustFields = false){
        $array = json_encode($array);
        $array = str_replace('"', "'", $array);

        if ($ajustFields){
            $array = str_replace("'", "", $array);
        }
        $array = str_replace('[', "", $array);
        $array = str_replace(']', "", $array);
        $array = trim($array);
        return $array;
    }
}
?>