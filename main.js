var pwdInput = document.getElementById('password');

var btnSubmit = document.getElementById('btnsubmit');

pwdInput.addEventListener('input', function() {

  var pwlevel = document.getElementById('pwlevel');

  var minLengthPattern = new RegExp("(?=.{6,}).*", "g");

  var mediumPattern = new RegExp("^(?=.{6,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");

  var strongPattern = new RegExp("^(?=.{6,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");

  var password = document.getElementById("password");


  if (password.value.length == 0) {


    pwlevel.innerHTML = 'Please enter password';

    btnSubmit.disabled = true;

  } else if (false == minLengthPattern.test(password.value)) {

    pwlevel.innerHTML = 'Password must be at least 6 characters.  Not strong engough!';

    btnSubmit.disabled = true;

  } else if (strongPattern.test(password.value)) {

    pwlevel.innerHTML = '<p style="color:green">Your password is strong engough to submit!</p>';

    btnSubmit.disabled = false;

  } else if (mediumPattern.test(password.value)) {

    pwlevel.innerHTML = 'This password is medium! Not strong engough!';


    btnSubmit.disabled = true;
  } else {

    pwlevel.innerHTML = 'This password is week!';


    btnSubmit.disabled = true;
  }
});
