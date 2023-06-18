/*******************************************************************
 * NAVBAR
 *******************************************************************/

document.addEventListener('DOMContentLoaded', function() {
    var options = ''
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
});

/*******************************************************************
 * FORM VALIDATIONS
 *******************************************************************/
var btn = document.querySelector('#btn_submit');
var form = document.querySelector('#my_form');
var email = document.querySelector('#email').value;

btn.addEventListener("click", (e) => {
    e.preventDefault();
    let pass = $("#pass").val()
    let rePass = $("#re_pass").val()

    if (!validate_passwd(pass)) {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'A senha deve conter 8 caracteres!',
            showConfirmButton: false,
            timer: 1500
        })

        return null
    }

    if (!is_passwd(pass, rePass)) {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'As senhas não conferem!',
            showConfirmButton: false,
            timer: 1500
        })

        return null
    }

    
    form.submit()

})

function is_passwd(pass, rePass) {
    
    return pass != rePass ? null  : true 

}

function validate_passwd(pass) {
    return pass.length < 8 ? false : true;
}
