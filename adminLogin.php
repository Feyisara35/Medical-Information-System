<?php
    require_once ('functions.php');

    echo makePageStart('Login Page', 'design.css');

    echo makeHeader(array("adminLogin.php" => "ZT"));

    echo startMain();
?>

<body>
    <div id = "border">
        <div>
        <main>
            <div id="pageTittle">
                <h1> ADMIN LOGIN</h1>
            </div>

            <div id="loginForm">
                <form action="includes/login.inc.php" method = "post">

                    <label for="staffID">StaffID:</label>
                    <input type="text" id="ca_staffID" name="ca_staffID" placeholder="Enter StaffID">

                    
                    <br>
                    <label for="password_hash">Password:</label> 
                   
                    <input type="password" name="ca_password" id= "ca_password" placeholder="Enter Password">
                    
                     <br>
                     <button id= "submit" type = "submit" name= "submit">LOGIN</button>

                    <span id = "error">
                            <?php
                                if(isset($_GET["error"])){
                                    if($_GET["error"] == "emptyinput"){
                                        echo "<p>Fields cannot be empty!</p>";
                                    }
                                    else if($_GET["error"] == "passwordfound"){
                                        echo "<p>Invalid staff ID or Password</p>";
                                    }
                                    else if($_GET["error"] == "usernotfound"){
                                        echo "<p>User does not exist!</p>";
                                    }
                                    else if($_GET["error"] == "wrongpassword"){
                                        echo "<p>Inavlid username or Password!</p>";
                                    }
                                    else if($_GET["error"] == "wrongpassword"){
                                        echo "<p>Inavlid username or Password!</p>";
                                    }
                                }
                            ?>
                    </span>
                    
                </form>
            </div>
            <br>
        </main>
        </div>
        

        <br>

        <footer id="newAccount">
             <div >
                <a href="createAccount.php"><h4>Create an Account?</h4></a>
            </div>


             <div id="reportBug">
                <a href=" "><h4> Report a bug?</h4></a>
            </div>  
        </footer>

        <?php
            echo endMain();
        ?>
    </div>
</body>



