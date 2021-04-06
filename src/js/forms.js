const Forms = {
  init($) {
    var forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach(function (form) {
      form.addEventListener(
        'submit',
        function (event) {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }

          if (form.id === 'sign-up-form') {
            const $passwordError = $(form).find('.invalid-password');
            const pw1 = form.querySelector('#password_1').value;
            const pw2 = form.querySelector('#password_2').value;

            if (pw1 !== pw2) {
              $passwordError
                .removeClass('d-none')
                .parent()
                .attr({
                  valid: 'false',
                  invalid: 'true',
                })
                .addClass('is-invalid')
                .removeClass('is-valid');
              event.preventDefault();
              event.stopPropagation();
            } else {
              $passwordError
                .addClass('d-none')
                .parent()
                .attr({
                  valid: 'true',
                  invalid: 'false',
                })
                .addClass('is-valid')
                .removeClass('is-invalid');
            }
          }

          form.classList.add('was-validated');
        },
        false
      );
    });
  },
};

export default Forms;
