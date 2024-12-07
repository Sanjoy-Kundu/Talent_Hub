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
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back! TalentHub</h1>
                                    </div>
                                    <section class="">
                                        <div class="form-group">
                                            <label for="name">Email address</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                aria-describedby="name" placeholder="Enter your name">
                                            <small id="name" class="form-text text-danger">error message</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                aria-describedby="email" placeholder="Enter your email">
                                            <small id="email" class="form-text  text-danger">error message</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input type="tel" class="form-control" id="mobile" name="mobile"
                                                aria-describedby="mobile" placeholder="018XXXXXXXX">
                                            <small id="mobile" class="form-text  text-danger">error message</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control myPassword" id="password"
                                                name="password" aria-describedby="password"
                                                placeholder="Enter your password">
                                            <input type="checkbox" onclick="togglePassword('password')">Show Password
                                            <small id="password"
                                                class="form-text text-danger passowrdAndConfrimPasswordError"></small>
                                        </div>

                                        <div class="form-group">
                                            <label for="confirm_password">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm_password"
                                                aria-describedby="confirm_password"
                                                placeholder="Enter your confirm password">
                                            <input type="checkbox" onclick="togglePassword('confirm_password')">Show
                                            Password
                                            <small id="confirm_password" class="form-text text-danger">error
                                                message</small>
                                        </div>

                                        <button class="btn btn-primary w-100">Login</button>

                                        {{-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a> --}}
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

       
    
    </script>
