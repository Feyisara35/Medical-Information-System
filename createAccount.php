<?php
    require_once ('functions.php');

    echo makePageStart('Create New Account', 'design.css');

    echo makeHeader(array("createAccount.php" => "ZT"));

    echo startMain();
?>

<div id = "border">
    <main>
        <div id="pageTittle">
            <h1>Create a New Account</h1>
        </div>
            
            <div id = "accountForm">
                <form  novalidate action="includes/signup.inc.php" method = "post">

                    <label for="firstName">First Name:</label>
                    <input type ="text" name = "ac_firstName" id = "firstName" required pattern="[A-Za-z]+">

                    <br>

                    <label for="lastName">Last Name:</label>
                    <input type ="text" name = "ac_lastName" id = "lastName" required pattern="[A-Za-z]+">

                    <br>

                    <label for="staffID">Staff ID:</label>
                    <input type ="text" name = "ac_staffID" id = "staffID" required pattern="[A-Za-z0-9]+">

                    <br>

                    <label for="department">Department:</label>
                    <input type ="text" name = "ac_department" id = "department" required pattern="[A-Za-z]+">

                    <br>

                    <label for="unit">Unit:</label>
                    <input type ="text" name = "ac_unit" id = "unit" required pattern="[A-Za-z]+">

                    <br>

                    <label for="password_hash">Password:</label>
                    <input type ="password" name = "ac_password" id = "password" minlength="8" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">

                    <br>

                    <label for="password_conf">Confirm Password:</label>
                    <input type ="password" name = "ac_password_conf" id = "password_conf" minlength="8" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                    <br>

                    <button id= "submit" type = "submit" name= "submit">CREATE</button>
                    <span id = "error">
                    <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "emptyinput"){
                                echo "<p>Fill in all fields!</p>";
                            }
                            else if($_GET["error"] == "staffid"){
                                echo "<p>Invalid Username or Password Format!</p>";
                            }
                            else if($_GET["error"] == "passwordmatch"){
                                echo "<p>Password Don't match!</p>";
                            }
                            else if($_GET["error"] == "staffIDtaken"){
                                echo "<p>Staff ID is unavailable</p>";
                            }
                            else if($_GET["error"] == "stmtfailed"){
                                echo "<p>Something went wrong! Try again!</p>";
                            }
                            else if($_GET["error"] == "useroremailtaken"){
                                echo "<p>Staff ID already exists!</p>";
                            }
                            else if($_GET["error"] == "none"){
                                echo "<p>Account Created Sucessfully!</p>";
                            }
                        }
                    ?>
                    </span>
                </form>

            </div>
    </main>    
    <footer id="newAccount">

            <div >
                <a href="adminLogin.php"><h4>Login</h4></a>
            </div>
             <div id="reportBug">
                <a href=" "><h4> Report a bug?</h4></a>
            </div>  
    </footer> 
</div>

<br>




<?php
    echo endMain();

    echo makePageEnd();
?>

</div>


