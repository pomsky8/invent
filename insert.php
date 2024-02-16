<?php
    include 'dbconfig.php';

    if(isset($_POST['add_item'])){

        $name = $_POST['name'];
        $classification = $_POST['classification'];
        $remarks = $_POST['remarks'];
        $action = $_POST['action'];


        if ($name == "" || empty($name)){
            header('location:home.php?message=You Shit Fill IN!');
        }

        else{
            $query = "INSERT INTO `items` (`name` , `classification` , `remarks` , `action`) values ('$name' , '$classification' , '$remarks' , '$action')";

            $result = mysqli_query($connection,$query);

            if(!$result){
                die("Query Failed".mysqli_error());     
            }

            else{
                header('location:home.php?insert_msg=ijasbndliajbndias');
            }

        }

    }




?>