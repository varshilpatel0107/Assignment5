<!DOCTYPE html>
<html>
<head>
    <title>SIGN UP FORM</title>
</head>
<style>
    body{
            background-image: url(bg.jpg);
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            font-family: cursive;
    }

    .wrap{
            max-width: 380px;
            border-radius: 20px;
            margin:auto;
            background:rgba(0,0,0,0.8);
            box-sizing: border-box;
            padding: 40px;
            color: #fff;
            margin-top: 100px;

    }

    h2{
            text-align: center;
    }

    input[type=text],select[id=country]{
            width: 100%;
            box-sizing: border-box;
            padding: 12px 5px;
            background:rgba(0,0,0,0.10);
            outline: none;
            border:none;
            border-bottom: 1px dotted #fff;
            color:#fff;
            border-radius: 5px;
            margin: 5px;
            font-weight: bold;
    }

    input[type=submit]{
            width: 50%;
            box-sizing: border-box;
            padding: 10px 0;
            margin-top: 30px;
            outline: none;
            border:none;
            background:#60adde;
            opacity: 0.7;
            border-radius: 20px;
            font-size: 20px;
            color: #fff;
    }
    input[type=submit]:hover{
            background:#003366;
            opacity: 0.7;
    }
</style>
<body>
<div class="wrap">
    <h2>SIGN UP</h2>
    <form method="post">
        <input type="text" name="StudentName" placeholder="Student Name" required="">
        <input type="text" name="FacultyName" placeholder="Faculty Name" required="">
        <input type="text" name="Professional" placeholder="Professional" required="">
        <input type="text" name="CompanyName" placeholder="Company Name" required=""><br>
        <select id="country" name="CountryName" required>
            <option value="country">Select Country</option>
            <option value="Australia">Australia</option>
            <option value="Bhutan">Bhutan</option>
            <option value="Canada">Canada</option>
            <option value="Denmark">Denmark</option>
            <option value="Egypt">Egypt</option>
            <option value="France">France</option>
            <option value="India">India</option>
        </select>
        <input type="text" name="Number" placeholder="Number" required=""><br>
        <input type="submit" value="submit">
    </form>
</div>
</body>
</html>

<?php

    $StudentName = $_POST['StudentName'];
    $FacultyName = $_POST['FacultyName'];
    $Professional = $_POST['Professional'];
    $CompanyName = $_POST['CompanyName'];
    $CountryName = $_POST['CountryName'];
    $Number = $_POST['Number'];

   
   //database connection
   $conn = new mysqli('localhost' , 'root' ,'' ,'user');
   if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(StudentName,FacultyName,Professional,CompanyName,CountryName,Number)
        values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi",$StudentName, $FacultyName, $Professional, $CompanyName, $CountryName, $Number);
        $stmt->execute();
        echo "Registration Successfully...";
        $stmt->close();
        $conn->close();
    }    
?>