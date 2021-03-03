<?php include('header.inc.php');

if (isset($_POST['submit'])) {


    $title =  $_POST['title'];
    $image = $_FILES["podcast-image"]["name"];
    $video = $_FILES["podcast-video"]["name"];
    $target_dir_thumbnail = "../assets/img/Gallery/podcast/thumbnail/";
    $target_dir_video = "../assets/img/Gallery/podcast/video/";
    $target_file_thumbnail = $target_dir_thumbnail . basename($_FILES["podcast-image"]["name"]);
    $target_file_video = $target_dir_video . basename($_FILES["podcast-video"]["name"]);
    $date = date('yy-m-d');
    $sql = "INSERT INTO podcast (title, video_link,thumbnail,upload_date) VALUES ('$title','$video','$image','$date')";
    if (mysqli_query($con, $sql)) {
    } else {
        echo mysqli_error($con);
    }
    if (move_uploaded_file($_FILES["podcast-image"]["tmp_name"], $target_file_thumbnail) && move_uploaded_file($_FILES["podcast-video"]["tmp_name"], $target_file_video)) {
        echo '<script>window.location.href="podcast.php"</script>';
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header card-header-success">
                        <h4 class="card-title ">Add Podcast</h4>

                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>

                            <label for="title">Video</label>
                            <input type="file" name="podcast-video" id="" class="form-control" accept="video/*">


                            <label for="title">Image</label>
                            <input type="file" name="podcast-image" id="" class="form-control" accept="image/*">
                            <button class="btn btn-primary" name="submit" type="submit">Submit</button>


                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include('footer.inc.php') ?>