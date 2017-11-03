<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("Location: index.php");
}
    include '../../database.php';
    $conn = getDatabaseConnection();

function getUserInfo() {
    
    global $conn;
      
    $sql = "SELECT * FROM User where " .$_GET['userId'] ." = id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($record);
    return $record;
}

function departmentList(){
      
        global $conn;
        
        $sql = "SELECT * FROM Departments ORDER BY name";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($records);
        return $records;
    }

 if (isset($_GET['userId'])) {
     
    $userInfo = getUserInfo(); 
     
     
 }

 if (isset($_GET['updateUser'])) { //checks whether admin has submitted form.
     
     //echo "Form has been submitted!";
     
     $sql = "UPDATE User
             SET firstName = :fName,
                 lastName  = :lName,
                 phone = :phone,
                 role = :role,
                 deptId = :dept
             WHERE id = :id";
     $np = array();
     
     $np[':fName'] = $_GET['firstName'];
     $np[':lName'] = $_GET['lastName'];
     $np['phone'] = $_GET['phone'];
     $np['role'] = $_GET['role'];
     $np[':id'] = $_GET['userId'];
     $np[':dept'] = $_GET['departmentId'];
     
     $stmt = $conn->prepare($sql);
     $stmt->execute($np);
     
     echo "Record has been updated!";
     
 }

?>


<!DOCTYPE html>
<html>
    <head>
        <title> Update User </title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>

        <h1> Update User </h1>
        
         <h2> Tech Checkout System: Updating User's Info </h2>
    
            <form method="GET">
                <input type="hidden" name="userId" value="<?=$userInfo['id']?>" />
                First Name:<input type="text" name="firstName" value= "<?=$userInfo['firstName']?>"/>
                <br />
                Last Name:<input type="text" name="lastName" value= "<?=$userInfo['lastName']?>"/>
                <br/>
                Email: <input type= "email" name ="email" value= "<?=$userInfo['email']?>"/>
                <br/>
                Phone Number: <input type ="text" name= "phone" value= "<?=$userInfo['phone']?>"/>
                <br />
               Role: 
               <select name="role">
                    <option value=""> - Select One - </option>
                    <option value="staff"  <?=(strtolower($userInfo['role'])==strtolower('Staff'))?" selected":"" ?>  >Staff</option>
                    <option value="student" <?=(strtolower($userInfo['role'])==strtolower('Student'))?" selected":"" ?>  >Student</option>
                    <option value="faculty" <?=(strtolower($userInfo['role'])==strtolower('Faculty'))?" selected":"" ?>>Faculty</option>
                </select>
                <br />
                Department: 
                <select name="departmentId">
                    <option value="" > Select One </option>
                    <?php
                    
                    $departments = departmentList();
                    
                    foreach($departments as $department) {
                    
                    $flag = ($department['id'] == $userInfo['deptId'])?" selected":"";
                    
                       echo "<option value='".$department['id']."'" 
                       .$flag
                       .'>' . $department['name']  . "</option>";  
                    }
                    
                    //($department['id'] == $userInfo['deptId'])?" selected":""
                    ?>
                    
                </select>
                <input type="submit" value="Update User" name="updateUser">
            </form>

    </body>
</html>