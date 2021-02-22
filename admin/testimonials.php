<?php include('header.inc.php');

$sql = "select * from testimonial";
$res = mysqli_query($con, $sql);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $img_sql = "select image from testimonial where id = $id";
    $res_sql = mysqli_query($con, $img_sql);
    $row = mysqli_fetch_assoc($res);
    $img = $row['image'];

    unlink('../assets/img/Gallery/testimonials/' . $img);
    $sql = "delete from testimonial where id = $id";

    if (mysqli_query($con, $sql)) {
        echo '<script>window.location.href="testimonials.php"</script>';
    }
}

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title ">Testimonials</h4>
                        <a href="add_testimonial.php" class="btn">Add testimonial</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Image
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
                                            <?= $row['title'] ?>
                                        </td>
                                        <td>
                                            <?= $row['description'] ?>
                                        </td>

                                        <td>
                                            <img src="../assets/img/Gallery/testimonials/<?= $row['image'] ?>" alt=""
                                                style="width:100px;height:100px">

                                        </td>
                                        <td>
                                            <?= $row['upload_date'] ?>

                                        </td>
                                        <td>
                                            <a href="edit_testimonial.php?id=<?= $row['id'] ?>"> <button
                                                    class="btn btn-warning">Edit</button></a>
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