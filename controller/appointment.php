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


}


?>