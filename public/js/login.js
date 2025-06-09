document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordInput = document.getElementById('password');
    const type = passwordInput.getAttribute('type');
    
    if (type === 'password') {
        passwordInput.setAttribute('type', 'text');
        this.textContent = '🙉';
    } else {
        passwordInput.setAttribute('type', 'password');
        this.textContent = '🙈';
    }
});


