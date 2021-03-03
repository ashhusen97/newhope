<?php include('includes/header.php');
$sql = "select * from volunteer where status = 1";
$res = mysqli_query($con, $sql);
if (isset($_POST['submit'])) {

    $email =  $_POST['email'];
    $name =  $_POST['name'];
    $phone =  $_POST['phone'];
    $fb_url =  $_POST['fb-url'];
    $insta_url =  $_POST['fb-url'];
    $twitter_url =  $_POST['twitter-url'];
    $image = $_FILES["profile-pic"]["name"];
    $size = $_FILES['profile-pic']['size'];
    $target_dir = "images/volunteer/";
    $target_file = $target_dir . basename($_FILES["profile-pic"]["name"]);
    $date = date('yy-m-d');

    if ($size > 0) {

        $sql = "INSERT INTO volunteer (email, name,phone,fb,insta,twitter,image,status,upload_date) VALUES ('$email','$name','$phone','$fb_url','$insta_url','$twitter_url','$image',0,'$date')";

        move_uploaded_file($_FILES["profile-pic"]["tmp_name"], $target_file);
    } else {
        $sql = "INSERT INTO volunteer (email, name,phone,fb,insta,twitter,status,upload_date) VALUES ('$email','$name','$phone','$fb_url','$insta_url','$twitter_url',0,'$date')";
    }
    if (mysqli_query($con, $sql)) {
        $_SESSION['status'] = "Request Successfully submitted";

        $_SESSION['status_code'] = "success";
        // echo "<script>window.location.href = 'add_blog.php' </script>";
    } else {
        echo mysqli_error($con);
    }
}
?>


<div class="container">
    <div class="row ">
        <div class="col-12 ">


            <nav aria-label="breadcrumb text-white" class="ml-lg-150 mt-20 pl-50 pt-20"
                style="background-color: #0071a9;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" style="color: white;">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: white;font-weight:800; ">
                        Volunteer</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section class="contact-section section_padding">
    <div class="container">
        <div class="row mt-100">

            <!-- left side -->

            <div class="col-lg-8">


                <h1>Our Volunteers</h1>
                <div class="row" id="volunteer_row">

                    <?php
                    while ($row = mysqli_fetch_assoc($res)) {

                    ?>

                    <div class="col-lg-4 col-md-6 col-12 mt-20">
                        <div class="volunteer-card shadow">

                            <img src="images/volunteer/<?= $row['image'] ?>" alt="" class="img-fluid">
                            <div class="info flex-column">
                                <h6><?= $row['name'] ?></h6>
                                <div class="d-flex justify-content-around align-items-center">

                                    <?php
                                        if ($row['fb'] != '') {
                                        ?>
                                    <a href="<?= $row['fb'] ?>" class="mr-10"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="#fff" class="bi bi-facebook"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                        </svg></a>
                                    <?php
                                        } else if ($row['twitter'] != '') {
                                        ?>
                                    <a href="<?= $row['twitter'] ?>" class="mr-10"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                                            class="bi bi-twitter" viewBox="0 0 16 16">
                                            <path
                                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                        </svg></a>
                                    <?php
                                        } else if ($row['insta '] != '') {
                                        ?>
                                    <a href="https://www.facebook.com/newhoperelief" class="mr-10"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                                            class="bi bi-instagram" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                        </svg></a>
                                    <?php
                                        }
                                        ?>



                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                </div>

            </div>
            <!-- left side end -->

            <!-- right side  -->

            <div class="col-lg-4 pt-10 mb-20 pb-10 pr-30 pl-30 d-flex justify-content-center flex-column"
                style="background-color:#0071a9; color:white;min-height:300px;max-height:100%;">
                <div class="contact-info">

                    <div class="media-body">

                        <h5 class="text-white d-flex flex-row align-items-center"> Become A
                            Volunteer</h5>
                        <p>We regularly publish selected volunteer opportunities. You must first create your profile in
                            the NewhopeRelief to apply. Please submit your request by submitting the form below</p>

                        <hr class="light" />
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="image-container-profile">
                            </div>
                            <input type="email" class="form-control rounded-0 mb-20 border-none" placeholder="Email"
                                name="email" style="background-color: #fff; color:black;" />
                            <input type="text" class="form-control rounded-0 mb-20 border-none" placeholder="Name"
                                name="name" style="background-color: #fff; color:black;" />
                            <input type="phone" class="form-control rounded-0 mb-20 border-none"
                                placeholder="Contact No" name="phone" style="background-color: #fff; color:black;" />




                            <input type="text" class="form-control rounded-0 mb-20 border-none"
                                placeholder="Facebook Profile URL (Optional)" name="fb-url"
                                style="background-color: #fff; color:black;" />
                            <input type="text" class="form-control rounded-0 mb-20 border-none"
                                placeholder="Instagram Profile URL (Optional)" name="insta-url"
                                style="background-color: #fff; color:black;" />
                            <input type="text" class="form-control rounded-0 mb-20 border-none"
                                placeholder="Twitter Profile URL (Optional)" name="twitter-url"
                                style="background-color: #fff; color:black;" />
                            <label for="image">Profile Picture</label>
                            <input type="file" class="form-control rounded-0 mb-20 border-none" placeholder="Contact No"
                                name="profile-pic" style="background-color: #fff; color:black;" />
                            <button class="btn btn-primary px-10 py-10" name="submit">Become a volunteer</button>
                        </form>
                    </div>
                </div>


            </div>
            <!-- right side end -->

        </div>


    </div>



    </div>
</section>


<?php include('./includes/footer.php') ?>