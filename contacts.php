<?php

    $error = "";

    $successMessage = "";

    if ($_POST) {

        if (!$_POST['recipient_php']) {

            $error .= "An email is required.<br>";

        }

        if (!$_POST['message_php']) {

            $error .= "A message is required.<br>";

        }

        if ($_POST['recipient_php'] && filter_var($_POST['recipient_php'], FILTER_VALIDATE_EMAIL) == false) {

            $error .= "The email address is invalid.<br>";  

        }

        if ($error != "") {

            $error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</p>'.$error.'</div>';

        } else {

            $emailTo = "customersupport@localhost";

            $subject = "Claims";

            $content = $_POST['message_php'];

            $headers = "From: ".$_POST['recipient_php'];

            if (mail($emailTo, $subject, $content, $headers)) {

                $successMessage = '<div class="alert alert-success" role="alert">The message was sent succesfully!</div>';

            } else {

                $error = '<div class="alert alert-danger" role="alert">Your message couldn\'t be sent.</div>';

            }

        }

    }

?>

<!doctype html>

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="/5-bootstrap/logo.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="preload" href="/5-bootstrap/mystyle.css" as="style">
        <link rel="stylesheet" href="/5-bootstrap/mystyle.css" media="print" onload="this.media='all'">

        <title>Contacts</title>

        <style>

            .jumbotron {

                background-image: none!important;

            }

        </style>

    </head>

    <body>

        <div id="nav-placeholder">

        </div>

        <div id="center" class="container">

            <div class="jumbotron jumbotron-fluid">

                <div id="error"><? echo $error.$successMessage ?></div>

                <h1 class="display-4">Contact us!</h1>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactButton">

                    Contact

                </button>

                    <div class="modal fade" id="contactButton" tabindex="-1" aria-labelledby="contactButtonLabel" aria-hidden="true">    

                        <div class="modal-dialog">

                            <div class="modal-content">

                                <div class="modal-header">

                                    <h5 class="modal-title" id="contactButtonLabel">Glad to hear your claims. <br> We're working for you!</h5>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                </div>

                                <form name="theform" method="POST">

                                    <div class="modal-body">

                                        <div class="mb-3">

                                            <label for="recipient-name" class="col-form-label">Recipient:</label>

                                            <input type="text" onKeyup = "checkform()" class="form-control" id="recipient-name" name="recipient_php">

                                        </div>

                                        <div class="mb-3">

                                            <label for="message-text" class="col-form-label">Message:</label>

                                            <input type="text" onKeyup = "checkform()" class="form-control" id="message-text" name="message_php">

                                        </div>

                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" title="Close" data-bs-dismiss="modal">Close</button>

                                            <button id="submit_button" type="submit" disabled = "disabled" class="btn btn-primary" data-bs-toggle="tooltip" title="Save changes">Save changes</button>
                                
                                            <div data-bs-toggle="tooltip" title="Privacy">

                                                <button type="button" class="btn btn-danger" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="To see our Privacy and Cookie Policy, go to About page.">

                                                    Privacy information

                                                </button>

                                            </div>

                                        </div> 
                                
                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                <hr class="my-4">

                    <p>Don't forget to learn more about us.</p>

                <p class="lead">

                    <a class="btn btn-primary btn-sm" href="/5-bootstrap/about.html?" role="button">Learn more</a>

                </p>

            </div>

        </div>

    </body>

    <footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script type="text/javascript" src="jquery_library/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="jquery_library/jquery.cookiebar.js"></script>
        <script type="text/javascript" src="jquery_UI/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
        <script type="text/javascript">

            // Enable all popover(s);
        
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            }) 

            // Enable all tooltip(s);
            
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });

            // Call navbar.html to put it on top;

            $(function(){

                $("#nav-placeholder").load("navbar.html");

            });

            // Verify if every input field(s) are filled or not;

            function checkform() {

                var f = document.forms["theform"].elements;

                var cansubmit = true;

                for (i = 0; i < f.length; i++) {

                    if (f[i].value.length == 0) {

                        cansubmit = false;

                    } else {

                        document.getElementById('submit_button').disabled = !cansubmit;

                    }

                }

            }

        </script>
 
    </footer>

</html>