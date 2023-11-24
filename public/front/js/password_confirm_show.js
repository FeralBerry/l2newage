function show_hide_password(target){
    var input = document.getElementById('password');
    var password_control = document.getElementById('password_control');
    if (input.getAttribute('type') == 'password') {
        target.classList.add('view');
        input.setAttribute('type', 'text');
        password_control.innerHTML = "<span style='color:red'><i class=\"fa fa-eye\"></i></span>";
    } else {
        target.classList.remove('view');
        input.setAttribute('type', 'password');
        password_control.innerHTML = "<span style='color:#5be200'><i class=\"fa fa-eye-slash\"></i></span>";
    }
}
function show_hide_password_confirm(target){
    var input_confirm = document.getElementById('password-confirm');
    var password_confirm_control = document.getElementById('password_confirm_control');
    if (input_confirm.getAttribute('type') == 'password') {
        target.classList.add('view');
        input_confirm.setAttribute('type', 'text');
        password_confirm_control.innerHTML = "<span style='color:red'><i class=\"fa fa-eye\"></i></span>";
    } else {
        target.classList.remove('view');
        input_confirm.setAttribute('type', 'password');
        password_confirm_control.innerHTML = "<span style='color:#5be200'><i class=\"fa fa-eye-slash\"></i></span>";
    }
    return false;
}
