<?php include('header.inc.php');

if (isset($_POST['submit'])) {


    $title =  $_POST['title'];
    $description =  $_POST['editor1'];
    $image = $_FILES["blog-image"]["name"];
    $size = $_FILES['blog-image']['size'];
    $target_dir = "../images/project/";
    $target_file = $target_dir . basename($_FILES["blog-image"]["name"]);
    $date = date('yy-m-d');

    if ($size > 0) {

        $sql = "INSERT INTO blog (title, description,image,upload_date) VALUES ('$title','$description','$image','$date')";

        move_uploaded_file($_FILES["blog-image"]["tmp_name"], $target_file);
    } else {
        $sql = "INSERT INTO blog (title, description,upload_date) VALUES ('$title','$description','$date')";
    }
    if (mysqli_query($con, $sql)) {
        $_SESSION['status'] = "Project Successfully added";

        $_SESSION['status_code'] = "success";
        // echo "<script>window.location.href = 'add_blog.php' </script>";
    } else {
        echo mysqli_error($con);
    }
}

?>

<div class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header card-header-success">
                        <h4 class="card-title ">Add Project</h4>

                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label for="title">Blog</label>


                                <textarea name="editor1"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="title">Image</label>



                            </div>
                            <input type="file" name="blog-image" id="" class="form-control">
                            <button class="btn btn-primary" name="submit" type="submit">Submit</button>


                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include('footer.inc.php') ?>