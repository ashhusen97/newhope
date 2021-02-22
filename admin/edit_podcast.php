<?php include('header.inc.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from podcast where id = $id";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
} else {
    echo '<script>window.location.href="podcast.php"</script>';
}
if (isset($_POST['submit'])) {


    $title =  $_POST['title'];
    $image = $_FILES["podcast-image"]["name"];
    $video = $_FILES["podcast-video"]["name"];
    $target_dir_thumbnail = "../assets/img/Gallery/podcast/thumbnail/";
    $target_dir_video = "../assets/img/Gallery/podcast/video/";
    $target_file_thumbnail = $target_dir_thumbnail . basename($_FILES["podcast-image"]["name"]);
    $target_file_video = $target_dir_video . basename($_FILES["podcast-video"]["name"]);
    $date = date('yy-m-d');

    if ((isset($_FILES['podcast-video']) && $_FILES['podcast-video']['size'] != 0) && (isset($_FILES['podcast-image']) && $_FILES['podcast-image']['size'] != 0)) {
        $vid_img_sql = "select video_link,thumbnail from podcast where id = $id";

        $res_sql = mysqli_query($con, $vid_img_sql);
        $row1 = mysqli_fetch_assoc($res_sql);
        $img = $row1['thumbnail'];
        $vid = $row1['video_link'];
        unlink('../assets/img/Gallery/podcast/thumbnail/' . $img);
        unlink('../assets/img/Gallery/podcast/video/' . $vid);
        $sql = "Update podcast set title = '$title',video_link = '$video',thumbnail = '$image'";
        if (mysqli_query($con, $sql)) {
        } else {
            echo mysqli_error($con);
        }
        if (move_uploaded_file($_FILES["podcast-image"]["tmp_name"], $target_file_thumbnail) && move_uploaded_file($_FILES["podcast-video"]["tmp_name"], $target_file_video)) {
            echo '<script>window.location.href="podcast.php"</script>';
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else if ((isset($_FILES['podcast-video']) && $_FILES['podcast-video']['size'] != 0)) {
        $vid_img_sql = "select video_link from podcast where id = $id";

        $res_sql = mysqli_query($con, $vid_img_sql);
        $row1 = mysqli_fetch_assoc($res_sql);

        $vid = $row1['video_link'];

        unlink('../assets/img/Gallery/podcast/video/' . $vid);
        $sql = "Update podcast set title = '$title',video_link = '$video'";
        if (mysqli_query($con, $sql)) {
        } else {
            echo mysqli_error($con);
        }
        if (move_uploaded_file($_FILES["podcast-video"]["tmp_name"], $target_file_video)) {
            echo '<script>window.location.href="podcast.php"</script>';
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else if ((isset($_FILES['podcast-image']) && $_FILES['podcast-image']['size'] != 0)) {


        $vid_img_sql = "select thumbnail from podcast where id = $id";

        $res_sql = mysqli_query($con, $vid_img_sql);
        $row1 = mysqli_fetch_assoc($res_sql);

        $img = $row1['thumbnail'];

        unlink('../assets/img/Gallery/podcast/thumbnail/' . $img);
        $sql = "Update podcast set title = '$title',thumbnail = '$image'";
        if (mysqli_query($con, $sql)) {
        } else {
            echo mysqli_error($con);
        }
        if (move_uploaded_file($_FILES["podcast-image"]["tmp_name"], $target_file_thumbnail)) {
            echo '<script>window.location.href="podcast.php"</script>';
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {


        $sql = "Update podcast set title = '$title'";

        if (mysqli_query($con, $sql)) {
            echo '<script>window.location.href="podcast.php"</script>';
        } else {
            echo mysqli_error($con);
        }
    }
}

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header card-header-warning">
                        <h4 class="card-title ">Edit Podcast</h4>

                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" value="<?= $row['title'] ?>">
                            </div>

                            <label for="title">Video</label>
                            <br>
                            <div class="edit_image">
                                <video width="100%" height="100%" controls>
                                    <source src="../assets/img/Gallery/podcast/video/<?= $row['video_link'] ?>"
                                        type="video/mp4">
                                    ]
                                    Your browser does not support the video tag.
                                </video>

                                <div class="edit_overlay">
                                    <button class="btn btn-primary btn-sm change-video" type="button">
                                        Change Video</button>
                                </div>
                            </div>
                            <input type="file" name="podcast-video" id="" class="form-control change-vid-container"
                                accept="video/*">
                            <div class="form-group">

                                <label for="title">Image</label>
                                <br>
                                <div class="edit_image">
                                    <img src="../assets/img/Gallery/podcast/thumbnail/<?= $row['thumbnail'] ?>" alt=""
                                        class="border-sm">
                                    <div class="edit_overlay">
                                        <button class="btn btn-primary btn-sm change-img" type="button">
                                            Change image</button>
                                    </div>
                                </div>
                            </div>

                            <input type="file" name="podcast-image" id="" class="form-control change-img-container"
                                accept="image/*">
                            <button class="btn btn-primary" name="submit" type="submit">Submit</button>


                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include('footer.inc.php') ?>