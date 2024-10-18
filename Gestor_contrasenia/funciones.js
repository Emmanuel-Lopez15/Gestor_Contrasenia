document.addEventListener("DOMContentLoaded", function() {
    const alertModal = document.getElementById('alertModal');
    if (alertModal && alertModal.querySelector('.alert')) {
        alertModal.style.display = 'flex';
    }

    document.querySelectorAll('.close-modal').forEach(button => {
        button.addEventListener('click', () => {
            alertModal.style.display = 'none';
        });
    });


    const togglePasswordButton = document.querySelector(".toggle-password");
    const passwordField = document.getElementById("password");

    if (togglePasswordButton && passwordField) {
        togglePasswordButton.addEventListener("click", function() {
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        });
    }
});
