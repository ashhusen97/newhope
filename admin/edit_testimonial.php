<?php include('header.inc.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from testimonial where id = $id";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
} else {
    echo '<script>window.location.href="testimonials.php"</script>';
}

if (isset($_POST['submit'])) {


    $title =  $_POST['title'];
    $description =  $_POST['editor1'];
    $image = $_FILES["testimonial-image"]["name"];
    $target_dir = "../assets/img/Gallery/testimonials/";
    $target_file = $target_dir . basename($_FILES["testimonial-image"]["name"]);
    $date = date('yy-m-d');

    if (isset($_FILES['testimonial-image']) && $_FILES['testimonial-image']['size'] != 0) {

        $img_sql = "select image from testimonial where id = $id";

        $res_sql = mysqli_query($con, $img_sql);
        $row1 = mysqli_fetch_assoc($res_sql);
        $img = $row1['image'];

        unlink('../assets/img/Gallery/testimonials/' . $img);
        $sql = "Update testimonial set title = '$title',description = '$description', image = '$image'";
        if (mysqli_query($con, $sql)) {
        } else {
            echo mysqli_error($con);
        }
        if (move_uploaded_file($_FILES["testimonial-image"]["tmp_name"], $target_file)) {
            echo '<script>window.location.href="testimonials.php"</script>';
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        $sql = "Update testimonial set title = '$title',description = '$description'";
        if (mysqli_query($con, $sql)) {
            echo '<script>window.location.href="testimonials.php"</script>';
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
                        <h4 class="card-title ">Edit Testimonial</h4>

                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" value="<?= $row['title'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="title">Testimonials</label>


                                <textarea name="editor1"><?= $row['description'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="title">Image</label>
                                <div class="edit_image">
                                    <img src="../assets/img/Gallery/testimonials/<?= $row['image'] ?>" alt=""
                                        class="border-sm">
                                    <div class="edit_overlay">
                                        <button class="btn btn-primary btn-sm change-img" type="button">
                                            Change image</button>
                                    </div>
                                </div>


                            </div>

                            <input type="file" name="testimonial-image" id="" class="form-control change-img-container">
                            <button class="btn btn-primary" name="submit" type="submit">Submit</button>


                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include('footer.inc.php') ?>