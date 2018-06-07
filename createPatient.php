<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style media="screen">
        #footer-credits{
            margin: 10px;
            padding: 5px;
            color: blue;
        }
    </style>

    <title></title>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <br><br>
        <h1>Enter Your Details</h1>

        <div id="messageWindow">

        </div>
        </h3>
        <form method="post" action="processregistration.php">
            <div class="form-group">
                <h3>

                    <?php if (isset($_GET['error'])) {
                        $returnedMsg= $_GET['error'];
                        if (strpos($returnedMsg, 'success')!==false) {
                            echo '<div class="alert alert-success">';
                            echo " Registration Successful";
                            echo "<br>";
                            echo "Patient:Id =";
                            echo $_GET['patient_id'];;

                            echo "</div>";
                        }
                        else if(strpos($returnedMsg, 'alreadyExists')!==false){
                            echo '<div class="alert alert-danger">';
                            echo " Record Already Exists.";
                            echo "</div>";
                        }
                        else if (strpos($returnedMsg, 'notfilled')!==false) {
                            echo '<div class="alert alert-danger">';
                            echo " Registration Failed if problem persists contact admin";
                            echo "</div>";
                        }
                    } ?>

                </h3>
                <label for="formGroupExampleInput">Name</label>
                <input type="text" class="form-control" name="formInputName" id="formInputName" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Age</label>
                <input type="Number" class="form-control" name="formInputAge" id="formInputAge" placeholder="Age" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Email Address</label>
                <input type="email" class="form-control" name="formInputEmail" id="formInputEmail" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Phone number</label>
                <input type="number" class="form-control" name="formInputPhoneNumber" id="formInputPhoneNumber" placeholder="Phone Number" required>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select name="gender" id="gender" >
                    <option>Choose One</option>
                    <option value="M">M</option>
                    <option value="F">F</option>
                </select><br><br>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">Address</label>
                <input type="text" class="form-control" name="formInputAddress" id="formInputAddress" placeholder="Address" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Disease</label>
                <input type="text" class="form-control" name="formInputDisease" id="formInputDisease" placeholder="Disease">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Comment</label>
                <input type="text" class="form-control" name="formInputComment" id="formInputComment" placeholder="Comments Max(50)">
            </div>
            <div class="form-group">
            <label>Referred Doctor</label>
            <select name="formInputReferredDoctor" id="formInputReferredDoctor" >
                <option>Choose One</option>
                <option value="1">Doc A</option>
                <option value="2">Doc B</option>
                <option value="3">Doc C</option>
                <option value="4">Doc D</option>
            </select><br><br>
            </div>
            <div class="form-group">
                <label>Response</label>
                <select name="formInputResponse" id="formInputResponse" >
                    <option>Choose One</option>
                    <option value="1">Satisfied</option>
                    <option value="2">Inadequate Info</option>
                    <option value="2">Lack of Empathy</option>
                </select><br><br>

            </div>

            <button type="submit" class="btn btn-success" >Submit</button>
            <button type="button" class="btn btn-danger" onclick="GoBack()">Go Back</button>
        </form>
    </div>

</div>
<script type="text/javascript">
    function GoBack(){
        window.location="index.php";
    }
</script>

</body>
</html>
