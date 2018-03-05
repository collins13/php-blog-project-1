<?php include 'header.php'  ?>

<?php
if (isset($_POST['submit'])) {

   $name = $_POST['name'];
   $email = $_POST['email'];
   $email = $_POST['message'];


  if (!empty('name') && !empty('email') && !empty('message')) {


        $to = 'rashidcollins16@gmail.com';


  }

}



?>

<div class="container">
  <form id="contact" action="contact.php" method="post">
    <h3>Quick Contact</h3>
    <h4>Contact us today, and get reply with in 24 hours!</h4>
    <fieldset>
      <input placeholder="Your name" type="text" name="name" tabindex="1" >

    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" type="text" name="email" tabindex="2" >
    <fieldset>
      <textarea placeholder="Type your Message Here...." type="text" name="message" tabindex="5" ></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>


</div>
      <div class="col-md-4">
        <div id="left-contact">
            <div class="well">
                 <h2><u><i>Our contacts</i></u></h2>
                 <div class="wel">
                 <p>you can contact  and reach us through sending us a message above<br>
                 OR</p>
                 </div>
                 <label>Email:</label><P>PwaniGossip@gmail.com</P>
                 <label>Personal Email:</label><P>rashidcollins16@gmail.com</P>
                 <label>Phone:</label><P>+254703954539</P>
    </div>
      </div>
      </div>
      </div>
      <hr style="border: 5px solid black;">
