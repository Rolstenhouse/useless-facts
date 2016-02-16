<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <?php include_once 'head.php'; ?>
</head>
<body style="color: #37b88f; background-color: #e0f2f1">
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <br><br>
            <div class='card z-depth-3' style='background-color: #1976d2'>
                <div class='card-content'>
                    <h1 class="header center white-text thick">Useless Facts!</h1>
                </div>
            </div>

            <div class="row center">
                <h5 class="header col s12 light">In the age of modern technology and short attention spans, it becomes ever easier to let obscure pieces of information factions. Useless Facts! aims to spark our inner crave and primal instincts for large periods at a time.</h5>
            </div>
            <div class="row center">
                Useless Facts will be able to send messages to your consenting friends with valuable information through SMS.
            </div>
            <br>
            <div class="row center">
                <h6>***This product is to be used for non-commercial purposes only.</h6>
            </div>                
            <br><br>

            <?php

            function debug_to_console( $data ) {

                if ( is_array( $data ) )
                    $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
                else
                    $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

                echo $output;
            }

//if "email" variable is filled out, send email
            if (isset($_REQUEST['phone'])) {

                    //Email information
                    //$admin_email = "rolsthoorn12@gmail.com";
                $phone = $_REQUEST['phone'];
                    //$subject = $_REQUEST['subject'];
                $frequency = $_REQUEST['frequency'];
                $firstname = $_REQUEST['first_name'];
                $lastname = $_REQUEST['last_name'];
                $interval = $_REQUEST['interval'];
                $intervalUnit = $_REQUEST['intervalUnit'];


                //TODO run php in background
                //$output = shell_exec(sprintf('%s > /dev/null 2>&1 & echo $!','php emails.php $phone $frequency $firstname $lastname $interval $intervalUnit < /dev/null &'));

                $output = shell_exec("php /usr/share/nginx/html/UselessFacts/emails.php {$phone} {$frequency} {$firstname} {$lastname} {$interval} {$intervalUnit} 'alert' >> /log/uselessfacts.log &");
                
                debug_to_console($output);
                //$proc = new BackgroundProcess('exec php emails.php $phone $frequency $firstname $lastname $interval $intervalUnit');


                //Email response
                echo "Your friend was just subscribed to useless facts!";
            }

                //if "email" variable is not filled out, display the form
            else {
                ?>
                <div class="row">
                    <form class="col s12" method='post'>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="first_name" name='first_name' type="text" placeholder='First Name' class="validate">
                                <label for="first_name"></label>
                            </div>
                            <div class="input-field col s6">
                                <input id="last_name" name='last_name' type="text" placeholder='Last Name' class="validate">
                                <label for="last_name"></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="phone" name='phone' type="text"  placeholder="Friend's Number" class="validate">
                                <label for="phone"></label>
                            </div>
                        </div>                         
                        <div class='row'>
                            <div class='input-field col s6'>
                                <input id='frequency' name='frequency' type='number' placeholder='Number of Messages' class='validate'>
                                <label for='frequency'></label>
                            </div>
                            <div class="input-field col s3">
                                <input id='interval' name='interval' type='number' placeholder = 'Interval between messages' class="validate">
                                <label for='interval'></label>
                            </div>
                            <div class="input-field col s3">
                                <select name="intervalUnit" class="browser-default">
                                  <option value="1" selected>Seconds</option>
                                  <option value="2">Minutes</option>
                                  <option value="3">Hours</option>
                              </select>
                          </div>
                      </div>
                      <p>
                        <input type="checkbox" id="test5" class='validate' required='on'/>
                        <label for="test5">In checking this box, I accept full consequences for any potential legal trouble on behalf of Useless Facts!</label>
                    </p>
                    <button class="waves-effect waves-light btn" type='submit' value='submit'>Subscribe Friend</button>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
</body>
</html>

