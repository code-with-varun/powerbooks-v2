<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="Making Accounting process simple and easy for all small and medium startup companies. Powerbooks is excelent product of Thamizhanda.in.">
     <meta name="keywords" content="powerbooks, quickbooks,zohobooks, Thamizhanda.in, Runit Infotech, Powerus Sharepoint">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Powerbooks - Runit Infotech</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $base?>assets/css/bootstrap.min.css" >
    <!-- Icon -->
    <link rel="stylesheet" href="<?php echo $base?>assets/fonts/line-icons.css">
    <link rel="icon" href="<?php echo $base?>assets/img/powerbook-icon.ico" type="image/x-icon">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="<?php echo $base?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $base?>assets/css/owl.theme.css">
    
    <!-- Animate -->
    <link rel="stylesheet" href="<?php echo $base?>assets/css/animate.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="<?php echo $base?>assets/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" href="<?php echo $base?>assets/css/responsive.css">

  </head>
  <body>

    <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a href="#" class="navbar-brand"><img src="<?php echo $base?>assets/img/powerbooks-logo.png" alt="Powerbooks Thamizhanda.in" title="Powerbooks Thamizhanda.in"></a>       
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="lni-menu"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto w-100 justify-content-end clearfix">
              <li class="nav-item active">
                <a class="nav-link" href="#hero-area">
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#services">
                  Services
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#team">
                  Team
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pricing">
                  Pricing
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#testimonial">
                  Testimonial
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">
                  Contact
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="sign-in">
                  Sign In
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="sign-up">
                  Sign Up
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Navbar End -->

      <!-- Hero Area Start -->
      <div id="hero-area" class="hero-area-bg">
        <div class="container">      
          <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
              <div class="contents">
                <h2 class="head-title">Ledgers, ERP & POS<br>All in One</h2>
                <p>Making Accounting process simple and easy for all small and medium startup companies. Powerbooks is an excelent product for your business developed by Plugins Technologies.</p>
                <div class="header-button">
                  <a href="https://Thamizhanda.in.com/powerbooks/sign-up" class="btn btn-common">Register Now</i></a>
                  <a href="https://thamizhanda.in/blog/powebooks" target="new" class="btn btn-border video-popup">Learn More</i></a>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
              <div class="intro-img">
                <img class="img-fluid" src="<?php echo $base?>assets/img/intro-mobile.png" alt="">
              </div>            
            </div>
          </div> 
        </div> 
      </div>
      <!-- Hero Area End -->

    </header>
    <!-- Header Area wrapper End -->

    <!-- Services Section Start -->
    <section id="services" class="section-padding">
      <div class="container">
        <div class="section-header text-center">
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Our Features</h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        <div class="row">
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="0.3s">
              <div class="icon">
                <i class="lni-cog"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">Performance Dashboard</a></h3>
                <p> It keeps track on all aspects of daily activities and also track, analyse and display key pattern indicator to monitor the health of your business. </p>
              </div>
            </div>
          </div>
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="0.6s">
              <div class="icon">
                <i class="lni-stats-up"></i>
              </div>
              <div class="services-content">
                  <h3><a href="#">Data Sync & Bakcups</a></h3>
                <p>Your account with us is synced with our cloud. So you can easily take back up of your business details and other details whenever or wherever you need. </p>
              </div>
            </div>
          </div>
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="0.9s">
              <div class="icon">
                <i class="lni-users"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">Inventory Management</a></h3>
                <p>With us you can easily monter the movement of stocks & know when to replenish your stock. You can have complete product detials of every stock in hand and never run out of stock. </p>
              </div>
            </div>
          </div>
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="1.2s">
              <div class="icon">
                <i class="lni-layers"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">Simplified Billing</a></h3>
                <p>we help you to creat billform the estimate invoice that is finally approved and create bills instantly at the click of a button. </p>
              </div>
            </div>
          </div>
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="1.5s">
              <div class="icon">
                <i class="lni-mobile"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">Detailed Reporting</a></h3>
                <p>We help you to take better look into your business health and gives you a prper summary report on every aspect.</p>
              </div>
            </div>
          </div>
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="1.8s">
              <div class="icon">
                <i class="lni-rocket"></i>
              </div>
              <div class="services-content">
                                <h3><a href="#">Estimate Invoices</a></h3>
                <p>It is an expected bill for the customer before the payments made, and also we can convert them into a tax invoice with ease of our service. </p>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Services Section End -->

    <!-- About Section start -->
    <div class="about-area section-padding bg-gray">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-xs-12 info">
            <div class="about-wrapper wow fadeInLeft" data-wow-delay="0.3s">
              <div>
                <div class="site-heading">
                  <p class="mb-3">Manage Statistics</p>
                  <h2 class="section-title">Detailed Statistics of your Company</h2>
                </div>
                <div class="content">
                  <p>
                    Maintaining end to end progress and statistics of your purchase, sales and tax payments. Our system helps small and medium sized companies to keep their book keeping process well organised.
                  </p>
                  <a href="https://thamizhanda.in/tag/powerbooks/" class="btn btn-common mt-3">Read More</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12 wow fadeInRight" data-wow-delay="0.3s">
            <img class="img-fluid" src="<?php echo $base?>assets/img/about/img-1.png" alt="" >
          </div>
        </div>
      </div>
    </div>
    <!-- About Section End -->

    <!-- Features Section Start -->
 <!--    <section id="features" class="section-padding">
      <div class="container">
        <div class="section-header text-center">          
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Awesome Features</h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="content-left">
              <div class="box-item wow fadeInLeft" data-wow-delay="0.3s">
                <span class="icon">
                  <i class="lni-rocket"></i>
                </span>
                <div class="text">
                  <h4>Bootstrap 4 Based</h4>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
              </div>
              <div class="box-item wow fadeInLeft" data-wow-delay="0.6s">
                <span class="icon">
                  <i class="lni-laptop-phone"></i>
                </span>
                <div class="text">
                  <h4>Fully Responsive</h4>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
              </div>
              <div class="box-item wow fadeInLeft" data-wow-delay="0.9s">
                <span class="icon">
                  <i class="lni-cog"></i>
                </span>
                <div class="text">
                  <h4>HTML5, CSS3 & SASS</h4>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="show-box wow fadeInUp" data-wow-delay="0.3s">
              <img src="<?php echo $base?>assets/img/feature/intro-mobile.png" alt="">
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="content-right">
              <div class="box-item wow fadeInRight" data-wow-delay="0.3s">
                <span class="icon">
                  <i class="lni-leaf"></i>
                </span>
                <div class="text">
                  <h4>Modern Design</h4>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                </div>
              </div>
              <div class="box-item wow fadeInRight" data-wow-delay="0.6s">
                <span class="icon">
                  <i class="lni-layers"></i>
                </span>
                <div class="text">
                  <h4>Multi-purpose Template</h4>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
              </div>
              <div class="box-item wow fadeInRight" data-wow-delay="0.9s">
                <span class="icon">
                  <i class="lni-leaf"></i>
                </span>
                <div class="text">
                  <h4>Working Contact Form</h4>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    -->
    <!-- Features Section End -->   
 
    <!-- Team Section Start --><!-- 
    <section id="team" class="section-padding bg-gray">
      <div class="container">
        <div class="section-header text-center">          
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Meet our team</h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-12 col-xs-12">
            <!-- Team Item Starts --><!-- 
            <div class="team-item wow fadeInRight" data-wow-delay="0.2s">
              <div class="team-img">
                <img class="img-fluid" src="<?php echo $base?>assets/img/team/team-01.png" alt="">
              </div>
              <div class="contetn">
                <div class="info-text">
                  <h3><a href="#">David Smith</a></h3>
                  <p>Front-end Developer</p>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur.</p>
                <ul class="social-icons">
                  <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="lni-instagram-filled" aria-hidden="true"></i></a></li>
                </ul>
              </div>
            </div>
            <!-- Team Item Ends --><!-- 
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12">
            <!-- Team Item Starts --><!-- 
            <div class="team-item wow fadeInRight" data-wow-delay="0.4s">
              <div class="team-img">
                <img class="img-fluid" src="<?php echo $base?>assets/img/team/team-02.png" alt="">
              </div>
              <div class="contetn">
                <div class="info-text">
                  <h3><a href="#">ERIC PETERSON</a></h3>
                  <p>Product Designer</p>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur.</p>
                <ul class="social-icons">
                  <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="lni-instagram-filled" aria-hidden="true"></i></a></li>
                </ul>
              </div>
            </div>
            <!-- Team Item Ends --><!-- 
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12">
            <!-- Team Item Starts --><!-- 
            <div class="team-item wow fadeInRight" data-wow-delay="0.6s">
              <div class="team-img">
                <img class="img-fluid" src="<?php echo $base?>assets/img/team/team-03.png" alt="">
              </div>
              <div class="contetn">
                <div class="info-text">
                  <h3><a href="#">DURWIN BABB</a></h3>
                  <p>Lead Designer</p>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur.</p>
                <ul class="social-icons">
                  <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="lni-instagram-filled" aria-hidden="true"></i></a></li>
                </ul>
              </div>
            </div>
            <!-- Team Item Ends --><!-- 
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12">
            <!-- Team Item Starts --><!-- 
            <div class="team-item wow fadeInRight" data-wow-delay="0.8s">
              <div class="team-img">
                <img class="img-fluid" src="<?php echo $base?>assets/img/team/team-04.png" alt="">
              </div>
              <div class="contetn">
                <div class="info-text">
                  <h3><a href="#">MARIJN OTTE</a></h3>
                  <p>Lead Designer</p>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur.</p>
                <ul class="social-icons">
                  <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="lni-instagram-filled" aria-hidden="true"></i></a></li>
                </ul>
              </div>
            </div>
            <!-- Team Item Ends --><!-- 
          </div>
        </div>
      </div>
    </section>
   --> <!-- Team Section End -->

    <!-- Pricing section Start --> 
    <section id="pricing" class="section-padding">
      <div class="container">
        <div class="section-header text-center">          
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Pricing</h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        
				<div class="body table-responsive">
          
				<table class="table table-hover">
        <tr>
            <th>PLAN</th>
            <th>YEARLY Min</th>
            <th>YEARLY Max</th>
            <th>Sample</th>
            <th>Price/Bill</th>
            <th>Total Amount</th>
            <th>MIN</th>
            <th>MAX</th>
        </tr>
        <tr>
            <td>Free Trial</td>
            <td>0</td>
            <td>10</td>
            <td>5</td>
            <td>₹0</td>
            <td>₹0</td>
            <td>₹0</td>
            <td>₹0</td>
        </tr>
        <tr>
            <td>STANDARD1</td>
            <td>11</td>
            <td>100</td>
            <td>18</td>
            <td>₹10</td>
            <td>₹180</td>
            <td>₹110</td>
            <td>₹1000</td>
        </tr>
        <tr>
            <td>STANDARD2</td>
            <td>101</td>
            <td>500</td>
            <td>152</td>
            <td>₹5</td>
            <td>₹760</td>
            <td>₹505</td>
            <td>₹2500</td>
        </tr>
        <tr>
            <td>STANDARD3</td>
            <td>501</td>
            <td>1000</td>
            <td>635</td>
            <td>₹3</td>
            <td>₹1905</td>
            <td>₹1503</td>
            <td>₹3000</td>
        </tr>
        <tr>
            <td>PRO1</td>
            <td>1001</td>
            <td>2500</td>
            <td>1200</td>
            <td>₹2</td>
            <td>₹2400</td>
            <td>₹2002</td>
            <td>₹5000</td>
        </tr>
        <tr>
            <td>PRO2</td>
            <td>2501</td>
            <td>5000</td>
            <td>3654</td>
            <td>₹1.5</td>
            <td>₹5481</td>
            <td>₹3751.5</td>
            <td>₹7500</td>
        </tr>
        <tr>
            <td>PRO3</td>
            <td>5001</td>
            <td>15000</td>
            <td>8587</td>
            <td>₹0.75</td>
            <td>₹6440.25</td>
            <td>₹3750.75</td>
            <td>₹11250</td>
        </tr>
    </table>
          
          
        </div>
				
      </div>
    </section>
    <!-- Pricing Table Section End -->

		
  
    <!-- Testimonial Section Start -->
    <section id="testimonial" class="testimonial section-padding">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="testimonials" class="owl-carousel wow fadeInUp" data-wow-delay="1.2s">
              <div class="item">
                <div class="testimonial-item">
                  <div class="img-thumb">
                    <img src="<?php echo $base?>assets/img/testimonial/krapicx.jpg" alt="krapicx" title="krapicx">
                  </div>
                  <div class="info">
                    <h2><a href="#">Krapicx Design Studio</a></h2>
                    <h3><a href="#">Nice Product</a></h3>
                  </div>
                  <div class="content">
                    <p class="description">Really useful to manage custormers and track monthly progress and improve sales. Expecting more enhancements in future.</p>
                    <div class="star-icon mt-3">
                      <span><i class="lni-star-filled"></i></span>
                      <span><i class="lni-star-filled"></i></span>
                      <span><i class="lni-star-filled"></i></span>
                      <span><i class="lni-star-filled"></i></span>
                      <span><i class="lni-star-half"></i></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-item">
                  <div class="img-thumb">
                    <img src="<?php echo $base?>assets/img/testimonial/pluginstechnologies.jpg" alt="pluginstechnologies" title="pluginstechnologies">
                  </div>
                  <div class="info">
                    <h2><a href="#">Plugins Technologies</a></h2>
                    <h3><a href="#">Good Customer Service</a></h3>
                  </div>
                  <div class="content">
                    <p class="description">Best customer support done from the responsive IT helpdesk team. Simplified system for all basic users.</p>
                    <div class="star-icon mt-3">
                      <span><i class="lni-star-filled"></i></span>
                      <span><i class="lni-star-filled"></i></span>
                      <span><i class="lni-star-filled"></i></span>
                      <span><i class="lni-star-half"></i></span>
                      <span><i class="lni-star-half"></i></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-item">
                  <div class="img-thumb">
                    <img src="<?php echo $base?>assets/img/testimonial/lavishgifts.jpg" alt="lavishgifts" title="lavishgifts">
                  </div>
                  <div class="info">
                    <h2><a href="#">Lavish Gifts</a></h2>
                    <h3><a href="#">Perfection at budget</a></h3>
                  </div>
                  <div class="content">
                    <p class="description">Thanks for giving us the Universal Inventory Management system for both product and service. very useful for startup companies. </p>
                    <div class="star-icon mt-3">
                      <span><i class="lni-star-filled"></i></span>
                      <span><i class="lni-star-filled"></i></span>
                      <span><i class="lni-star-filled"></i></span>
                      <span><i class="lni-star-filled"></i></span>
                      <span><i class="lni-star-half"></i></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-item">
                  <div class="img-thumb">
                    <img src="<?php echo $base?>assets/img/testimonial/squatflickers.jpg" alt="squatflickers" title="squatflickers">
                  </div>
                  <div class="info">
                    <h2><a href="#">Squatflickers</a></h2>
                    <h3><a href="#">Easy to use</a></h3>
                  </div>
                  <div class="content">
                    <p class="description">Powerbooks is very helpfull in managing projects and customers and easy to track orders and priority deliveries.. Thanks for the product.</p>
                    <div class="star-icon mt-3">
                      <span><i class="lni-star-filled"></i></span>
                      <span><i class="lni-star-filled"></i></span>
                      <span><i class="lni-star-filled"></i></span>
                      <span><i class="lni-star-half"></i></span>
                      <span><i class="lni-star-half"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonial Section End -->

    <!-- Call To Action Section Start -->
    <section id="cta" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.3s">           
            <div class="cta-text">
              <h4>Get 30 days free trial</h4>
              <p>With Powerbooks — 100% satisfaction guaranteed. </p>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-xs-12 text-right wow fadeInRight" data-wow-delay="0.3s">
            </br><a href="sign-up" class="btn btn-common">Register Now</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Call To Action Section Start -->

    <!-- Contact Section Start -->
    <section id="contact" class="section-padding bg-gray">    
      <div class="container">
        <div class="section-header text-center">          
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Countact Us</h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        <div class="row contact-form-area wow fadeInUp" data-wow-delay="0.3s">   
          <!-- <div class="col-lg-7 col-md-12 col-sm-12">
            <div class="contact-block">
              <form id="contactForm1" action="new-walkin" method="POST">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" maxlength="25" required data-error="Please enter your name">
                      <div class="help-block with-errors"></div>
                    </div>                                 
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" placeholder="Email" id="email" class="form-control" name="email" required data-error="Please enter your email">
                      <div class="help-block with-errors"></div>
                    </div> 
                  </div>
									<div class="col-md-6">
                    <div class="form-group">
                      <input type="number" placeholder="Mobile No." id="mobile" name="mobile" class="form-control" maxlength="10" required data-error="Please enter your Mobile">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                   <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" placeholder="Subject" id="msg_subject" name="msg_subject" class="form-control" maxlength="50" required data-error="Please enter your subject">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group"> 
                      <textarea class="form-control" id="message" name="message" placeholder="Your Message (Max 150Char)" rows="7" maxlength="150"data-error="Write your message" required></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="submit-button text-left">
										<button class="btn btn-common"  type="submit">Send Message</button>
                      <div id="msgSubmit" class="h3 text-center hidden"></div> 
                      <div class="clearfix"></div> 
                    </div>
                  </div>
                </div>            
              </form>
            </div>
          </div> -->
          <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="map">
              <object style="border:0; height: 300px; width: 100%;" data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3903.6687051734198!2d79.80893547505923!3d11.928128438299495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5361e327d255af%3A0x47f56ec8f9c6a5d6!2sRUNIT%20INFOTECH!5e0!3m2!1sen!2sin!4v1703872244187!5m2!1sen!2sin"></object>
            </div>
          </div>
        </div>
      </div> 
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Start -->
    <footer id="footer" class="footer-area section-padding">
      <div class="container">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <div class="widget">
                <h3 class="footer-logo"><img src="<?php echo $base?>assets/img/powerbooks-logo.png" alt="Powerbooks Thamizhanda.in" title="Powerbooks Thamizhanda.in"></h3>
                <div class="textwidget">
                  <p>Making Accounting process simple and easy for all small and medium startup companies. </p>
                </div>
                <div class="social-icon">
                  <a class="facebook" href="https://www.facebook.com/Thamizhanda.inindia/"><i class="lni-facebook-filled"></i></a>
                  <a class="twitter" href="https://twitter.com/Lavish_Dreamers"><i class="lni-twitter-filled"></i></a>
                  <a class="instagram" href="https://www.instagram.com/lavish_dreamers/"><i class="lni-instagram-filled"></i></a>
                  <a class="linkedin" href="https://in.linkedin.com/company/lavish-dreamers"><i class="lni-linkedin-filled"></i></a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
              <h3 class="footer-titel">Products</h3>
              <ul class="footer-link">
                <li><a href="#">Tracking</a></li>
                <li><a href="#">Application</a></li>
                <li><a href="#">Resource Planning</a></li>
                <li><a href="#">Enterprise</a></li>           
                <li><a href="#">Employee Management</a></li>           
              </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
              <h3 class="footer-titel">Resources</h3>
              <ul class="footer-link">
                <li><a href="#">Payment Options</a></li>
                <li><a href="#">Fee Schedule</a></li>
                <li><a href="#">Getting Started</a></li>
                <li><a href="#">Identity Verification</a></li>
                <li><a href="#">Card Verification</a></li>
              </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
              <h3 class="footer-titel">Contact</h3>
              <ul class="address">
                <li>
                  <a href="#"><i class="lni-map-marker"></i>#11 Kasthuribai Nagar, Nellithope, Puducherry-5.</a>
                </li>
                <li>
                  <a href="#"><i class="lni-phone-handset"></i>  +9092608362</a>
                </li>
                <li>
                  <a href="#"><i class="lni-envelope"></i> Thamizhanda.in@gmail.com</a>
                </li>
              </ul>
            </div>
          </div>
        </div>  
      </div> 
      <div id="copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="copyright-content">
                <p>Copyright © <?php echo date('Y')?> <a rel="nofollow" href="http://www.thamizhanda.in">RUNIT INFOTECH</a> All Right Reserved</p>
              </div>
            </div>
          </div>
        </div>
      </div>   
    </footer> 
    <!-- Footer Section End -->

    <!-- Go to Top Link -->
    <a href="#" class="back-to-top">
    	<i class="lni-arrow-up"></i>
    </a>
    
    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo $base?>assets/js/jquery-min.js"></script>
    <script src="<?php echo $base?>assets/js/popper.min.js"></script>
    <script src="<?php echo $base?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $base?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo $base?>assets/js/wow.js"></script>
    <script src="<?php echo $base?>assets/js/jquery.nav.js"></script>
    <script src="<?php echo $base?>assets/js/scrolling-nav.js"></script>
    <script src="<?php echo $base?>assets/js/jquery.easing.min.js"></script>  
    <script src="<?php echo $base?>assets/js/main.js"></script>
    <script src="<?php echo $base?>assets/js/form-validator.min.js"></script>
    <script src="<?php echo $base?>assets/js/contact-form-script.min.js"></script>
      
  </body>
</html>
