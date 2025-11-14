<?php

$page_name = 'เข้าสู่ระบบ';

include_once 'includes/header_login.php';
require_once 'includes/connect_db.php';


?>




<main id="main">



    <!-- ======= Contact Section ======= -->
    <section id="services" class="services services">
        <div class="container" style="margin-bottom: 100px;">

            <div class="row">
                <div class="col-lg-8">
                    <div class="card" style="border-block-color: inherit;opacity: 90%;">

                        <div class="card-body" style="padding: 0.25rem;">

                            <img class="img-fluid" src="imgs/banner.jpg">



                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="icofont-login"></i> <strong>Sign in</strong>
                        </div>
                        <div class="card-body">

                            <form id="formLogin">
                                <!-- <div class="row"> -->
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="ชื่อผู้ใช้งาน" maxlength="50">
                                    <div class="input-group-append">
                                        <div class="input-group-text" style="height: 38px;">
                                            <i class="icofont-user-alt-4"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="password" placeholder="รหัสผ่าน" name="password" maxlength="50">
                                    <div class="input-group-append">
                                        <div class="input-group-text" style="height: 38px;">
                                            <span class="icofont-lock"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-2 d-grid">
                                    <button type="submit" id="submit" name="login" class="btn btn-block btn-primary">
                                        เข้าสู่ระบบ
                                    </button>
                                </div>
                                <!-- <div class="mb-2 d-grid text-center">
                                    - or -
                                    <a href="member-register" type="button" class="btn btn-block btn-light"><i class="fa-solid fa-user-plus"></i> สมัครสมาชิก</a>
                                </div> -->


                                <!-- </div> -->
                                <!-- <hr>
                            <a href="#">คู่มือการใช้งาน</a> -->
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->



<?php
include 'includes/footer_login.php';
?>

<script>
    $(document).ready(function() {
        /** Ajax Submit Login */
        // $("#formLogin").submit(function(e){
        $('#submit').on('click', function(e) {
            e.preventDefault()

            $('#username').removeClass('is-invalid')
            $('#password').removeClass('is-invalid')


            var username = $('#username').val();
            var password = $('#password').val();

            if (username == '') {
                $('#username').addClass('is-invalid')
                $('#username').focus();
                toastr.error('ระบุชื่อผู้ใช้งาน', toastr.options = {
                    "closeButton": true,
                    "timeOut": "3000"
                })
            } else if (password == '') {
                $('#password').addClass('is-invalid')
                $('#password').focus();
                toastr.error('ระบุหัสผ่าน', toastr.options = {
                    "closeButton": true,
                    "timeOut": "3000"
                })
            } else {
                document.getElementById("submit").disabled = true;
                document.getElementById("submit").innerHTML = '<i class="fas fa-sync fa-spin  fa-fw" aria-hidden="true"></i> เข้าสู่ระบบ';

                $.ajax({
                    method: "POST",
                    url: "services/login_ck.php",
                    data: {
                        username: username,
                        password: password
                    }
                }).done(function(response) {
                    // console.log(response)
                    if (response.status == 'true' && response.utype == 1) {

                        location.href = 'admin/';

                    } else if (response.status == 'true' && response.utype == 2) {

                        location.href = 'member/';
                    } else if (response.status == 'true' && response.utype == 3) {

                        location.href = 'admin/';

                    } else {
                        document.getElementById("submit").disabled = false;
                        document.getElementById("submit").innerHTML = "เข้าสู่ระบบ";

                        Swal.fire({
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            icon: 'error',
                            title: 'Error!',
                            text: "ชื่อผู้ใช้งาน/รหัสผ่าน ไม่ถูกต้อง",
                            showConfirmButton: true,
                        })
                    }
                }).fail(function(response) {
                    document.getElementById("submit").disabled = false;
                    document.getElementById("submit").innerHTML = "เข้าสู่ระบบ";

                    Swal.fire({
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        icon: 'error',
                        title: 'Error!',
                        text: "ชื่อผู้ใช้งาน/รหัสผ่าน ไม่ถูกต้อง!",
                        showConfirmButton: true,
                    })
                })








            }
        })
    })
</script>