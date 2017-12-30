var Dev = {};
jQuery(document).ready(function () {
    var id = jQuery(".main_page_content").attr("id");
    //alert(id);
    if (id && id.length > 0)
        Dev[id]();
});
Dev.admin_users_login = function () {

    $('#login-form').validate({
        onkeyup: false,
        onfocusout: false,
        errorElement: 'p',
        rules:
                {
                    email: {required: true, email: true},
                    password: {required: true},
                    //rpassword: {required: true, equalTo: "#password"},
                },
        messages:
                {
                    email: {required: 'Please enter your email address', email: 'Please enter a VALID email address'},
                    password: {required: 'Please enter password'},
                    //rpassword: {required: 'Please enter confirm password'},
                }

    });
}
Dev.admin_users_add = function () {

    $('#add-form').validate({
        onkeyup: false,
        onfocusout: false,
        errorElement: 'p',
        rules:
                {
                    name: {required: true},
                    email: {required: true, email: true},
                    //rpassword: {required: true, equalTo: "#password"},
                },
        messages:
                {
                    name: {required: 'Please enter Name'},
                    email: {required: 'Please enter your email address', email: 'Please enter a VALID email address'},
                    //rpassword: {required: 'Please enter confirm password'},
                }
    });
}