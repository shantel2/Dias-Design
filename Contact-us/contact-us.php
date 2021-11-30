<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dias Designs Contact Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css"> <!-- link for access to bulma api for page design-->

  <style>

    /* Style the header */
    header {
    background-color: #790EAA;
    padding: 30px;
    text-align: center;
    font-size: 35px;
    color: white;
    }

  </style>

  </head>
  
  
  <body>

    <nav class="navbar">
      <!-- Dias Designs Logo -->
      <div class="navbar-logo">
        <a href="" class="navbar-logo">
         <img src="Images/Dias Designs Transparent Background.png" alt="Business logo" style="max-height: 100px" class = "py-2 px-2">
        </a>
      </div>

    <!-- Navigation Bar Menu -->
    <div id="navbar-menu" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item">
                Home
            </a>

            <a class="navbar-item">
                ABOUT US
            </a>
        
            <a class="navbar-item">
                PRODUCTS
            </a>

            <a class="navbar-item">
                TESTIMONIALS
            </a>

            <a class="navbar-item">
                CONTACT US
            </a>

            <a class="navbar-item">
                FAQs
            </a>
        </div>

        <div class = "navbar-end">
            <a class="navbar-item">
                SEARCH
            </a>

            <a class="navbar-item">
                SHOPPING CART
            </a>
        </div>
    </div>

    </nav>

    <header> 
      <h1> CONTACT US </h1>
    </header>

    <!-- Contact Us Form -->
      <section class="section has-background-light">
        <div class="container">
          <div class="columns">
            <div class="column is-half">
              <img src="Images/Contact Us Graphic.png" alt="Contact-Form-Photo">
            </div>

            <div class="column is-half">
              <form action="https://formsubmit.co/kerene789@gmail.com" method="POST"> <!-- linl to FormSubmit api that allows the admin to recieve emails from form-->
                <h1 style="text-align:center">What's on your mind? </h1> 

                <div class="field">
                  <label class="label">First Name</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="First Name" name="fname" required>
                  </div>
                </div>

                <div class="field">
                  <label class="label">Last Name</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="Last Name" name="lname" required>
                  </div>
                </div>

                <div class="field">
                  <label class="label">Email</label>
                  <div class="control">
                    <input class="input" type="email" placeholder="Example: username@" name="email" required>
                  </div>
                </div>

                <div class="field">
                  <label class="label">Message</label>
                  <div class="control">
                    <textarea class="textarea" placeholder="Write something.." name="msg" required></textarea>
                  </div>
                </div>

                <div class="field is-grouped">
                  <div class="control">
                    <button class="button is-link">Submit</button>
                  </div>
                </div>  
                </form>  
            </div>
          </div>
        </div>
      </section>

  </body>
</html>