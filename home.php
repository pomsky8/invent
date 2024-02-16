<?php include 'dbconfig.php';?>  

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="home.css">
    <script src="https://example.com/fontawesome/v5.15.4/js/all.js" data-auto-replace-svg></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



  </head>
  
  <body>    
       
        <div class="hcontainer"></div>

        <div class="scontainer"></div>



<!--------------------------------------------------------------->
        <div class="ccontainer">
            <div class="button">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD ITEMS</button>            
            </div>

            <table class="ctable table-hover table-bordered table-striped">
            <thead>
                <tr>
                <th scope="col">ID no.</th>
                <th scope="col">Item Name</th>
                <th scope="col">Classification</th>
                <th scope="col">Remarks</th>
                <th scope="col">Actions</th>
                <th scope="col">asdasd</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                
                $query = "SELECT * from `items` ";

                $result = mysqli_query($connection, $query);

                if(!$result){
                    die("query failed".mysqli_error($connection));
                }
                else{
                    while($row = mysqli_fetch_assoc($result)){
                        ?>

                        <tr>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['classification']; ?></td>
                            <td><?php echo $row['remarks']; ?></td>
                            <td><?php echo $row['action']; ?></td>
                            <td><a><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">UPDATE</button></a>
                            <a href="delete.php?id=<?php echo $row['ID']; ?>" class="btn btn-danger">DELETE</a></td>
                        </tr>

                        <?php
                    }
                }
                
                ?>

            
            </tbody>
            </table>


            <!----------------------------- Error Messages ------------------->
            <?php 
                if(isset($_GET['message'])){
                    echo "<h6>".$_GET['message']."</h6>";
                }
                
            ?>
            <?php 
                if(isset($_GET['insert_msg'])){
                    echo "<h6>".$_GET['insert_msg']."</h6>";
                }
                
            ?>


        </div>        
            
        <!-----------------------------------end error message---------------------->


        
        <!--------------------------ADD MODAL----------------------------------------->


    <form action="insert.php" method="POST">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD ITEMS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name"class="form-control" >
                    </div>
                
                
                    <div class="form-group">
                        <label for="name">Classification</label>
                        <input type="text" name="classification"class="form-control">
                    </div>
                
                
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <input type="text" name="remarks"class="form-control">
                    </div>
                
                
                    <div class="form-group">
                        <label for="action">action</label>
                        <input type="text" name="action"class="form-control">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-info" name="add_item" value="ADD ITEM"></input>
            </div>
            </div>
        </div>
        </div>
    </form>
<!----------------------------------END----------------------------->



<!-----------------------------UPDATE MODAL--------------------->



<form action="update.php?ID_new=<?php echo $ID_new; ?>" method="POST">
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModal1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT ITEMS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form>
                    </td><div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name"class="form-control" value="Enter New Item Name">
                    </div>
                
                
                    <div class="form-group">
                        <label for="name">Classification</label>
                        <input type="text" name="classification"class="form-control" value="Enter New Classification">
                    </div>
                
                
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <input type="text" name="remarks"class="form-control" value="Enter New Remarks">
                    </div>
                
                
                    <div class="form-group">
                        <label for="action">action</label>
                        <input type="text" name="action"class="form-control" value="Change Actions">
                    </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-info" name="update_item" value="UPDATE ITEM"></input>
            </div>
            </div>
        </div>
        </div>
    </form>

    <!-----------------------------------end-------------------------->




    <!----------------------------------------footer--------------------------->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>