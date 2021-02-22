<?php include('header.inc.php');
$sql = "select * from contact";
$res = mysqli_query($con, $sql);
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "delete from contact where id = $id";

    if (mysqli_query($con, $sql)) {
        echo '<script>window.location.href="contact.php"</script>';
    }
}
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title ">Contact</h4>

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
                                        Subject
                                    </th>
                                    <th>
                                        Message
                                    </th>
                                    <th>
                                        Upload Date
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
                                            <?= $row['subject'] ?>
                                        </td>
                                        <td>
                                            <?= $row['message'] ?>
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