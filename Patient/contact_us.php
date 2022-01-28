<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact Us</title>
    <?php
  include "nav.php";
?>
    
  </head>

  <body>

    <!-- Page Content -->
    <section class="py-5">
      

      <h2>*Users May send feeback or issue complain here.</h2>
        
      <!-- Contact us form-->
      <div class="container">

  <form target="_blank" action="https://formsubmit.co/ehealthcare.co@gmail.com" method="POST">
    <div class="form-group">
      <div class="form-row">
        <div class="col">
          <input type="text" name="name" class="form-control" placeholder="Full Name" required>
        </div>
        <div class="col">
          <input type="email" name="email" class="form-control" placeholder="Email Address" required>
        </div>
      </div>
    </div>
    <div class="form-group">
      <input type="hidden" name="_subject" value="New submission!"rows="2"class="form-control" required >
      <select name="_subject">
        <option value="" disabled selected>Choose option</option>
        <option value="Suggestion">Suggestion</option>
        <option value="Complaint-Service">Complaint-Service</option>
        <option value="Complaint-Application">Complaint-Service</option>
        <option value="Other">Other</option>
    </select>
    </div>
    <div class="form-group">
      <textarea placeholder="Message" class="form-control" name="message" rows="10" required></textarea>
    </div>
    <button type="submit" class="btn btn-lg  btn-block" >Submit Form
      
    </button>


   
  </form>
</div>


      <!-- Contact us form ends Here-->
<?php
include "footer.php";
?>


  </body>

</html>

<!-- assets -->    
  
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/source.bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/source.bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/index1.css" rel="stylesheet">
    <link href="assets/css/footer.css" rel="stylesheet">
    <link href="assets/css/contactus.css" rel="stylesheet">

