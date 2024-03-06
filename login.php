<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="title">Login</div>
            <div class="content">
                <form action="login.php" method="post">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Username</span> 
                            <input type="text" id="username" name="username" placeholder="Enter Username" required>
                    </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" id="pd" name="pd" placeholder="Enter Password" required>
                        </div>
                        <div class="button">
                           <input  type="submit" onclick="document.location='registration.php'" value="Login">
                    </div>
                </form>
            </div>
        </div>
            
       <?php
       session_start();
$db= pg_connect("host=localhost dbname=Demo user=postgres password=techno");

if(!$db){
    die("Not connected:".pg_last_error());
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=pg_escape_string($_POST["username"]);
    $pd= pg_escape_string(isset($_POST["pd"]));
    
    $query="Select username,pd from mst_register where username = $1 and pd = $2";
    
  echo $result= pg_query_params($db,$query,array($username,$pd));

    if ($row = pg_fetch_assoc($result)) {
        $_SESSION["username"] = $username;
        header("Location: registration.php"); // Redirect to a welcome page upon successful login
        exit();
    } else {
        $error_message = "Invalid username or password";
    }
}
?>      
    </body>
  </html>

