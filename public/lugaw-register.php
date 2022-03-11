<?php
session_start();

require_once('../config/database.php');
include_once('../src/utils/generate-token.php');
include_once('../src/utils/sanitize-input.php');
include_once('../src/utils/auto-copyright.php');

if (empty($_SESSION['token']) && !isset($_SESSION['token'])) {
    $_SESSION['token'] = generate_token();
}

$database = new Database();
$db = $database->get_connection();

$stmt = $db->prepare('SELECT Description FROM userroles WHERE id != 1');
$stmt->execute();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if( isset($_POST['btn-register-lugaw']) ){

        $errors = [];
        $firstname = sanitize_input($_POST['fname']);
        $middlename = sanitize_input($_POST['mname']);
        $lastname = sanitize_input($_POST['lname']);
        $mobile_number = sanitize_input($_POST['mobile']);
        $email = sanitize_input($_POST['email']);
        $password = sanitize_input($_POST['password']);
        $position = sanitize_input($_POST['position']);
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            $stmt = $db->prepare('SELECT EmailAddress, Password FROM voter_users WHERE EmailAddress = :email');
            $stmt -> bindParam(':email', $email);
            $stmt->execute();

            if($stmt->rowCount() === 0){
                try{
                    $created_date = date('Y-m-d H:i:s');
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    $stmt = $db->prepare("INSERT INTO fund_users (Firstname, Middlename, Lastname, Contact,EmailAddress,Password,CreatedDate) VALUES (:firstname, :middlename, :lastname, :contact, :email_address, :password, :created_date)");
                    
                    $stmt->bindParam(':firstname', $firstname);
                    $stmt->bindParam(':middlename', $middlename);
                    $stmt->bindParam(':lastname', $lastname);
                    $stmt->bindParam(':contact', $mobile_number);
                    $stmt->bindParam(':email_address', $email);
                    $stmt->bindParam(':password', $hashed_password);
                    $stmt->bindParam(':created_date', $created_date);
    
                    $stmt->execute();
                    // $arr = $stmt->errorInfo();
                    // print_r($arr);
                    $id = $db->lastInsertId();

                }catch(Exception $e){
                    //echo $e->getMessage();
                }
                
            } else {

            }

        }

    }
}

?>
<!doctype html>
<html lang="en">
    <head>

    <!-- Meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/form-register.css">
    <link rel="stylesheet" href="../assets/css/main.css">

    <title>NCR Political Unit</title>
    </head>

    <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-1 fixed-top">
            <div class="container-fluid">
                <div href="#" class="navbar-brand">
                    <img src="../assets/images/index/POLITICAL UNIT3 NEW.png" alt="Team Leni" height="45px" width="250px">
                </div>

                <button class="navbar-toggler btn bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto" >
                        <li class="nav-item" style="padding: 5px;">
                            <a href="../index.php" class="nav-link btn mt-auto text-white" style="background: rgb(254,24,163);"><b>HOME</b></a>
                        </li>
                        <li class="nav-item" style="padding: 5px;">
                            <a href="about-us.php" class="nav-link btn mt-auto text-white" style="background: rgb(254,24,163);"><b>ABOUT US</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- bg -->
        <section class="" style="text-align:center; margin-top: -4px;">
            <img src="../assets/images/index/LeniBackground.png" alt="Team Leni BG" class="img-fluid">
        </section>

        <!-- Form fields -->
        <div class="pb-5"> 
            <section class="p-5">
                <div class="container">
                    <div class="row" style="justify-content: center;">
                        <div class="content">
                            <div class="flex-div">
                                <div class="name-content">
                                    <h1 class="logo">WELCOME KAKAMPINK!</h1>
                                    <p class="subhead"></p>
                                </div>

                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>"/>
                                    <h5 class="subheaderform" style="margin-top: 20px;">Lugaw Registration</h5>
                                    <input type="text" name="fname" placeholder="First Name"  />
                                    <input type="text" name="mname" placeholder="Middle Name" />
                                    <input type="text" name="lname" placeholder="Last Name"  />
                                    <input type="text" name="mobile" maxlength="11" placeholder="Mobile Number" />
                                    <input type="text" name="email" placeholder="Email"  />
                                    <input type="password" name="password" placeholder="Password" >
                                    <select name="position" class="form-select mb-4" aria-label="Position">
                                    <?php while($user_role = $stmt->fetch(PDO::FETCH_ASSOC) ){ ?>
                                        <option value="<?php echo $user_role['Description']; ?>"> <?php echo str_replace('_', ' ', $user_role['Description']); ?> </option>
                                    <?php } ?>
                                    </select> 
                                    <input type="submit" name="btn-register-lugaw" class="register" value="Register">
                                    <a href="lugaw-login.php" class="a">Already have an account?</a>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <?php require("footer.php") ?>

        <!-- Bootstrap Bundle with Popper -->
        <script src="../assets/js/bootstrap513.bundle.min.js"></script>
    </body>
</html>