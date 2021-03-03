<?php include('includes/header.php');
include('./includes/connection.php');

use PHPMailer\PHPMailer\PHPMailer;

include_once "PHPMailer/PHPMailer.php";
include_once "PHPMailer/SMTP.php";
include_once "PHPMailer/Exception.php";
if (isset($_POST['c_submit'])) {
    $c_name = $_POST['name'];
    $c_email = $_POST['email'];
    $c_subject = $_POST['subject'];
    $c_enquiry = $_POST['message'];
    $date = date('yy-m-d');


    $sql = "INSERT INTO contact (name,email,subject,message,upload_date) VALUES
    ('$c_name','$c_email','$c_subject','$c_enquiry','$date')";

    $res = mysqli_query($con, $sql);
    if ($res) {

        $_SESSION['status'] = "Request submitted Successfully! We ll get back to you shortly";
        $_SESSION['status_code'] = "success";
    }
}
?>


<!-- <header>


    <div class="container">
        <div class="row heading-section">
            <div class="col-12 col-lg-6 mr-auto ml-auto text-center">

                <h1>
                    <strong><span class="text-uppercase">Contact</span></strong>
                </h1>


            </div>
        </div>
    </div>



</header> -->
<div class="container">
    <div class="row ">
        <div class="col-12 ">


            <nav aria-label="breadcrumb text-white" class="ml-lg-150 mt-20 pl-50 pt-20"
                style="background-color: #0071a9;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" style="color: white;">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: white;font-weight:800; ">
                        Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section class="contact-section section_padding">
    <div class="container">
        <div class="row mt-20">
            <div class="col-12">
                <h1>Write to Us</h1>
            </div>
            <div class="col-lg-8 ">
                <form class="form-contact contact_form" action="" method="post" id="contactForm"
                    novalidate="novalidate">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                                    placeholder='Enter Message'></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="name" id="name" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                    placeholder='Enter your name'>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"
                                    placeholder='Enter email address'>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="subject" id="subject" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'"
                                    placeholder='Enter Subject'>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit"
                            class="button-contactForm wpcf7-form-control wpcf7-submit btn btn-default btn-sm"
                            name="c_submit">Send
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 pt-50 pb-50 pr-50 pl-50 d-flex justify-content-center flex-column"
                style="background-color:#0071a9; color:white;">
                <div class="contact-info">

                    <div class="media-body">

                        <h5 class="text-white d-flex flex-row align-items-center"> <svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                            </svg> &nbsp; Address</h5>
                        <p> New Hope Relief (1121099) 94 Abel Street,</p>
                        <p>Burnley, BB10 1QD</p>
                        <hr class="light">
                    </div>
                </div>
                <div class="contact-info">

                    <div class="media-body">

                        <h5 class="text-white d-flex flex-row align-items-center"> <svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                            </svg> &nbsp; Contact No</h5>
                        <p>00 (440) 9865 562</p>
                        <hr class="light">
                    </div>
                </div>
                <div class="contact-info">

                    <div class="media-body">

                        <h5 class="text-white d-flex flex-row align-items-center"> <svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path
                                    d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                            </svg> &nbsp; Email</h5>
                        <p><a href="" class="">info@newhoperelief.org</a></p>
                        <hr class="light">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-12 mt-20">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4712.602391994282!2d-2.240319!3d53.801924!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487b972ac7264881%3A0x31d72d668e77360c!2s94%20Abel%20St%2C%20Burnley%2C%20UK!5e0!3m2!1sen!2sus!4v1613633031055!5m2!1sen!2sus"
                    width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
        </div>



    </div>
</section>


<?php include('./includes/footer.php'); ?>