function sorting(category, type) {
    $.get({
        url: "/sorting",
        data: {
            category: category,
            type: type,
        },
        success: (res) => {
            $("div#items").html(res);
            console.log(res);
        },
        error: (res) => {
            console.log(res);
        },
    });
}
function formAction(form, action) {
    action.preventDefault();

    let idForm = $(form).attr("id");

    $.post({
        url: $(form).attr("action"),
        data: $(form).serialize(),
        success: (res) => {
            if (res.success == "success") {
                window.location.href = "/";
            }
        },
        error: (res) => {
            $("form#" + idForm + " div.invalid-feedback").text("");
            $("form#" + idForm + " input").removeClass("is-invalid");
            $.each(res.responseJSON, (index, value) => {
                $("form#" + idForm + " div#" + index + "Error").text(value);
                $("form#" + idForm + " input#" + index + "Input").addClass(
                    "is-invalid"
                );
            });
        },
    });
}
function login1(form, action1) {
    action1.preventDefault();

    let idForm = $(form).attr("id");
    $.post({
        url: $(form).attr("action"),
        data: $(form).serialize(),
        success: (res) => {
            if (res.success == "success") {
                window.location.href = "/profile";
            }
            if (res.success == "admin") {
                window.location.href = "/admin";
            }
            console.log(res);
        },
        error: (res) => {
            if (res.responseJSON["error"] == "error") {
                $("form#" + idForm + " input").addClass("is-invalid");
                $("form#" + idForm + " div#login1Error").text("");
                $("form#" + idForm + " div#password1Error").text("Неверный логин или пароль");
            } else {
                $("form#" + idForm + " div.invalid-feedback").text("");
                $("form#" + idForm + " input").removeClass("is-invalid");
                $.each(res.responseJSON, (index, value) => {
                    $("form#" + idForm + " div#" + index + "Error").text(value);
                    $("form#" + idForm + " input#" + index + "Input").addClass("is-invalid");
                });
            }
        }
    });
}
// function login(t, el) {
//     el.preventDefault();
//     let formId = $(t).attr('id');

//     $.ajax({
//         url: $(t).attr('action'),
//         type: $(t).attr('method'),
//         contentType: false,
//         processData: false,
//         data: new FormData(t),
//         success: function (res) {
//             console.log(res);
//             if (res.success == 'success') {
//                 window.location.href = '/';
//             }
//             console.log(res);
//         }, error:(res)=>{
//             $('form#' + Formid + ' div.invalid-feedback').text('');
//             $('form#' + Formid + ' input').removeClass('is-invalid');
//             $.each(res.responseJSON, (index, value) => {
//                 $('form#' + Formid + ' div#' + index + 'Error').text(value);
//                 $('form#' + Formid + ' input#' + index + 'Input').addClass('is-invalid');
//             })
//         }
//     })
// }
