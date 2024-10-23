$(document).ready(function() {
    $('.image-slider').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: true
    });

    $('#loginForm').submit(function(e) {
        let password = $('#password').val();
        let username = $('#username').val();
        let isValid = true;
        let errors = [];
        
        if(!username || !password) {
            errors.push("Harus terisi");
            isValid = false;
        }
        
        if(password.length < 5) {
            errors.push("Password minimal 5 karakter");
            isValid = false;
        }
        
        if(!/\d/.test(password)) {
            errors.push("Password harus terdiri dari huruf dan angka");
            isValid = false;
        }
        
        if(!isValid) {
            e.preventDefault();
            alert(errors.join("\n"));
        }
    });
});