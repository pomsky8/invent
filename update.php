<?php include 'dbconfig.php'; ?>

<?php 

if(isset($_GET['ID'])){
    $ID = $_GET['ID'];

    $query = "SELECT * from `items` where `ID` = '$ID' ";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die("query failed".mysqli_error($connection));
            }
    else{
        $row = mysqli_fetch_assoc($result);
                       
}
}
?>



<!---------------------------update button function------------------------>

<?php 

if(isset($_POST["update_item"])){

    if (isset($GET['ID_new'])){
        $ID_new = $GET['ID_new'];
    }

    $name = $_POST['name'];
    $classification = $_POST['classification'];
    $remarks = $_POST['remarks'];
    $action = $_POST['action'];

    $query = "UPDATE `items` set `name` = '$name', `classification` = '$classification', `remarks` = '$remarks', `action` = '$action' where `ID` = '$IDnew'";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        header('location:home.php?update_msg=You success Shit');
    }

}

?>