<?php include('header.inc.php');

$sql = "select * from volunteer";
$res = mysqli_query($con, $sql);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_GET['type'])) {
        $type = $_GET['type'];
        if ($type == 'approve') {
            $update_sql = "Update volunteer set status = 1 where id = $id";
            $ress_sql = mysqli_query($con, $update_sql);
            if ($ress_sql) {
                $_SESSION['status'] = "Volunteer Approved";
                $_SESSION['status_code'] = "success";
            }
        } else {
            $img_sql = "select image from volunteer where id = $id";
            $res_sql = mysqli_query($con, $img_sql);
            $row = mysqli_fetch_assoc($res);
            $img = $row['image'];

            unlink('../images/project/' . $img);
            $sql = "delete from volunteer where id = $id";

            if (mysqli_query($con, $sql)) {

                echo '<script>window.location.href="volunteer.php"</script>';
            }
        }
    }
}

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title ">Volunteer</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Contact No
                                    </th>
                                    <th>
                                        Social Media
                                    </th>
                                    <th>
                                        Upload Date
                                    </th>
                                    <th>
                                        Actions
                                    </th>

                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $row['id'] ?>
                                        </td>

                                        <td>
                                            <?= $row['email'] ?>
                                        </td>
                                        <td>
                                            <?= $row['name'] ?>
                                        </td>
                                        <td>
                                            <?= $row['phone'] ?>
                                        </td>
                                        <td>
                                            <?php
                                                if ($row['fb'] != '') {
                                                ?>
                                            <a href="<?= $row['fb'] ?>"><i class="material-icons">facebook</i></a>
                                            <?php
                                                } else if ($row['insta'] != '') {
                                                ?>
                                            <a href="<?= $row['insta'] ?>"><i class="material-icons">instagram</i></a>
                                            <?php
                                                } else if ($row['twitter'] != '') {
                                                ?>
                                            <a href="<?= $row['twitter'] ?>"><i class="material-icons">twitter</i></a>
                                            <?php
                                                }
                                                ?>

                                        </td>

                                        <td>
                                            <?= $row['upload_date'] ?>

                                        </td>
                                        <td>
                                            <?php if ($row['status'] == 0) {
                                                ?>
                                            <a href="?id=<?= $row['id'] ?>&type=approve"> <button
                                                    class="btn btn-warning">Approve</button></a>
                                            <?php

                                                } ?>
                                            <a href="?id=<?= $row['id'] ?>&type=delete"><button
                                                    class="btn btn-danger"><?php echo $row['status'] == 0 ? "Reject" : 'Delete'; ?></button></a>
                                        </td>

                                    </tr>
                                    <?php
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
<?php include('footer.inc.php') ?>