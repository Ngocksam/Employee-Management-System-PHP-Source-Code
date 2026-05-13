<?php 
session_start(); 
include "db.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    // On récupère et on nettoie les données
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.php?error=UserName is required");
        exit();
    } else if(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        // Protection basique contre l'injection SQL
        $uname = mysqli_real_escape_string($conn, $uname);
        $pass = mysqli_real_escape_string($conn, $pass);

        $sql = "SELECT * FROM logintab WHERE user_name='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['id'] = $row['id'];
                
                // CORRECTION : Redirection relative pour que ça marche sur Kubernetes/Codespaces
                header("Location: /employees/index.php");
                exit();
            } else {
                header("Location: index.php?error=Incorect Username or password");
                exit();
            }
        } else {
            header("Location: index.php?error=Incorect Username or password");
            exit();
        }
    }
    
} else {
    header("Location: index.php");
    exit();
}