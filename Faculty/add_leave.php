<?php
include('top.inc.php');
$fid = " ";
$did = " ";
$lt = " ";
$lfdate = " ";
$ltdate =  " ";
$ldesc = " ";
$fa = " ";
$faname = " ";

if (isset($_POST['submit'])) {
    $fid = $_SESSION['USER_ID'];
    $did = $_SESSION['DID'];
    $lt = mysqli_real_escape_string($con, $_POST['lt']);
    $lfdate = mysqli_real_escape_string($con, $_POST['lfdate']);
    $ltdate = mysqli_real_escape_string($con, $_POST['ltdate']);
    $count = ($ltdate[-2] . $ltdate[-1]) - ($lfdate[-2] . $lfdate[-1]) + 1;
    $fa = mysqli_real_escape_string($con, $_POST['fa']);
    $res = mysqli_query($con, "select FName from faculty where FID = '" . $fa . "'");
    $row = mysqli_fetch_assoc($res);
    $faname = $row['FName'];
    $ldesc = mysqli_real_escape_string($con, $_POST['ldesc']);
    mysqli_query($con, "insert into leave_applied values (' ','$fid','$did','$lt','$lfdate','$ltdate','$count','$fa','$faname','$ldesc',1,1,1);");
    $max = mysqli_query($con, "select MAX(LID) as LID from Leave_applied");
    $maxv = mysqli_fetch_assoc($max);
    $_SESSION['LID'] = $maxv['LID'];
    header('location:PHPMailer.php');
    die();
}

?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Add new leave</strong></div>
                    <div class="card-body card-block">
                        <?php print_r($fid); ?>
                        <form method="post">
                            <div class="form-group">
                                <label class="form-control-label" style="margin-top: 10px;">Leave type</label>
                                <select class="form-control" name="lt" required>
                                    <option value=" " style="color: red;">Select type of leave</option>
                                    <?php
                                    $res = mysqli_query($con, "select * from leave_type;");
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        echo "<option value =" . $row['Leave_type'] . ">" . $row['Leave_type'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <label class="form-control-label" style="margin-top: 10px;">Leave from</label>
                                <input type="date" name="lfdate" class="form-control" required>
                                <label class="form-control-label" style="margin-top: 10px;">Leave to</label>
                                <input type="date" name="ltdate" class="form-control" required>
                                <label class="form-control-label" style="margin-top: 10px;">Adjust faculty</label>
                                <select class="form-control" name="fa" required>
                                    <option value=" " style="color: red;">Select faculty</option>
                                    <?php
                                    $res = mysqli_query($con, "select * from faculty where Role <> 'Admin' and FID <>'" . $_SESSION['USER_ID'] . "' and DID ='" . $_SESSION['DID'] . "';");
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        echo "<option value =" . $row['FID'] . ">" . $row['FID'] . " " . $row['FName'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <label class="form-control-label" style="margin-top: 10px;">Leave description</label>
                                <input type="text" name="ldesc" class="form-control">
                            </div>
                            <div style="margin: 0px 500px">
                                <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.inc.php');
?>