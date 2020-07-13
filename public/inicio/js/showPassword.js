  /*Show and hide password*/
  const password = document.getElementById('password');
  const password2 = document.getElementById('password2');
  const toggle = document.getElementById('toggle');
  const toggle2 = document.getElementById('toggle2');

  function showHide() {
      if (password.type === 'password') {
          password.setAttribute('type', 'text');
          toggle.classList.add('hide');
      } else {
          password.setAttribute('type', 'password');
          toggle.classList.remove('hide');
      }
  }

  function showHide2() {
      if (password2.type === 'password') {
          password2.setAttribute('type', 'text');
          toggle2.classList.add('hide2');
      } else {
          password2.setAttribute('type', 'password');
          toggle2.classList.remove('hide2');
      }
  }
