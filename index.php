<?php
    session_start();
    include("inc/db.php");
    if(isset($_POST['save'])){
        $_SESSION['name'] = $_POST['name'];

        $di = $_POST['countries'];
        $q = "SELECT name FROM countries WHERE id = $di";
        $res = $conn->query($q);
        $row = $res->fetch_assoc();
        $_SESSION['countries'] = $row['name'];

        $di = $_POST['states'];
        $q = "SELECT name FROM states WHERE id = $di";
        $res = $conn->query($q);
        $row = $res->fetch_assoc();
        $_SESSION['states'] = $row['name'];

        $di = $_POST['cities'];
        $q = "SELECT name FROM cities WHERE id = $di";
        $res = $conn->query($q);
        $row = $res->fetch_assoc();
        $_SESSION['cities'] = $row['name'];
        header("location:showdata.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .center{
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            box-shadow: 0 0 9px 1px #777272;
            border-radius:8px;
            padding:20px;
        }
    </style>
</head>
<body>
    <div class="container center col-md-4">
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name" id="name">
            </div>
            <?php
                $q = "SELECT * FROM countries";
                $res = $conn->query($q);
            ?>
            <div class="form-group">
                <label for="sel1">Select Countrie:</label>
                <select class="form-control" id="sel1" name="countries" onchange="takestates(this.value)">
                    <option value="">Choose Countries</option>
                    <?php while($row = $res->fetch_assoc()){ ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="states">Select States:</label>
                <select class="form-control" name="states" id="states" onchange="takecity(this.value)">
                    <option value="">Choose States</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cities">Select Cities:</label>
                <select name="cities" id="cities" class="form-control">
                    <option value="">Choose Cities</option>
                </select>
            </div>
            <p><input type="submit" name="save" class="btn btn-primary btn-block"></p>
        </form>
    </div>
    <script>
        function takestates(country){
            // alert("country");
            $.ajax({
                url:'findstates.php?id='+country,
                type:'GET',
                data:{},
                success:function(resp){
                    // alert(resp);
                    $('#states').html(resp);
                }
            });
        }
        function takecity(states){
            // alert("country");
            $.ajax({
                url:'findcity.php?id='+states,
                type:'GET',
                data:{},
                success:function(resp){
                    // alert(resp);
                    $('#cities').html(resp);
                }
            });
        }
    </script>
</body>
</html>