<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registration</title>

    <!-- Custom fonts for this template-->
    <link href="backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="backend/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript-->
    <script src="backend/vendor/jquery/jquery.min.js"></script>
    <script src="backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="backend/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="common_custom/js/axios.js"></script>
    <script src="common_custom/js/sweet_alert.js"></script>

</head>

<body id="page-top">


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="{{ asset('backend/images/registration.jpg') }}" class="img-fluid h-100"
                                    alt="not found">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome To! TalentHub</h1>
                                    </div>
                                    <section class="">
                                        <div class="form-group">
                                            <label for="name">Your Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                aria-describedby="name" placeholder="Enter your name">
                                            <small id="name_error" class="form-text text-danger"></small>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                aria-describedby="email" placeholder="Enter your email">
                                            <small id="email_error" class="form-text  text-danger"></small>
                                        </div>

                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input type="tel" class="form-control" id="mobile" name="mobile"
                                                aria-describedby="mobile" placeholder="018XXXXXXXX">
                                            <small id="mobile_error" class="form-text  text-danger"></small>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control myPassword" id="password"name="password" aria-describedby="password" placeholder="Enter your password">
                                            <small id="password_error" class="form-text text-danger passowrdAndConfrimPasswordError"></small>
                                            <input type="checkbox" onclick="togglePassword('password')">Show Password
                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="confirm_password">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm_password" aria-describedby="confirm_password"placeholder="Enter your confirm password">
                                            <small id="confirm_password_error" class="form-text text-danger"></small>
                                            <input type="checkbox" onclick="togglePassword('confirm_password')">Show Password
                                        </div>

                                        <button class="btn btn-primary w-100" onclick="onRegistration()">Registration</button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </section>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <script>
        function togglePassword(fieldId) {
            var field = document.getElementById(fieldId);
            if (field.type === "password") {
                field.type = "text";
            } else {
                field.type = "password";
            }
        }


        async function onRegistration() {
            try {
            
                document.getElementById("name_error").innerText = "";
                document.getElementById("email_error").innerText = "";
                document.getElementById("mobile_error").innerText = "";
                document.getElementById("password_error").innerText = "";
                document.getElementById("confirm_password_error").innerText = "";

              
                let name = document.getElementById("name").value.trim();
                let email = document.getElementById("email").value.trim();
                let mobile = document.getElementById("mobile").value.trim();
                let password = document.getElementById("password").value;
                let confirm_password = document.getElementById("confirm_password").value;

               
                let hasError = false;

                if (!name) {
                    document.getElementById("name_error").innerText = "Name is required.";
                    hasError = true;
                }
                if (!email) {
                    document.getElementById("email_error").innerText = "Email is required.";
                    hasError = true;
                }

                if (!mobile) {
                    document.getElementById("mobile_error").innerText = "Mobile is required.";
                    hasError = true;
                } else if (!/^\d{10,11}$/.test(mobile)) {
                    document.getElementById("mobile_error").innerText = "Invalid mobile format.";
                    hasError = true;
                }
                if (!password) {
                    document.getElementById("password_error").innerText = "Password is required.";
                    hasError = true;
                }else if(password.length < 8){
                    document.getElementById("password_error").innerText = "Passwords length must be 8 characters or more.";
                    hasError = true
                }


                if (!confirm_password) {
                    document.getElementById("confirm_password_error").innerText = "Confirm password is required.";
                    hasError = true;
                } else if (password !== confirm_password) {
                    document.getElementById("confirm_password_error").innerText = "Passwords do not match.";
                    hasError = true;
                }

           
                if (hasError) return;

           
                let data = {
                    name: name,
                    email: email,
                    mobile: mobile,
                    password: password,
                };

                // Send data to server
                let response = await axios.post("/user-registration", data);

                // Handle server response
                if (response.data.status === "success") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: response.data.message,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    window.location.href="/dashboard"
                // error clear    
                document.getElementById("name_error").innerText = "";
                document.getElementById("email_error").innerText = "";
                document.getElementById("mobile_error").innerText = "";
                document.getElementById("password_error").innerText = "";
                document.getElementById("confirm_password_error").innerText = "";

                //value clear
                document.getElementById("name").value = "";
                document.getElementById("email").value = "";
                document.getElementById("mobile").value = "";
                document.getElementById("password").value = "";
                document.getElementById("confirm_password") = "";


                    
                } else {
               
                    if (response.data.errors) {
                        if (response.data.errors.name) {
                            document.getElementById("name_error").innerText = response.data.errors.name[0];
                        }
                        if (response.data.errors.email) {
                            document.getElementById("email_error").innerText = response.data.errors.email[0];
                        }
                        if (response.data.errors.mobile) {
                            document.getElementById("mobile_error").innerText = response.data.errors.mobile[0];
                        }
                        if (response.data.errors.password) {
                            document.getElementById("password_error").innerText = response.data.errors.password[0];
                        }
                    }
                }
            } catch (error) {
                console.error("Error occurred:", error);
            }
        }

        // Email validation function
        // function validateEmail(email) {
        //     let re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        //     return re.test(email);
        // }
    </script>
</body>

</html>
