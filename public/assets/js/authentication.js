$(document).on("submit", "#kt_sign_in_form", function (e) {
    e.preventDefault();
    var _data = $(this).serialize();
    Authentication();
});
$(document).on("submit", "#kt_remeber_pass_form", function (e) {
    e.preventDefault();
    var _data = $(this).serialize();
    RemeberPassword();
});
$(document).on("submit", "#kt_cambiar_pass_form", function (e) {
    e.preventDefault();
    var _data = $(this).serialize();
    ResetPassword();
});
$("input[name='email']").val(
    localStorage.getItem("email") == null ? "" : localStorage.getItem("email")
);
//$("#remember_password").prop("checked", false);
if (localStorage.getItem("email") != null) {
    //$("#remember_password").prop("checked", true);
}
async function Authentication() {
    var _data = $("#kt_sign_in_form").serialize();
    const data = new FormData();
    data.append("_token", $("input[name='_token']").val());
    data.append("email", $("input[name='email']").val());
    data.append("password", $("input[name='password']").val());
    beforeSendBtnLoad("#kt_sign_in_submit");
    const response = await fetch(APP_URL + "/login", {
        method: "POST",
        body: data,
    })
        .then(async (response) => {
            const rest = await response.json();
            const URL_ANGULAR = APP_ANGULAR_URL + '?token=';

            console.log("Respuesta completa del servidor:", rest);
            const status = rest.status;
            const datos = rest.data;
            if (status) {
                const statusIn = datos.status;
                if (statusIn) {
                    setTimeout(() => {
                        console.log("Redirigiendo a:", URL_ANGULAR + datos.token);
                        location.href = URL_ANGULAR + datos.token;
                    }, 1000);
                    localStorage.removeItem("email");
                    localStorage.removeItem("password");
                    if ($("#remember_password").is(":checked")) {
                        localStorage.setItem("email", $("#email").val());
                    }
                    beforeSendBtnLoad("#kt_sign_in_submit");
                } else {
                    beforeSendBtnLoad("#kt_sign_in_submit", false);
                }
                Toast.fire({
                    icon: datos.icon,
                    title: datos.message,
                });
                return;
            }
            Toast.fire({
                icon: rest.icon,
                title: rest.message,
            });
            beforeSendBtnLoad("#kt_sign_in_submit", false);
        })
        .catch((error) => {
            console.log(error);
            Toast.fire({
                icon: "error",
                title: "Ocurrió un problema en el servidor, inténtelo nuevamente o dentro de un momento.",
            });
            beforeSendBtnLoad("#kt_sign_in_submit", false);
        });
}

var counter = 0;
$(document).on("click", ".cls-view-see-password", function (e) {
    if (counter == 0) {
        $(this).children("p").show();
        $("#password").prop("type", "text");
        counter = 1;
    } else {
        $(this).children("p").hide();
        $("#password").prop("type", "password");
        counter = 0;
    }
    console.log(counter);
});

async function RemeberPassword() {
    var _data = $("#kt_remeber_pass_form").serialize();
    const data = new FormData();
    data.append("_token", $("input[name='_token']").val());
    data.append("email", $("input[name='email_pass']").val());
    beforeSendBtnLoad("#kt_remeber_pass_submit");
    const response = await fetch(APP_URL + "/recordar-contrasena", {
        method: "POST",
        body: data,
    })
        .then(async (response) => {
            const rest = await response.json();
            const status = rest.status;
            const datos = rest.data;
            if (status) {
                const statusIn = datos.status;
                beforeSendBtnLoad("#kt_remeber_pass_submit", false);
                $("#email_pass").val("");
                Toast.fire({
                    icon: datos.icon,
                    title: datos.message,
                });
                return;
            }
            const type = rest.type;
            if (type === "empty") {
                $txtEmpty = "";
                $.each(datos, function (key, value) {
                    $txtEmpty = value;
                });
                Toast.fire({
                    icon: "warning",
                    title: "Campo vacio: " + $txtEmpty,
                });
                beforeSendBtnLoad("#kt_remeber_pass_submit", false);
                return;
            }
            Toast.fire({
                icon: "error",
                title: rest.message,
            });
            beforeSendBtnLoad("#kt_remeber_pass_submit", false);
        })
        .catch((error) => {
            console.log(error);
            beforeSendBtnLoad("#kt_remeber_pass_submit", false);
        });
}

async function ResetPassword() {
    var _data = $("#kt_cambiar_pass_form").serialize();
    const data = new FormData();
    data.append("_token", $("input[name='_token']").val());
    data.append("token_2", $("input[name='token_2']").val());
    data.append("email_cambiar", $("input[name='email_cambiar']").val());
    data.append("password_cambiar", $("input[name='password_cambiar']").val());
    data.append("password_confirm", $("input[name='password_confirm']").val());
    beforeSendBtnLoad("#kt_cambiar_pass_submit");
    const response = await fetch(APP_URL + "/reset-contrasena", {
        method: "POST",
        body: data,
    })
        .then(async (response) => {
            const rest = await response.json();
            const status = rest.status;
            const datos = rest.data;
            const icon = rest.icon;
            const type = rest.type;
            if (status) {
                const statusIn = datos.status;
                if (statusIn) {
                    setTimeout(() => {
                        location.href = APP_URL + "/service/start-service";
                    }, 1000);
                    beforeSendBtnLoad("#kt_cambiar_pass_submit");
                } else {
                    beforeSendBtnLoad("#kt_cambiar_pass_submit", false);
                }

                Toast.fire({
                    icon: datos.icon,
                    title: datos.message,
                });
                return;
            }
            if (type === "empty") {
                $txtEmpty = "";
                $.each(datos, function (key, value) {
                    $txtEmpty = value;
                });
                Toast.fire({
                    icon: "warning",
                    title: "Campo vacio: " + $txtEmpty,
                });
                beforeSendBtnLoad("#kt_cambiar_pass_submit", false);
                return;
            }
            Toast.fire({
                icon: "error",
                title: rest.message,
            });
            beforeSendBtnLoad("#kt_cambiar_pass_submit", false);
        })
        .catch((error) => {
            console.log(error);
            beforeSendBtnLoad("#kt_cambiar_pass_submit", false);
        });
}

