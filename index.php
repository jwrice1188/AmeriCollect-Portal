<?php 
session_start();
if (isset($_SESSION["fname"])){
    $sessionfname = $_SESSION["fname"];
    $sessionid = $_SESSION["accountid"]; 
}  
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/indexheader.php");?>
    <!--==========================
  About Section
  ============================-->
    <section id="about">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">About Us</h3>
                    <div class="section-title-divider"></div>
                    <p class="section-description">Learn about what we do and how we strive to provide the best customer service in the industry.</p>
                </div>
            </div>
        </div>
        <div class="container about-container wow fadeInUp">
            <div class="row">

                <div class="col-lg-6 about-img">
                    <img src="img/about-img.jpg" alt="">
                </div>

                <div class="col-md-6 about-content">
                    <h2 class="about-title">We provide the best products &amp; service</h2>
                    <p class="about-text">
                        Hot Ash Cigars was originally established in Sheboygan Falls, Wisconsin with the help of my grandfather, Walter White Sr. Walter was born in 1889 and arrived on Ellis Island as an immigrant from Mayaguez, Puerto Rico on the ship, the Zulia. Growing up and recalling the aroma of a fine cigar brings back great memories of my Grandfather and his love for cigars. The goal of Hot Ash Cigars, is to continue the tradition of creating and providing the best premium cigars.
                    </p>
                    <p class="about-text">
                        Hot Ash Cigars has distribution centers in New York, New Jersey, Massachusetts, Florida, North Carolina, Connecticut and Louisiana. Our home office is located in Wisconsin.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
  Services Section
  ============================-->
    <section id="services">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Our Services</h3>
                    <div class="section-title-divider"></div>
                    <p class="section-description">We provide unparalleled customer service for our customers</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 service-item">
                    <div class="service-icon"><i class="fa fa-comment"></i></div>
                    <h4 class="service-title"><a href="#contact">24 hour service</a></h4>
                    <p class="service-description">We provide 24/7 service to all customers and potential customers. Have a problem or question? <a href="#contact">Contact us!</a></p>
                </div>
                <div class="col-md-4 service-item">
                    <div class="service-icon"><i class="fa fa-search"></i></div>
                    <h4 class="service-title"><a href="#portfolio">Wide Selection</a></h4>
                    <p class="service-description">We offer a vast selection of cigars, cigar accessories, and related items.</p>
                </div>
                <div class="col-md-4 service-item">
                    <div class="service-icon"><i class="fa fa-truck"></i></div>
                    <h4 class="service-title"><a href="#contact">Cigar Storage</a></h4>
                    <p class="service-description">Need a humidor to store your cigars? We have humidor locations throughout the country that can store you cigars for you!</p>
                </div>
                <div class="col-md-6 service-item">
                    <div class="service-icon"><i class="fa fa-handshake-o"></i></div>
                    <h4 class="service-title"><a href="#contact">Taste Testing</a></h4>
                    <p class="service-description">Not sure if you're going to like a new or different cigar type? Taste test a cigar today! We will ship you a shorty version of any cigar to taste test.</p>
                </div>
                <div class="col-md-6 service-item">
                    <div class="service-icon"><i class="fa fa-road"></i></div>
                    <h4 class="service-title"><a href="#contact">Delivery</a></h4>
                    <p class="service-description">We personally deliver your products right to your door with our very own drivers. Each driver is a cigar expert and can answer any questions you have at the time of deliver!</p>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
  Register Pre-Section
  ============================-->
    <section id="subscribe">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="subscribe-title">Register To Begin Shopping</h3>
                    <p class="subscribe-text">Be part of the Hot Ash family and register an account to begin shopping our excellent products!</p>
                </div>
                <div class="col-md-4 subscribe-btn-container">
                    <a class="subscribe-btn" href="products.php#contact">Register Now</a>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
  Product Pre-Section
  ============================-->
    <section id="portfolio">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Our Products</h3>
                    <div class="section-title-divider"></div>
                    <p class="section-description">Browse our wide selection of cigars and pipes and their accessories</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <a class="portfolio-item" style="background-image: url(img/portfolio-1.jpg);" href="products.php">
                        <div class="details">
                            <h4>Cigars</h4>
                            <span>Browse all cigars</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a class="portfolio-item" style="background-image: url(img/portfolio-2.jpg);" href="products.php">
                        <div class="details">
                            <h4>Cigar Accessories</h4>
                            <span>Browse all cigar accessories</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a class="portfolio-item" style="background-image: url(img/portfolio-3.jpg);" href="products.php">
                        <div class="details">
                            <h4>Pipes</h4>
                            <span>Browse all pipes</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a class="portfolio-item" style="background-image: url(img/portfolio-4.jpg);" href="products.php">
                        <div class="details">
                            <h4>Pipe Accessories</h4>
                            <span>Browse all pipe accessories</span>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!--==========================
  Testimonials Section
  ============================-->
    <section id="testimonials">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Testimonials</h3>
                    <div class="section-title-divider"></div>
                    <p class="section-description">Hear what our current customers have to say about Hot Ash Cigars</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="profile">
                        <div class="pic"><img src="img/client-1.jpg" alt=""></div>
                        <h4>Saul Goodman</h4>
                        <span>Lawless Inc</span>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="quote">
                        <b><img src="img/quote_sign_left.png" alt=""></b> When I made the decision to purchase my cigars through Hot Ash, I didn't realize I was making a choice that would change my life forever. I am so happy and pleased with the customer service over at Hot Ash Cigars. The employees and even the delivery driver were amazing! My favorite part about the whole thing was the tailored feedback and customer service. I'm over the moon for Hot Ash Cigars and will/have recommended them to everyone I know! Keep up the good work! <small><img src="img/quote_sign_right.png" alt=""></small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <div class="quote">
                        <b><img src="img/quote_sign_left.png" alt=""></b>Hot Ash Cigars changed my life - so much so that I (and friends I haven't seen in months) barely recognize me with these premium cigars in my mouth. I'm still the same person, to be sure, just with lots of new cigars and without so many of the pathetic cigars that I had been holding onto for so many years. I had high expectations going into Hot Ash and can honestly say that they exceeded them all!<small><img src="img/quote_sign_right.png" alt=""></small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="profile">
                        <div class="pic"><img src="img/client-2.jpg" alt=""></div>
                        <h4>Mike Ehrmantraut</h4>
                        <span>Earls Eavesdropping</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!--==========================
  Team Section
  ============================-->
    <section id="team">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Our Team</h3>
                    <div class="section-title-divider"></div>
                    <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="member">
                        <div class="pic"><img src="img/team-1.jpg" alt=""></div>
                        <h4>Walter White III</h4>
                        <span>Chief Executive Officer</span>
                        <div class="social">
                            <a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.google.com" target="_blank"><i class="fa fa-google-plus"></i></a>
                            <a href="https://www.linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="member">
                        <div class="pic"><img src="img/team-2.jpg" alt=""></div>
                        <h4>Skyler White</h4>
                        <span>Product Manager</span>
                        <div class="social">
                            <a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.google.com" target="_blank"><i class="fa fa-google-plus"></i></a>
                            <a href="https://www.linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="member">
                        <div class="pic"><img src="img/team-3.jpg" alt=""></div>
                        <h4>Jesse Pinkman</h4>
                        <span>Cigar Specialist</span>
                        <div class="social">
                            <a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.google.com" target="_blank"><i class="fa fa-google-plus"></i></a>
                            <a href="https://www.linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="member">
                        <div class="pic"><img src="img/team-4.jpg" alt=""></div>
                        <h4>Jane Margolis</h4>
                        <span>Customer Service</span>
                        <div class="social">
                            <a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.google.com" target="_blank"><i class="fa fa-google-plus"></i></a>
                            <a href="https://www.linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--==========================
  Contact Section
  ============================-->
    <section id="contact">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Contact Us</h3>
                    <div class="section-title-divider"></div>
                    <p class="section-description">Complete the form below to contact our team.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-md-push-2">
                    <div class="info">
                        <div>
                            <i class="fa fa-map-marker"></i>
                            <p>375 Buffalo St<br>Sheboygan Falls, WI 53085</p>
                        </div>

                        <div>
                            <i class="fa fa-envelope"></i>
                            <p>hotashhole@gmail.com</p>
                        </div>

                        <div>
                            <i class="fa fa-phone"></i>
                            <p>920-467-7902</p>
                        </div>

                    </div>
                </div>

                <div class="col-md-5 col-md-push-2">
                    <div class="form">
                        <div id="sendmessage">Your message has been sent. Thank you!</div>
                        <div id="errormessage"></div>
                        <form action="" method="post" role="form" class="contactForm">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php include("includes/footer.php");?>
</html>