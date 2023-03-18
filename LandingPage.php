<!DOCTYPE html>

<html lang="en">


<head>
    <link rel="stylesheet" href="landingpage.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script>
        $("#checkedWorker").change(function() {
            if (this.checked) {
                document.getElementById("signupWorker").style.display = "block";
            } else {
                //I'm not checked
            }
        });
        /*  var toggleFlag = true;
        $(document).ready(function() {
            //$("#slideUpBtn").click(function() {
               // $("#form").slideUp();
               $("#slideUpBtn").click(function(){
                //$("form").toggleClass('show');
                var op = (toggleFlag) ? 1 : 0;
  $('#form').stop().animate({'opacity': op}, 250);
  
  // finally we switch the toggle flag value to keep in control  
  toggleFlag = !toggleFlag;

            });

        });
        $(window).scroll(function() {

if($(this).scrollTop() > 5) {
    $('form').hide(500);
} else {
    $('form').show(500);
}
});*/
    </script>

    <title>Document</title>
</head>

<body>

    <header class="hcontainer">

       

        <img class="landingImg" src="handyman22.png">
        <div class="over">
            <div class="htext"  style="vertical-align: middle;" onclick="toggle();disable()">
                <h1><a href="#" id="slideUpBtn">Sign In</a></h1>
            </div>
        </div>
        <div id="body">

            <div class="container" id="container">

                <div class="form-container sign-up-container">
                    <h2 id="x" onclick="toggle();scrollenable()"></h2>
                    <form action="signup.php" method="post">
                        <h1>Create Account</h1>
                        <div class="social-container">
                        </div>
                        <span>or use your email for registration</span>
                        <input type="text" placeholder="First Name" name="Name" />
                        <input type="text" placeholder="Last Name" name="lName" />
                        <input type="email" placeholder="Email" name="Email" />
                        <input type="password" placeholder="Password" name="Password" />
                        <input type="text" placeholder="location" name="District" />
                        <input type="text" placeholder="Phone Number" name="Phone" />
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkedWorker" onchange='handleChange(this);'>
                            <label class="form-check-label" id="lbl" for="checkedWorker">Worker?</label>
                        </div>
                        <button id="signuphirer" name="signuphirer">Sign Up</button>
                        <button type="submit"  id="signupWorker" name="signupWorker">Sign Up w</button>
                    </form>
                </div>
                <div class="form-container sign-in-container">

                    <form action="signin.php" method="post">
                        <h1>Sign in</h1>
                        <div class="social-container">
                        </div>
                        <span>or use your account</span>
                        <input type="email" placeholder="Email" name="Email" />
                        <input type="password" placeholder="Password" name="Password" />
                        <a href="#">Forgot your password?</a>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkedWorker" onchange='handleChange(this);'>
                            <label class="form-check-label" id="lbl" for="checkedWorker">Worker?</label>
                        </div>
                        <button id="signinhirer" name="signinhirer">Sign In</button>
                        <button type="submit"  id="signinWorker" name="signinWorker">Sign In w</button>

                    </form>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h1>Welcome Back!</h1>
                            <p>To keep connected with us please login with your personal info</p>
                            <button class="ghost" id="signIn">Sign In</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <a href="#">
                                <h2 id="x2" onclick="toggle();scrollenable()"></h2>
                            </a>
                            <h1>Welcome</h1>
                            <p>Enter your personal details and start journey with us</p>
                            <button class="ghost" id="signUp">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <selection class="description">
        <div class="fixedLeft">
            What is Mistri Media ?
        </div>
        <div class="scrolledRight">
            <div class="scrolledRight1">
                <h2>Moderate Costing</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Sint nulla itaque sunt eius eos, ipsam quae ad architecto
                        soluta maiores laborum, magni praesentium atque a.
                        Provident earum aliquid porro. Fugiat?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur error consequatur, quis officiis nam dignissimos! Excepturi dolore, impedit perferendis sed eos sunt ullam libero, aspernatur eligendi placeat sapiente quisquam cum!</p>
            </div>
            <div class="scrolledRight2">
                <h2>Convinience</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Sint nulla itaque sunt eius eos, ipsam quae ad architecto
                        soluta maiores laborum, magni praesentium atque a.
                        Provident earum aliquid porro. Fugiat?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, quia. Labore hic amet ducimus? A iusto odit id suscipit? Illo nulla laudantium eligendi dolor natus modi assumenda tempora, quis animi?</p>
            </div>
            <div class="scrolledRight3">
                <h2>One Stop Solution !</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Sint nulla itaque sunt eius eos, ipsam quae ad architecto
                        soluta maiores laborum, magni praesentium atque a.
                        Provident earum aliquid porro. Fugiat?
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit officiis assumenda ipsam at, quos, numquam esse accusamus iure deserunt rerum dolor doloremque inventore, adipisci impedit accusantium vero distinctio! Amet, vero.</p>
            </div>
            <footer>
                <i class="fa fa-copyright" aria-hidden="true">Copyright 2022</i>
            </footer>
        </div>
    </selection>
    <script type="text/javascript">
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });

        function toggle() {
            var popup = document.getElementById('container');
            popup.classList.toggle('active');
        }

        function blurr() {
            var blr = document.getElement('body');
            blr.classList.toggle('active');
        }

        function disable() {
            // To get the scroll position of current webpage
            TopScroll = window.pageYOffset || document.documentElement.scrollTop;
            LeftScroll = window.pageXOffset || document.documentElement.scrollLeft,

                // if scroll happens, set it to the previous value
                window.onscroll = function() {
                    window.scrollTo(LeftScroll, TopScroll);
                };

        }

        function scrollenable() {
            window.onscroll = function() {};
        }

        function handleChange(checkbox) {
            if (checkbox.checked == true) {
                document.getElementById("signupWorker").style.display = "block";
                document.getElementById("signuphirer").style.display = "none";
                document.getElementById("signinWorker").style.display = "block";
                document.getElementById("signinhirer").style.display = "none";
            } else {
                document.getElementById("signupWorker").style.display = "none";
                document.getElementById("signuphirer").style.display = "block";
                document.getElementById("signinWorker").style.display = "none";
                document.getElementById("signinhirer").style.display = "block";
            }
        }
    </script>
</body>

</html>