<?php
include "conn.php";

// 1. TRAITEMENT DE LA MISE À JOUR (S'exécute quand on clique sur le bouton bleu)
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $dob = $_POST['dob'];

    $sql = "UPDATE employee SET name='$name', email='$email', address='$address', salary='$salary', dob='$dob' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Redirection JavaScript pour éviter l'erreur "Headers already sent"
        echo "<script>window.location.href='index.php';</script>";
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// 2. RÉCUPÉRATION DES DONNÉES ACTUELLES (Pour remplir le formulaire)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM employee WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
} else {
    echo "<script>window.location.href='index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Employee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Update Employee</h2>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        
        <div class="row">
            <div class="col-md-6 form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="col-md-6 form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <label>Salary</label>
                <input type="text" name="salary" class="form-control" value="<?php echo $row['salary']; ?>">
            </div>
            <div class="col-md-6 form-group">
                <label>Dob</label>
                <input type="date" name="dob" class="form-control" value="<?php echo $row['dob']; ?>">
            </div>
        </div>

        <button type="submit" name="update" class="btn btn-primary">Update Employee</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>