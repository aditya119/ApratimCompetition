<?php
session_start();
require('connection.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
    $username = $_POST['username'];
    $password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
    $query = "INSERT INTO `user_info` (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    // $count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
//     if ($count == 1){
//         $_SESSION['username'] = $username;
//     }else{
// //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
//         $fmsg = "Invalid Login Credentials.";
//     }
    if($result == TRUE){
        $fmsg = "Valid User Credentials.";
        echo($fmsg);
?>
<<html>
    <<body>
        
    </body>
</html>
<?php
        include 'login.html';
    }
    else{
        $fmsg = "Invalid Login Credentials.";
        echo($fmsg);
        include 'sign-up.html';
    }
}
// //3.1.4 if the user is logged in Greets the user with message
// if (isset($_SESSION['username'])){
//     $username = $_SESSION['username'];
//     $fmsg = "Valid Login Credentials.";
//     include 'landing.php';
// }else{
//     //If the user is not logged in
//     include 'login.php';
// }?>