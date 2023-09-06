<?php
    include("inc/db.php");
    $id = $_GET['id'];
    $q = "SELECT * FROM states WHERE country_id = '$id'";
    $res = $conn->query($q);
    while($row = $res->fetch_assoc()){
        ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
        <?php
    }
?>
