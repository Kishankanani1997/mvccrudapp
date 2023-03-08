<?php
require_once("header.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    if(isset($_POST["send"]))
  {
      
    require 'phpmailer/Exception.php';
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';

  
    $mail = new PHPMailer(true);

    try
    {
      // server setting
      $mail->SMTPDebug = 3;									
      $mail->isSMTP();											
      $mail->Host	 = 'smtp.gmail.com;';					
      $mail->SMTPAuth = true;					
      $mail->Username = 'kishankanani59@gmail.com';				
      $mail->Password = 'apxuvgluxiipyplr';						
      $mail->SMTPSecure = 'tls';							
      $mail->Port	 = 587;

      // Recipients
      $mail->setFrom('kishankanani59@gmail.com', 'Kishan Patel');
      $mail->addAddress('kishankanani2369@gmail.com', 'Rocko patel');
      $mail->addReplyTo('replyto@email.com', 'Reply to name');;

      // To Add Attachments
      $mail->addAttachment('file/file1.pdf', 'file.pdf');    
      $mail->addAttachment('image/image1.jpg','new.jpg'); //Filename is optional
      
      // Content
      $mail->isHTML(true);
      $mail->Subject = 'Feel Free to Inquire us about Developing any Project.';
      $mail->Body = "<center><h1>Client Information</h1>"
                    . "<b>Name of Client :</b>".$_POST['name']."<br>"
                    . "<b>Email of Client:</b>" .$_POST['email']."<br>"
                    . "<b>Subject of Client:</b>" .$_POST['subject']."<br>"
                    ."<b>Message of Client:</b>".$_POST['message']."</center>";
      $mail->send();
      $_SESSION["mail sent"]="sent";

      echo "<script> alert('Email sent successfully, We will Contact you as soon as possible. Have a Nice Day!!'); window.location='contact.php'; </script>";
    } 

    catch (Exception $e)
     {
        echo "Message could not be sent . Mailer Error:" .$mail->ErrorInfo;
     }
    
  }
?>



  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/contact-header.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>Contact</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Contact</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container position-relative" data-aos="fade-up">

        <div class="row gy-4 d-flex justify-content-end">

          <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">

            <div class="info-item d-flex">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h4>Location:</h4>
                <p>University Rd, Rajkot 360-005</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h4>Email:</h4>
                <p>info@kishan.com</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-phone flex-shrink-0"></i>
              <div>
                <h4>Call:</h4>
                <p>+91 98765 12345</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">

            <form method="post">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
              <!--  <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div> -->
              </div>
              <div class="text-center"><button type="submit" name="send">Send Message</button></div>
            </form>

          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <?php
 require_once("footer.php");
 ?>