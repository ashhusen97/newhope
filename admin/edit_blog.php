<?php include('header.inc.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from blog where id = $id";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
} else {
    echo '<script>window.location.href="blog.php"</script>';
}

if (isset($_POST['submit'])) {


    $title =  $_POST['title'];
    $description =  $_POST['editor1'];
    $image = $_FILES["blog-image"]["name"];
    $target_dir = "../images/project/";
    $target_file = $target_dir . basename($_FILES["blog-image"]["name"]);
    $date = date('yy-m-d');

    if (isset($_FILES['blog-image']) && $_FILES['blog-image']['size'] != 0) {

        $img_sql = "select image from blog where id = $id";

        $res_sql = mysqli_query($con, $img_sql);
        $row1 = mysqli_fetch_assoc($res_sql);
        $img = $row1['image'];
        if ($img != '') {
            unlink('../images/project/' . $img);
        }
        $sql = "Update blog set title = '$title',description = '$description', image = '$image'  where id = $id";
        move_uploaded_file($_FILES["blog-image"]["tmp_name"], $target_file);
    } else {
        $sql = "Update blog set title = '$title',description = '$description' where id = $id";
    }
    if (mysqli_query($con, $sql)) {
        $_SESSION['status'] = "Project updated successfully";
        $_SESSION['status_code'] = "success";

        $sql = "select * from blog where id = $id";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($res);
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
                        <h4 class="card-title ">Edit Project</h4>

                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" value="<?= $row['title'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="title">Blog</label>


                                <textarea name="editor1"><?= $row['description'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="title">Image</label>
                                <div class="edit_image">
                                    <?php if ($row['image'] != '') {  ?>
                                    <img src="../images/project/<?= $row['image'] ?>" alt="" class="border-sm"
                                        id="img_holder">
                                    <?php } else {
                                    ?>
                                    <img src="https://complianz.io/wp-content/uploads/2019/03/placeholder-300x202.jpg"
                                        alt="" id="img_holder">
                                    <?php
                                    } ?>
                                    <div class="edit_overlay">
                                        <button class="btn btn-primary btn-sm change-img" type="button">
                                            Change image</button>
                                    </div>
                                </div>


                            </div>

                            <input type="file" name="blog-image" id="ImgInp" class="form-control change-img-container">
                            <button class="btn btn-primary" name="submit" type="submit">Submit</button>


                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include('footer.inc.php') ?>