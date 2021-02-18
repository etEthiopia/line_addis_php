$(document).ready(function() {
	var Validation = (function() {
		var nameReg = /(^[A-Za-z]{2,16})([ ]{0,1})([A-Za-z]{2,16})?([ ]{0,1})?([A-Za-z]{2,16})?([ ]{0,1})?([A-Za-z]{2,16})/;
		var emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var digitReg = /^\d+$/;

		var isName = function(value) {
			return nameReg.test(value);
		};

		var isEmail = function(email) {
			return emailReg.test(email);
		};

		var isNumber = function(value) {
			// if (value.toString().length == 10) {
			// 	return digitReg.test(value);
			// } else {
			// 	return false;
			// }
			return true;
		};
		var isRequire = function(value) {
			return value == '';
		};

		var isPassword = function(value) {
			if (value.toString().length < 1) {
				return true;
			} else {
				return value.toString().length >= 8;
			}
		};

		var isCpassword = function(value1, value2) {
			if (value2.toString().length < 1) {
				return true;
			}
			return value1 == value2;
		};

		return {
			isName: isName,
			isEmail: isEmail,
			isNumber: isNumber,
			isRequire: isRequire,
			isPassword: isPassword,
			isCpassword: isCpassword
		};
	})();

	var required = $('form').find('[data-required]');
	var names = $('form').find('[data-name]');
	var numbers = $('form').find('[data-number]');
	var emails = $('form').find('[data-email]');
	var passwords = $('form').find('[data-password]');
	var cpasswords = $('form').find('[data-cpassword]');

	$('#submit').on('click', function(event) {
		var validn = true;

		required.each(function() {
			if (Validation.isRequire($(this).val())) {
				$(this).siblings('small.errorReq').show();
				validn = false;
				event.preventDefault();
			}
		});

		names.each(function() {
			if (!Validation.isName($(this).val())) {
				$(this).siblings('small.errorName').show();
				validn = false;
				event.preventDefault();
			}
		});

		emails.each(function() {
			if (!Validation.isEmail($(this).val())) {
				$(this).siblings('small.errorEmail').show();
				validn = false;

				event.preventDefault();
			}
		});

		numbers.each(function() {
			if (!Validation.isNumber($(this).val())) {
				$(this).siblings('small.errorNum').show();
				validn = false;

				event.preventDefault();
			}
		});

		passwords.each(function() {
			if (!Validation.isPassword($(this).val())) {
				$(this).siblings('small.errorPass').show();
				validn = false;
				event.preventDefault();
			}
		});

		cpasswords.each(function() {
			if (!Validation.isCpassword($(this).val(), passwords.val())) {
				$(this).siblings('small.errorCpass').show();
				validn = false;
				event.preventDefault();
			}
		});
	});

	$('#acceptandregister').on('click', function(event) {
		var validn = true;

		required.each(function() {
			if (Validation.isRequire($(this).val())) {
				$(this).siblings('small.errorReq').show();
				validn = false;
				event.preventDefault();
			}
		});

		names.each(function() {
			if (!Validation.isName($(this).val())) {
				$(this).siblings('small.errorName').show();
				validn = false;
				event.preventDefault();
			}
		});

		emails.each(function() {
			if (!Validation.isEmail($(this).val())) {
				$(this).siblings('small.errorEmail').show();
				validn = false;

				event.preventDefault();
			}
		});

		numbers.each(function() {
			if (!Validation.isNumber($(this).val())) {
				$(this).siblings('small.errorNum').show();
				validn = false;

				event.preventDefault();
			}
		});
		if (validn == false) {
			window.scrollTo(0, document.getElementById('agentregistrationform').offsetTop);
		}
	});

	$('#addstudent').on('click', function(event) {
		var validn = true;
		var required = $('form').find('[data-required]');
		required.each(function() {
			if (Validation.isRequire($(this).val())) {
				$(this).siblings('small.errorReq').show();
				validn = false;
				event.preventDefault();
			}
		});
	});

	required.on('keyup blur', function() {
		if (!Validation.isRequire($(this).val())) {
			$(this).siblings('small.errorReq').hide();
		}
	});

	required.on('keyup blur', function() {
		if (!Validation.isName($(this).val())) {
			$(this).siblings('small.errorName').hide();
		}
	});
	emails.on('keyup blur', function() {
		if (Validation.isEmail($(this).val())) {
			$(this).siblings('small.errorEmail').hide();
		}
	});

	passwords.on('keyup blur', function() {
		if (Validation.isPassword($(this).val())) {
			$(this).siblings('small.errorPass').hide();
		}
	});

	cpasswords.on('keyup blur', function() {
		if (Validation.isCpassword($(this).val(), passwords.val())) {
			$(this).siblings('small.errorCpass').hide();
		}
	});

	numbers.on('keyup blur', function() {
		if (Validation.isNumber($(this).val())) {
			$(this).siblings('small.errorNum').hide();
		}
	});
});

function handleOtherBank(myRadio) {
	if (myRadio.value == 'Other Bank') {
		document.getElementById('otherbanksection').style.display = 'block';
	} else {
		document.getElementById('otherbanksection').style.display = 'none';
	}
}

function addEmployee() {
	var link = document.getElementById('enable_add_employee');
	if (link.innerHTML == 'ADD') {
		document.getElementById('add_employee').style.display = 'block';
		link.innerHTML = 'CANCEL';
	} else {
		document.getElementById('add_employee').style.display = 'none';
		link.innerHTML = 'ADD';
	}
	return false;
}

function togglestatusform() {
	var link = document.getElementById('enable_change_status');
	if (link.innerHTML == 'Change') {
		document.getElementById('change_status').style.display = 'block';
		link.innerHTML = 'Cancel';
	} else {
		document.getElementById('change_status').style.display = 'none';
		link.innerHTML = 'Change';
	}
	return false;
}

function resetpassword() {
	var link = document.getElementById('reset_password_btn');
	if (link.innerHTML == 'Reset Password') {
		document.getElementById('reset_password_container').style.display = 'block';
		link.innerHTML = 'Cancel';
	} else {
		document.getElementById('reset_password_container').style.display = 'none';
		link.innerHTML = 'Reset Password';
	}
	return false;
}

function copyaffiliateFromProfile() {
	var copyText = document.getElementById('affiliate_profile');
	var $temp = $('<input>');
	$('body').append($temp);
	$temp.val($(copyText).text()).select();
	document.execCommand('copy');
	$temp.remove();
	return false;
}

function copyPromoCodeFromProfile() {
	var copyText = document.getElementById('affiliate_promocode');
	var $temp = $('<input>');
	$('body').append($temp);
	$temp.val($(copyText).text()).select();
	document.execCommand('copy');
	$temp.remove();
	return false;
}

function copyaffiliateFromSuccess() {
	var copyText = document.getElementById('affiliate_profile');
	var $temp = $('<input>');
	$('body').append($temp);
	$temp.val($(copyText).text()).select();
	document.execCommand('copy');
	$temp.remove();
	return false;
}

function copyPromoCodeFromSuccess() {
	var copyText = document.getElementById('affiliate_promocode');
	var $temp = $('<input>');
	$('body').append($temp);
	$temp.val($(copyText).text()).select();
	document.execCommand('copy');
	$temp.remove();
	return false;
}

function toTermsandConditions() {
	document.getElementById('step1-43').style.display = 'block';
}

function backtoform() {
	document.getElementById('step1-43').style.display = 'none';
}

function changeOthers() {
	var selected = document.getElementById('infofield').value;
	if (selected == 'A Person') {
		document.getElementById('othersfield').value = '';
		document.getElementById('agentsection').style.display = 'block';
		document.getElementById('otherssection').style.display = 'none';
	} else if (selected == 'Other Way') {
		document.getElementById('agentfield').value = '';
		document.getElementById('otherssection').style.display = 'block';
		document.getElementById('agentsection').style.display = 'none';
	} else {
		document.getElementById('othersfield').value = '';
		document.getElementById('agentfield').value = '';
		document.getElementById('otherssection').style.display = 'none';
		document.getElementById('agentsection').style.display = 'none';
	}
}
