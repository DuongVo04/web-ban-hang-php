<?php include 'app/views/shares/header.php'; ?>

<style>
    /* Background gradient */
    .gradient-custom {
        background: linear-gradient(135deg, #667eea, #764ba2);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Card styling */
    .card {
        border-radius: 1rem;
        background: rgba(0, 0, 0, 0.8);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    /* Input fields */
    .form-control {
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        border: none;
        border-radius: 0.5rem;
        padding: 10px;
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.2);
        box-shadow: none;
        color: #fff;
    }

    /* Labels */
    .form-label {
        color: #ddd;
        font-weight: 500;
    }

    /* Button */
    .btn-outline-light {
        border: 2px solid #fff;
        transition: all 0.3s ease;
    }

    .btn-outline-light:hover {
        background: #fff;
        color: #333;
    }

    /* Social icons */
    .d-flex a {
        transition: all 0.3s ease;
        font-size: 1.5rem;
        margin: 0 10px;
    }

    .d-flex a:hover {
        transform: scale(1.2);
        color: #ddd;
    }

    /* Forgot password link */
    .small a {
        text-decoration: none;
        transition: all 0.3s;
    }

    .small a:hover {
        color: #fff;
        text-decoration: underline;
    }

    /* Register link */
    .fw-bold {
        transition: color 0.3s;
    }

    .fw-bold:hover {
        color: #fff;
        text-decoration: underline;
    }

    #forgot-password-button,
    #signup-button {
        font-size: 1rem;
    }
</style>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form id="login-form">
                            <div class="mb-md-3 mt-md-3 pb-2">
                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>
                                <div class="form-outline form-white mb-4">
                                    <label class="d-flex form-label" for="typeEmailX">UserName</label>
                                    <input type="text" name="username" class="form-control form-controllg" />
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <label class="d-flex form-label" for="typePasswordX">Password</label>
                                    <input type="password" name="password" class="form-control formcontrol-lg" />
                                </div>
                                <p class="small mb-4 pb-lg-2"><a id="forgot-password-button" class="text-white-50"
                                        href="#!">Forgot password?</a></p>
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f falg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google falg"></i></a>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0">Don't have an account? <a href="/account/register" id="signup-button"
                                        class="text-white-50 fw-bold">Sign Up</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById('login-form').addEventListener('submit', function (event) {
        event.preventDefault();
        const formData = new FormData(this);
        const jsonData = {};
        formData.forEach((value, key) => {
            jsonData[key] = value;
        });
        fetch('/account/checkLogin', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
            .then(response => response.json())
            .then(data => {
                if (data.token) {
                    localStorage.setItem('jwtToken', data.token);
                    location.href = '/Product';
                } else {
                    alert('Đăng nhập thất bại');
                }
            });
    });
</script>
<?php include 'app/views/shares/footer.php'; ?>