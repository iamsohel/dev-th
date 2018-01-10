var Dev = {};
jQuery(document).ready(function() {
    var id = jQuery(".main_page_content").attr("id");
    //alert(id);
    if (id && id.length > 0)
        Dev[id]();
});
Dev.admin_users_login = function() {

    $('#login-form').validate({
        onkeyup: false,
        onfocusout: false,
        errorElement: 'p',
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            },
            //rpassword: {required: true, equalTo: "#password"},
        },
        messages: {
            email: {
                required: 'Please enter your email address',
                email: 'Please enter a VALID email address'
            },
            password: {
                required: 'Please enter password'
            },
            //rpassword: {required: 'Please enter confirm password'},
        }

    });
}
Dev.admin_users_add = function() {

    $('#add-form').validate({
        onkeyup: false,
        onfocusout: false,
        errorElement: 'p',
        rules: {
            name: {required: true},
            email: {required: true, email: true},
            member_id: {required: true},
            nid: {required: true},
            //rpassword: {required: true, equalTo: "#password"},
        },
        messages: {
            name: {required: 'Please enter Name'},
            email:{required: 'Please enter your email address',email: 'Please enter a VALID email address'},
            member_id: {required: 'Please enter Member Id'},
            nid: {required: 'Please enter NId'},
            //rpassword: {required: 'Please enter confirm password'},
        }
    });
}
Dev.admin_users_profile = function() {

    $('#edit-form').validate({
        onkeyup: false,
        onfocusout: false,
        errorElement: 'p',
        rules: {
            name: {required: true},
            email: {required: true, email: true},
            member_id: {required: true},
            nid: {required: true},
            //rpassword: {required: true, equalTo: "#password"},
        },
        messages: {
            name: {required: 'Please enter Name'},
            email:{required: 'Please enter your email address',email: 'Please enter a VALID email address'},
            member_id: {required: 'Please enter Member Id'},
            nid: {required: 'Please enter NId'},
            //rpassword: {required: 'Please enter confirm password'},
        }
    });
}
Dev.admin_users_cpassword = function() {

    $('#cpassword-form').validate({
        onkeyup: false,
        onfocusout: false,
        errorElement: 'p',
        rules: {
            opassword: {required: true},
            npassword: {required: true},
            cpassword: {required: true, equalTo: "#npassword"},
        },
        messages: {
            opassword: {required: 'Please enter current password'},
            npassword: {required: 'Please enter new password'},
            cpassword: {required: 'Please enter confirm password'},
        }
    });
}

