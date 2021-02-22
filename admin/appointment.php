<?php include('header.inc.php');
$sql = "select * from consultation";
$res = mysqli_query($con, $sql);
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "delete from consultation where id = $id";

    if (mysqli_query($con, $sql)) {
        echo '<script>window.location.href="appointment.php"</script>';
    }
}
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title ">Appointment</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Booking Date
                                    </th>
                                    <th>
                                        Booking Type
                                    </th>
                                    <th>
                                        Uploaded Date
                                    </th>
                                    <th>
                                        Action
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
                                            <?= $row['name'] ?>
                                        </td>
                                        <td>
                                            <?= $row['email'] ?>
                                        </td>
                                        <td>
                                            <?= $row['phone'] ?>
                                        </td>
                                        <td>
                                            <?= $row['booking_date'] ?>
                                        </td>
                                        <td>
                                            <?= $row['booking_type'] ?>
                                        </td>
                                        <td>
                                            <?= $row['upload_date'] ?>
                                        </td>
                                        <td>
                                            <a href="?id=<?= $row['id'] ?>"><button
                                                    class="btn btn-danger">Delete</button></a>
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