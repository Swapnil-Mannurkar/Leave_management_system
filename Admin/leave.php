<?php
include('top.inc.php');
if (isset($_GET['type']) && $_GET['type'] == 'delete' && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    mysqli_query($con, "delete from leave_applied where LID = '$id'");
    header('location:leave.php');
    die();
}

$res = mysqli_query($con, "select * from leave_applied");
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card" style="margin-left:-15px;">
                    <div class="card-body">
                        <h4 class="box-title" style="font-size:25px;">List of leave applied</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Leave ID</th>
                                        <th>Faculty ID</th>
                                        <th>Faculty name</th>
                                        <th>Type of leave</th>
                                        <th>Leave from</th>
                                        <th>Leave to</th>
                                        <th>Faculty adjusted ID</th>
                                        <th>Faculty adjusted name</th>
                                        <th>Adjusted faculty response</th>
                                        <th>HOD response</th>
                                        <th>Principal response</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($res)) { ?>
                                        <tr>
                                            <td><?php echo $row['LID'] ?></td>
                                            <td><?php echo $row['FID'] ?></td>
                                            <?php
                                            $ffn = mysqli_query($con, "select FName from faculty where FID = '" . $row['FID'] . "'");
                                            $fname = mysqli_fetch_assoc($ffn);
                                            ?>
                                            <td><?php echo $fname['FName'] ?></td>
                                            <td><?php echo $row['Leave_type'] ?></td>
                                            <td><?php echo $row['Leave_from'] ?></td>
                                            <td><?php echo $row['Leave_to'] ?></td>
                                            <td><?php echo $row['FAID'] ?></td>
                                            <td><?php echo $row['FAName'] ?></td>
                                            <td>
                                                <?php
                                                if ($row['Leave_status'] == '1')
                                                    echo "Processing";
                                                if ($row['Leave_status'] == '2')
                                                    echo "Approved";
                                                if ($row['Leave_status'] == '3')
                                                    echo "Rejected";
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row['Leave_status'] == '1') {
                                                    echo "Processing";
                                                } else {
                                                    if ($row['HODLS'] == '1')
                                                        echo "Processing";
                                                    if ($row['HODLS'] == '2')
                                                        echo "Approved";
                                                    if ($row['HODLS'] == '3')
                                                        echo "Rejected";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row['HODLS'] == '1') {
                                                    echo "Processing";
                                                } else {
                                                    if ($row['PLS'] == '1')
                                                        echo "Processing";
                                                    if ($row['PLS'] == '2')
                                                        echo "Approved";
                                                    if ($row['PLS'] == '3')
                                                        echo "Rejected";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="leave.php?id=<?php echo $row['LID'] ?>&type=delete" style="margin-left:20px;">DELETE</a>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.inc.php')
?>