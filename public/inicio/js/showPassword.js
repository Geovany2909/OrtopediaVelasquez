//Pass1
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');
togglePassword.addEventListener('click', function (e) {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});

//pass 2
const togglePasswordRepet = document.querySelector("#togglePassword1");
const passwordRepet = document.querySelector("#password1");
togglePasswordRepet.addEventListener('click', function(e){
    const typeRepet = passwordRepet.getAttribute('type') === "password" ? "text" : "password";
    passwordRepet.setAttribute("type", typeRepet);
    this.classList.toggle('fa-eye-slash');
});
