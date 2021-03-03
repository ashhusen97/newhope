<?php include('header.inc.php');

$sql = "select * from podcast";
$res = mysqli_query($con, $sql);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $img_sql = "select thumbnail,video_link from podcast where id = $id";
    $res_sql = mysqli_query($con, $img_sql);
    $row = mysqli_fetch_assoc($res);
    $img = $row['thumbnail'];
    $vid = $row['video_link'];
    unlink('../assets/img/Gallery/podcast/thumbnail/' . $img);
    unlink('../assets/img/Gallery/podcast/video/' . $vid);
    $sql = "delete from podcast where id = $id";

    if (mysqli_query($con, $sql)) {
        echo '<script>window.location.href="podcast.php"</script>';
    }
}

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title ">Donations</h4>

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
                                        Videos
                                    </th>
                                    <th>
                                        Thumbnails
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
                                            <video width="160" height="100" controls>
                                                <source
                                                    src="../assets/img/Gallery/podcast/video/<?= $row['video_link'] ?>"
                                                    type="video/mp4">
                                                ]
                                                Your browser does not support the video tag.
                                            </video>



                                        </td>
                                        <td>
                                            <img src="../assets/img/Gallery/podcast/thumbnail/<?= $row['thumbnail'] ?>"
                                                alt="" style="width:100px;height:100px">
                                        </td>
                                        <td>
                                            <?= $row['upload_date'] ?>

                                        </td>
                                        <td>
                                            <a href="edit_podcast.php?id=<?= $row['id'] ?>"> <button
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