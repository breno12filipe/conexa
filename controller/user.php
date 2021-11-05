<?php
include('../model/daos.php');


class User{    

    // create a user         
    public function createUser($email, $password, $passwordConfirmation){
        $DAObj = new DAO();

        if($password !== $passwordConfirmation){
            echo "As senhas não são iguais";
            die();
        }

        $selectOccurrences = $DAObj->select(['UserEmail'], 'login', "UserEmail = '$email'");
        $selectEmailRtn = isset($selectOccurrences[0]['UserEmail']);


        if($email == "" || $email == null){
            echo "O campo login deve ser preenchido";
            return False;
        }else{
            if($selectEmailRtn){
                echo "Esse usuário já existe";
                return False;
            }else{
                $insertUserRtn = $DAObj->insert('login', ['UserEmail', 'UserPassword'], [$email, md5($password)]);
                if($insertUserRtn){
                    echo "Usuário cadastrado com sucesso!";
                    return True;
                }else{
                    echo "Não foi possível cadastrar esse usuário";
                    return False;
                }

            }
        }
    }

    // return the id and email from the selected user (NOT TESTED)
    public function readUser($email){
        $DAObj = new DAO();
        $selectOccurrences = $DAObj->select(['ID', 'UserEmail'], 'login', "UserEmail = '$email'");
        return $selectOccurrences;
    }

    public function updateUser(){
        // ... 
    }

    public function deleteUser(){
        // ...
    }

    // list all users, returning email and id (NOT TESTED) 
    public function listAllUsers(){
        $DAObj = new DAO();

        $selectOccurrences = $DAObj->select(['ID', 'UserEmail'], 'login');
        return json_encode($selectOccurrences);
    }

    // login user (NOT TESTED)
    public function authenticate($login, $password){
        session_start();
        $DAObj = new DAO();
        $selectOccurrences = $DAObj->select(['UserEmail'], 'login', "UserEmail = '$login' AND UserPassword = md5($password)");
        $resultRow = mysqli_num_rows($selectOccurrences);

        if($resultRow == 1){
            $_SESSION['usuario'] = $usuario;
            return True;
        }else{
            $_SESSION['nao_autenticado'] = true;
            return False;
        }
    }

    public function checkSessionState(){
        if(!$_SESSION['usuario']){
            return False;
        }
    }

    public function logout(){
        session_start();
        session_destroy();
    }

    public function getUserById($userID){
        $DAObj = new DAO();
        $selectOccurrences = $DAObj->select('UserEmail', 'login', "ID='$userID'");
        return json_encode($selectOccurrences);
    }

}


?>