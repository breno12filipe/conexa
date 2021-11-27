<?php
include('../model/daos.php');

class Record{
    public function createRecord($name, $description, $value, $date){
        $DAObj = new DAO();
        $recordID = uniqid();
        $insertRecordRtn = $DAObj->insert('cash_register',['Cash_Register_ID', 'Cash_Register_Name', 'Cash_Register_Description', 'Cash_Register_Value', 'Registration_Entry'], [$recordID, $name, $description, $value, $date]);

        if ($insertRecordRtn){
            echo "Registro cadastrado com sucesso!";
            return True;
        }else{
            echo "Não foi possível cadastrar este registro";
            return False;
        }
    }

    public function listAllRecords(){
        $DAObj = new DAO();
        $selectOccurrences = $DAObj->select('*', 'cash_register');
        return json_encode($selectOccurrences);
    }

    public function deleteRecord($registerID){
        $DAObj = new DAO();
        $deleteRecord = $DAObj->delete('cash_register', "Cash_Register_ID = '$registerID'");
        if($deleteRecord){
            echo "Registro deletado com sucesso!";
        }else{
            echo "Erro, não foi possível deletar o registro";
        }
    }

    public function updateRecord($Cash_Register_ID, $Cash_Register_Name, $Cash_Register_Description, $Cash_Register_Value, $Registration_Entry){
        $DAObj = new DAO();
        $updatedRecord = $DAObj->update('cash_register', 
                                            [
                                                $Cash_Register_ID,
                                                $Cash_Register_Name,
                                                $Cash_Register_Description,
                                                $Cash_Register_Value,
                                                $Registration_Entry
                                            ],
                                            "Cash_Register_ID = '$Cash_Register_ID'");

        if ($updatedRecord){
            echo "Registro atualizado com sucesso!";
        }else{
            echo "Erro, registro não atualizado";
        }
    }
}

?>