<?php 
include './connection/connection.php';
$con = connection();

if(isset($_POST['btnSubmit'])){
    $deptName = $_POST['deptName'];
    $deptCode = $_POST['deptCode'];

    $selectDepartment = "SELECT * FROM `departments` WHERE department_name = ? OR department_code = ? ";
    $result = $con->prepare($selectDepartment);
    if($result){
        $result->bind_param("ss", $deptName,  $deptCode);
        if($result->execute()){
            $queryResult = $result->get_result();
            if($queryResult->num_rows > 0){
                echo "<script>alert('Department Already Exists!');</script>";
            }else{
                
            $sql = "INSERT INTO `departments` (department_name, department_code) VALUES ('$deptName', '$deptCode')";
            $result = $con->query($sql);

            if($result){
                echo "<script>alert('Department Inserted Successfully!');</script>";
            }else{
                echo "Error: ".$con->error;
            }
        }
    }else{
    echo "Unavailable to execute";
    }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Insertions</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="">Enter Department Name:</label>
            <input type="text" name="deptName" id="">
        </div>
        <div>
            <label for="">Enter Department Code:</label>
            <input type="text" name="deptCode" id="">
        </div>
        <button type="submit" name="btnSubmit">Insert Department</button>
    </form>
</body>
</html>