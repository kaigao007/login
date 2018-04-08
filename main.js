//
var password = document.getElementById('password');

var strengthbut = document.getElementById('strpw');
strengthbut.disabled = true;
var score = 0;

var strengthindicater = [
  "Worst",
  "Bad",
  "Weak",
  "Good",
  "Strong"
]
password.addEventListener('input', function() {

	
var strength = document.getElementById('strength');
var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
var enoughRegex = new RegExp("(?=.{6,}).*", "g");
var pwd = document.getElementById("password");
if (pwd.value.length==0) {
	strength.innerHTML = 'Type Password';
} else if (false == enoughRegex.test(pwd.value)) {
	strength.innerHTML = 'More Characters';
} else if (strongRegex.test(pwd.value)) {
	strength.innerHTML = '<span style="color:green">Strong!</span>';
	score=4;
} else if (mediumRegex.test(pwd.value)) {
	strength.innerHTML = '<span style="color:orange">Medium!</span>';
} else {
	strength.innerHTML = '<span style="color:red">Weak!</span>';
}
	if(strengthindicater[score]=='Strong'){
		strengthbut.disabled = false;
	}
});