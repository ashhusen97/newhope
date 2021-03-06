<?php include('header.inc.php');

$sql = "select * from blog";
$res = mysqli_query($con, $sql);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $img_sql = "select image from blog where id = $id";
    $res_sql = mysqli_query($con, $img_sql);
    $row = mysqli_fetch_assoc($res);
    $img = $row['image'];

    unlink('../images/project/' . $img);
    $sql = "delete from blog where id = $id";

    if (mysqli_query($con, $sql)) {
        echo '<script>window.location.href="blog.php"</script>';
    }
}

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title ">Projects</h4>
                        <a href="add_blog.php" class="btn btn-success">Add Projects</a>
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
                                            <?php
                                                if ($row['image'] != '') {
                                                ?>
                                            <img src="../images/project/<?= $row['image'] ?>" alt=""
                                                style="width:100px;height:100px">
                                            <?php
                                                } else {
                                                ?>
                                            <img src="https://complianz.io/wp-content/uploads/2019/03/placeholder-300x202.jpg"
                                                alt="" style="width:100px;height:100px">
                                            <?php
                                                }
                                                ?>
                                        </td>
                                        <td>
                                            <?= $row['upload_date'] ?>

                                        </td>
                                        <td>
                                            <a href="edit_blog.php?id=<?= $row['id'] ?>"> <button
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