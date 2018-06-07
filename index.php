<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <title>CRM</title>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <form>
            <label>Search</label>
            <input type="text" name="searchInput" value="searchInput">
            <button type="button" class="btn btn-success btn-lg" onclick="CreateRedirect()">Create Record</button>
        </form>

    </div>

</div>
<script type="text/javascript">

    function CreateRedirect() {
        window.location="createPatient.php";
    }


</script>
</body>
</html>
