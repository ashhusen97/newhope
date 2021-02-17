<?php include('includes/header.php') ?>


<header>


    <div class="container">
        <div class="row heading-section">
            <div class="col-12 col-lg-6 mr-auto ml-auto text-center">

                <h1>
                    <strong><span class="text-uppercase">Contact Us</span></strong>
                </h1>


            </div>
        </div>
    </div>



</header>
<section class="contact-section section_padding">
    <div class="container">
        <div class="row mt-20">
            <div class="col-12">
                <h2 class="contact-title"></h2>
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
                            class="button-contactForm wpcf7-form-control wpcf7-submit btn btn-default btn-sm">Send
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4" style="background-color:#0071a9;">
                <div class="contact-info">
                    <span class="contact-info__icon"></span>
                    <div class="media-body">
                        <h4>Address</h4>
                        <p> New Hope Relief (1121099) 94 Abel Street,</p>
                        <p>Burnley, BB10 1QD</p>
                        <hr class="light">
                    </div>
                </div>
                <div class="contact-info">
                    <span class="contact-info__icon"></span>
                    <div class="media-body">
                        <h4>Phone</h4>
                        <p>00 (440) 9865 562</p>
                        <hr class="light">
                    </div>
                </div>
                <div class="contact-info">

                    <div class="media-body">

                        <h4>Email</h4>
                        <p><a href="" class="">info@newhoperelief.org</a></p>
                        <hr class="light">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<?php include('./includes/footer.php') ?>