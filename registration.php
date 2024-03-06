<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
     <link rel="stylesheet" href="style.css">
   
 
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
         li{
           display: block;
  font-weight: 500;
  margin-bottom: 5px;
         }
     </style>
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="registration.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" id="fullname" name="fullname" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" id="email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="number" id="mobileno" name="mobileno" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" id="pd" name="pd" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" id="cpd" name="cpd" placeholder="Confirm your password" required>
          </div>
        </div>

          <div class="user-details">
              <li>Gender</li>
                <input type="radio" id="gender" name="gender" value="F">
  <label for="gender">Female</label><br>
 <input type="radio" id="gender" name="gender" value="M">
  <label for="gender">Male</label>
          </div>
           
           <div class="user-details">
     <li>Married status</li>
<input type="checkbox" id="single" name="single" value="Y">
<label for="single"> Single</label><br>
<input type="checkbox" id="married" name="married" value="Y">
<label for="married"> Married</label><br>

        </div>
        <div class="button">
          <input type="submit" value="Submit">
        </div>
           <div class="button">
               <input  type="submit" onclick="document.location='login.php'" value="Login">
        </div>
      </form>
    </div>
  </div>

    <?php
   
 
   $fullname=$username=$email=$mobileno=$pd=$cpd="";
     $gender="F";
    $single="Y";
   
   
    $fullname=pg_escape_string(isset($_POST['fullname'])) ? $_POST['fullname'] : "";
    $username = pg_escape_string(isset($_POST['username']))? $_POST['username'] : "";
$email = pg_escape_string(isset($_POST['email'])) ? $_POST['email'] : "";



$mobileno = (int)isset($_POST['mobileno']);

$pd = pg_escape_string(isset($_POST['pd'])) ? $_POST['pd'] : "";
$cpd = pg_escape_string(isset($_POST['cpd'])) ? $_POST['cpd'] : "";
$gender = pg_escape_string(isset($_POST['gender'])) ? $_POST['gender'] : "";
$single = pg_escape_string(isset($_POST['single'])) ? "Y" : "N";
$married = pg_escape_string(isset($_POST['married'])) ? "Y" : "N";

    $db = pg_connect("host=localhost dbname=Demo user=postgres password=techno");

if(!$db) {
    die("Connection failed: " . pg_last_error());
}

$query = "INSERT INTO mst_register(fullname, username, email,mobileno,pd,cpd,gender,single,married)"
        . " VALUES ('$fullname','$username','$email','$mobileno', '$pd','$cpd','$gender','$single','$married')";

$result = pg_query($db, $query );
 


if ($result) {
    echo "Registration successful!";
} else {
    echo "Error: " . pg_last_error($db);
}

pg_close($db);

?>
 
     
</body>
</html>

