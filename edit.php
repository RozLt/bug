<?php
    //include connection file 
    include_once("dbh.login.php");
    
    //define index of column
    $columns = array(
        0 =>'mem_id', 
        1 => 'name',
        2 => 'last',
        3 => 'username',
        4 => 'email'

    );
    $error = false;
    $colVal = '';
    $colIndex = $rowId = 0;
    
    $msg = array('status' => !$error, 'msg' => 'Failed! updation in mysql');

    if(isset($_POST)){
    if(isset($_POST['val']) && !empty($_POST['val']) && !$error) {
      $colVal = $_POST['val'];
      $error = false;
      
    } else {
      $error = true;
    }
    if(isset($_POST['index']) && $_POST['index'] >= 0 &&  !$error) {
      $colIndex = $_POST['index'];
      $error = false;
    } else {
      $error = true;
    }
    if(isset($_POST['mem_id']) && $_POST['mem_id'] > 0 && !$error) {
      $rowId = $_POST['mem_id'];
      $error = false;
    } else {
      $error = true;
    }
    
    if(!$error) {
            $sql = "UPDATE user SET ".$columns[$colIndex]." = '".$colVal."' WHERE mem_id='".$rowId."'";
            $status = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
            $msg = array('error' => $error, 'msg' => 'Success! updation in mysql');
    } else {
        $msg = array('error' => $error, 'msg' => 'Failed! updation in mysql');
    }
    }
    // send data as json format
    echo json_encode($msg);
    
?>