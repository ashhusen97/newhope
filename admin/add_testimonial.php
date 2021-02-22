<?php include('header.inc.php');

if (isset($_POST['submit'])) {


    $title =  $_POST['title'];
    $description =  $_POST['editor1'];
    $image = $_FILES["testimonial-image"]["name"];
    $target_dir = "../assets/img/Gallery/testimonials/";
    $target_file = $target_dir . basename($_FILES["testimonial-image"]["name"]);
    $date = date('yy-m-d');
    $sql = "INSERT INTO testimonial (title, description,image,upload_date) VALUES ('$title','$description','$image','$date')";
    if (mysqli_query($con, $sql)) {
    } else {
        echo mysqli_error($con);
    }
    if (move_uploaded_file($_FILES["testimonial-image"]["tmp_name"], $target_file)) {
        echo '<script>window.location.href="testimonials.php"</script>';
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

                    <div class="card-header card-header-warning">
                        <h4 class="card-title ">Add Testimonial</h4>

                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label for="title">Testimonial</label>


                                <textarea name="editor1"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="title">Image</label>



                            </div>
                            <input type="file" name="testimonial-image" id="" class="form-control">
                            <button class="btn btn-primary" name="submit" type="submit">Submit</button>


                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include('footer.inc.php') ?>