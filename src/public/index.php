<?php
	// Message Vars
	$msg = '';
	$msgClass = '';

	// Check For Submit
	if(filter_has_var(INPUT_POST, 'submit')){
		// Get Form Data
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$message = htmlspecialchars($_POST['message']);

		// Check Required Fields
		if(!empty($email) && !empty($name) && !empty($message)){
			// Passed
			// Check Email
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Please use a valid email';
				$msgClass = 'alert-danger';
			} else {
				// Passed
				$toEmail = 'main@glocallisting.com';
				$subject = 'Contact Request From '.$name;
				$body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>'.$name.'</p>
					<h4>Email</h4><p>'.$email.'</p>
					<h4>Message</h4><p>'.$message.'</p>
				';

				// Email Headers
				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				// Additional Headers
				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){
					// Email Sent
					$msg = 'Your email has been sent';
					$msgClass = 'alert-success';
				} else {
					// Failed
					$msg = 'Your email was not sent';
					$msgClass = 'alert-danger';
				}
			}
		} else {
			// Failed
			$msg = 'Please fill in all fields';
			$msgClass = 'alert-danger';
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GLocal</title>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Architects+Daughter|Cuprum|Kanit|Lobster|Roboto|Roboto+Slab|Russo+One" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
</head>





<body data-spy="scroll" data-target="#navbarScroll">

    <!--Navbar-->
    <!--Navbar-->
    <nav id="mainNav" class="navbar-default navbar p-1 fixed-top navbar-fixed-top navbar-expand-lg navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
    <a id="brand" class="navbar-brand" href="index.html">GLocal</a>


<div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="  navbar-nav ml-auto">
        <li id="lang-switch" class="nav-item dropdown ">
             <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i id="lang_icon" class="fa fa-language" aria-hidden="true"></i></a> 
            <div class="dropdown-menu">
                <a id="en_click" class="dropdown-item button_lang" value="en" href="#">English</a>
                <a id="sp_click" class="dropdown-item button_lang current_lang" value="es" href="#">Spanish</a>
            </div>
        </li>
        <li class="nav-item ">
            <a class="nav-link " href="#top">Home <span class="sr-only">(current)</span></a>
        </li>
        <li id="servdd" class="en nav-item dropdown ">
            <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Services</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="listings.html">Digital listing Management </a>
                <a class="dropdown-item" href="seo.html">Search engine Optimization</a>
                <a class="dropdown-item" href="social-media.html">Social media marketing</a>
            </div>
        </li>
        <li id="servdd" class="sp nav-item dropdown ">
            <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Servicios</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="listings.html">Digital listing management </a>
                <a class="dropdown-item" href="seo.html">Search engine Optimization</a>
                <a class="dropdown-item" href="social-media.html">Social media marketing</a>
            </div>
        </li>
        <li class="en nav-item">
            <a class="nav-link" href="why-glocal.html">Why GLocal</a>
        </li>
        <li class="sp nav-item">
            <a class="nav-link" href="why-glocal.html">Porque GLocal</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="websites.html">Websites</a>
        </li>
        <li class="en nav-item active">
            <a class="nav-link " href="/index.php">Contact</a>
        </li>

        <li class="sp nav-item active">
            <a class="nav-link " href="/index.php">Contacto</a>
        </li>
    </ul>
    </div>
</nav>

    <section id="contact" class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 id="webh" class="display-3">Get Started!</h1>
            <p id="webp" class="lead ">Dont wait contact our team Now!</p>
            <p id="servb"><a class="btn btn-primary btn-lg " href="#start" role="button">Start Now &raquo;</a></p>
        </div>
    </section>

    <!--CONTACT-->

   <div id="start" class="container">	
    	<?php if($msg != ''): ?>
    		<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
    	<?php endif; ?>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	      <div class="form-group">
		      <label>Name</label>
		      <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
	      </div>
	      <div class="form-group">
	      	<label>Email</label>
	      	<input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
	      </div>
	      <div class="form-group">
	      	<label>Message</label>
	      	<textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
	      </div>
	      <br>
	      <button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button>
      </form>
    </div>

  
        <div class="container">
            <div class="row">

               
                    <div class="col">

                        <ul>
                            <li>
                                <h5>Company</h5>
                            </li>
                            <li>
                                <a href="/why-glocal.html">Why GLocal</a>
                            </li>
                            <li>
                                <a href="/websites.html">Websites</a>
                            </li>
                            <li>
                                <a href="/index.php">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col ">

                        <ul class="unstyled">
                            <li>
                                <h5>Services</h5>
                            </li>
                            <li>
                                <a href="/listings.html">Listings Management</a>
                            </li>
                            <li>
                                <a href="/seo.html">Search Optimization</a>
                            </li>
                            <li>
                                <a href="/social-media.html">Social Media</a>
                            </li>
                        </ul>
                    </div>
                    <div class="foot col">
                        <ul>
                            <li class="fbt offset-1">
                                <a href="https://www.facebook.com/G-Local-113387625989773/">      <i id="fa1" class="fa fa-facebook-official fa-3x" aria-hidden="true"></i></a>
                            </li>
                            <li class="fbt offset-1">
                            <a href="https://twitter.com/glocallisting">  <i id="fa2" class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>>
                            </li>
                        </ul>
                    </div>               
            </div>
        </div>
        </div>
        <footer class=" bg-dark p-3 text-white">
        <div class="container">
            <p class="float-right"><a href="#">Back to top</a></p>
            <p>&copy; 2017 Company, Inc. </p>
        </div>
    </footer>



    <script type="text/javascript " src="js/app.js "></script>
    <script type="text/javascript " src="js/creative.js "></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
   
 
</body>

</html>
