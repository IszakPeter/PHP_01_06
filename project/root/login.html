<script>
    $("#eye").click(function () {
        $("#password").attr("type", $("#password").attr("type") == 'password' ? 'text' : 'password');
        $("#eye").toggleClass('fa-eye-slash')
    })
    var capsAlertShow = true
    $(document).mousedown(capslocState)
    $(document).keydown(capslocState)
    function capslocState(k) {
        let state = k.originalEvent.getModifierState('CapsLock');
        if (!state && !capsAlertShow) {
            capsAlertShow = true
        }
        if (capsAlertShow && state) {
            capsAlertShow = false
            $("#alert-box").PopUpAlert({ header: "CapsLock", message: "Be van kapcsolva a CapsLock", type: "warning" })
        }
    }
    $("#login_btn").click(function () {
        $.ajax({
            url: "/project/api/login.php",
            method: "POST",
            timeout: 0,
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            data: $("#login_form").serialize(),
            success: function (response) {
                response=JSON.parse(response)
                console.warn(response); 
                if (response)
                    if (response.name) {
                        $("#user").html("<i class='fa fa-user'></i> "+response.name)
                        $("#content").html( `<div id="content-left" class="col-6"></div><div id="content-right" class="col-6"></div>`)
                        if(req)
                            $("#content-left").load(req)
                    }
                    else $("#alert-box").PopUpAlert(response)
                else $("#alert-box").PopUpAlert(response)
            }
        })
    })
</script>

    <form id="login_form" class="col" autocomplete="off">
        <div class="justify-conten">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="form-group">
                        <label>Felhasználónév</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Felhasználónév">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="form-group">
                        <label>Jelszó</label>
                        <div class="input-group">
                            <input class="form-control " type="password" name="password" id="password" placeholder="Jelszó">
                            <div class="input-group-append">
                                <span class="input-group-text ">
                                    <i class="fa fa-eye" id="eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-4"></div>

                <div class="col-auto">
                    <div class="form-check ">
                        <input type="checkbox" class="form-check-input" name="remember_me" id="remember_me">
                        <label class="form-check-label" for="remember_me">Maradjon bejelentkezve</label>
                    </div>
                </div>

                <div class="col-auto">
                    <input type="button" class="btn  btn-dark" id="login_btn" value="Bejelentkezés" />
                </div>

            </div>
        </div>
    </form>


