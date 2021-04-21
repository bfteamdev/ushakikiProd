$(document).ready(function () {
    $('.field-input').focus(function () {
        $(this).parent().addClass('is-focused has-label');
    });

    // à la perte du focus
    $('.field-input').blur(function () {
        if ($(this).val() == '') {
            $(this).parent().removeClass('has-label');
        }
        $(this).parent().removeClass('is-focused');
    });

    // si un champs est rempli on rajoute directement la class has-label
    $('.field-input').each(function () {
        if ($(this).val() != '') {
            $(this).parent().addClass('has-label');
        }
    });
    $('.stepTree').keyup(function () {
        if ($(this).val() == "") {
            $(this).parent().addClass('is-error-focused error');
            submitBtn.disabled = false;
            submitBtn.style.display = "none";
        } else {
            $(this).parent().removeClass('is-error-focused error');
        }
    });
});
