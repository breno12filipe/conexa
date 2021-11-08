<?php
include('../model/daos.php');

class Appointment{

    // create new appointment
    public function createAppointment($title, $start_date, $due_date, $description){
        $DAObj = new DAO();
        $appointmentID = uniqid();
        $insertAppointmentRtn = $DAObj->insert('appointment',['Appointment_ID', 'Title', 'Appointment_Description', 'Start_date', 'Due_date'], [$appointmentID, $title, $description, $start_date, $due_date]);

        if ($insertAppointmentRtn){
            echo "Compromisso registrado com sucesso!";
            return True;
        }else{
            echo "Não foi possível registrar este compromisso";
            return False;
        }
    }

    // list all Appointments
    public function listAllAppointments(){
        $DAObj = new DAO();
        $selectOccurrences = $DAObj->select('*', 'appointment');
        return json_encode($selectOccurrences);
    }

    public function deleteAppointment($appointmentID){
        $DAObj = new DAO();
        $deleteAppointment = $DAObj->delete('appointment', "Appointment_ID = '$appointmentID'");
        if($deleteAppointment){
            echo "Compromisso deletado com sucesso!";
        }else{
            echo "Erro, não foi possível deletar o compromisso";
        }
    }

    public function updateAppointment($appointmentID, $appointmentTitle, $appointmentDescription, $appointmentStartDate, $appointmentDueDate){
        $DAObj = new DAO();
        $updatedAppointment = $DAObj->update('appointment', 
                                            [
                                                $appointmentID,
                                                $appointmentTitle,
                                                $appointmentDescription,
                                                $appointmentStartDate,
                                                $appointmentDueDate
                                            ],
                                            "Appointment_ID = '$appointmentID'");

        if ($updatedAppointment){
            echo "Compromisso atualizado com sucesso!";
        }else{
            echo "Erro, compromisso não atualizado";
        }


    }


}


?>