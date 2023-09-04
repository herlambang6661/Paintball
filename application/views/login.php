<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('template/libHeader_login'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.css">

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b class="text-danger">Paint</b>Ball</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" id="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                    <hr>
                    <div id="message"></div>
                    
                </form>
                <!-- <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div> -->
                <!-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> -->
            </div>
        </div>
    </div>
<!-- /.login-box -->
</body>
<?php $this->load->view('template/libFooter_login'); ?>
<script type="text/javascript">
    // Dom elements
    let form = document.querySelector("form");
    let userName = document.querySelector("#username");
    let password = document.querySelector("#password");

    // Event listener to submit form
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        handleInput();
    });

    // What to do with inputs ?
    function handleInput() {
        // Values from dom elements ( input )
        let userNameValue = userName.value.trim();
        let passwordValue = password.value.trim();

        if (userNameValue === "" && passwordValue === "") {
            setErrorFor(userName, "Username harus diisi");
            setErrorFor(password, "Password harus diisi");
        } else if (userNameValue === "") {
            setErrorFor(userName, "Username harus diisi");
            setSuccessFor(password);
        } else if (passwordValue === "") {
            setErrorFor(password, "Password harus diisi");
            setSuccessFor(userName);
        } else {
            setSuccessFor(userName);
            setSuccessFor(password);

            $.ajax({
                url: "<?= base_url() ?>Login/cekLogin",
                type: 'POST',
                data: {
                    "username": userNameValue,
                    "password": passwordValue
                },
                // type: "POST",
                beforeSend: function() {
                    Swal.fire({
                        title: 'Mohon Menunggu',
                        html: '<center><lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_al2qt2jz.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player></center><br><h1 class="h4">Sedang Menyambungkan ke Database</h1>',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    })
                },
                success: function(response) {
                    if (response == "success") {
                        Swal.fire({
                                icon: 'success',
                                title: 'Username & Password Cocok',
                                text: 'Anda akan di arahkan ke Halaman Dashboard',
                                timer: 2000,
                                showCancelButton: false,
                                showConfirmButton: false,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading()
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {
                                        b.textContent = Swal.getTimerLeft()
                                    }, 100)
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                },
                                // html: '<center><img class="img-fluid" src="<?= base_url(); ?>assets/sbadmin2/img/successlogin.gif"  background="transparent" ></img></center><br><h1 class="h4">Anda akan di arahkan ke Halaman Dashboard</h1>',
                                // imageUrl: '<?= base_url(); ?>assets/sbadmin2/img/successlogin.gif',
                                // imageWidth: 400,
                                // imageAlt: 'Error Login',
                            })
                            .then(function() {
                                window.location.href = "<?php echo base_url() ?>Dashboard";
                            });
                    } else if (response == "invalidUser") {
                        Swal.fire({
                                icon: 'error',
                                title: 'Username tidak ditemukan',
                                text: 'pastikan username yang anda masukkan benar',
                                showCancelButton: false,
                                showConfirmButton: true,
                            })
                    } else {
                        Swal.fire({
                            // icon: 'error',
                            title: 'Gagal Masuk',
                            text: 'Username & Password tidak cocok',
                            // imageUrl: '<?= base_url(); ?>assets/sbadmin2/img/depp.gif',
                            html: '<center><lottie-player src="https://assets7.lottiefiles.com/private_files/lf30_GjhcdO.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player></center><br><h1 class="h4">Username & Password tidak cocok</h1>',
                            imageWidth: 400,
                            imageAlt: 'Error Login',
                        });
                    }
                    console.log(response);
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Opps! unable to connect to database',
                        text: 'Please Contact Administrator. Error Code : ' + response.status,
                    });
                    console.log(response);
                }
            });
        }
        //  Checking for username
        // if (userNameValue === "") {
        //     setErrorFor(userName, "Username harus diisi");
        // } else {
        //     setSuccessFor(userName);
        // }

        // // Checking for password
        // if (passwordValue === "") {
        //     setErrorFor(password, "Password harus diisi");
        // } else {
        //     setSuccessFor(password);
        // }
    }

    // If there is some error, than what we want to do with input ?
    function setErrorFor(input, message) {
        $("#message").html('');
        let formControl = input;
        formControl.className = "form-control is-invalid";
                
        // let small = formControl.querySelector("small");
        // small.innerText = message;
        // var pesan = '<div class="alert alert-danger ale alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fas fa-exclamation-circle"></i> '+message+' </div>';
        // document.getElementById('message').innerHTML += pesan;
    }

    // If there is no error, than what we want to do with input ?
    function setSuccessFor(input) {
        let formControl = input;
        formControl.className = "form-control is-valid";
    }
</script>
</html>
