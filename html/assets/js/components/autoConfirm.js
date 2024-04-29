
// document.addEventListener('contextmenu', (event) => event.preventDefault());

// document.onkeydown = function (e) {
// 	// disable F12 key
// 	if (e.keyCode == 123) {
// 		return false;
// 	}

// 	// disable I key
// 	if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
// 		return false;
// 	}

// 	// disable J key
// 	if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
// 		return false;
// 	}

// 	// disable U key
// 	if (e.ctrlKey && e.keyCode == 85) {
// 		return false;
// 	}
// };

/*--------------------------------------------
	グローバル関数設定
--------------------------------------------*/
var d = document;
var dE = d.documentElement;
var jsdefaultpath = '';
var debugflg = false;

var txtName_preview = '';
var txtName_kana_preview = '';
var txtCompany_preview = '';
var txtEmail_preview = '';
var txtTel_preview = '';
var txtComment_preview = '';

var estimate_timeHT = '';
var estimate_dateText = '';
var estimate_txtFile = '';
var estimate_txtName = '';
var estimate_txtName_kana = '';
var estimate_txtCompany = '';
var estimate_txtDepartment = '';
var estimate_txtZipcode = '';
var estimate_Prefectures = '';
var estimate_txtCity = '';
var estimate_txtBuilding = '';
var estimate_telephone = '';
var estimate_txtFax = '';
var estimate_txtTel = '';
var estimate_txtRequests = '';

function ConfirmClick_Contact() {
	var rc = contact_frm_submit();
	if (rc == false) {
		return false;
	}
	dataFrom();
	fromContact();
	InputDataCopy01();
	$('.contact-title').toggleClass('hide');
	$('.contact-btn').toggleClass('hide');
	$('#contact_check').css('display', 'none');
	$('#mail-btn').css('display', 'block');
	return false;
}
String.prototype.trim = function () {
	return this.replace(/^[ 　]*/gim, '').replace(/[ 　]*$/gim, '');
};
function fromContact() {
	$('#contact_frm_confilm').html(
		'<div id="mail_preview"><table id="tbl-contact" class="mb20 formTable frm-tbl frm-tbl--v3"><tr><th>ho va ten<span class="txt--red"> *</span></th><td><div id="txtName_preview"></div></td></tr><tr><th>Email<span class="txt--red"> *</span></th><td class="input"><div id="txtEmail_preview"></div></td></tr><tr><th>sodienthoai</th><td><div id="txtTel_preview"></div></td></tr><tr><th class="w100">yeu cau<span class="txt--red"> *</span></th><td><div id="txtComment_preview" class="txt-area"></div></td></tr><tr><th></th><td></td></tr></table><div class="hide-input"><input type="hidden" name="txtName" id="txtName"><input type="hidden" name="txtEmail" id="txtEmail"><input type="hidden" name="txtTel" id="txtTel"><input type="hidden" name="txtComment" id="txtComment"><input type="hidden" name="mailform_token" id="mailform_token"><input type="hidden" id="mailform_js" name="mailform_js" value="false"></div></div>',
	);
}
function fromPreviewContact() {
	$('#contact_frm_confilm').html(
		'<div id="mail_input"><table class="mb20 frm-tbl--v2"><tr><th>ho vaten<span class="txt--red"> *</span></th><td><input size="20"type="text"name="txtName"id="txtName"class="frm-base-input js_validate"/><p class="error_message" id="error_txtName"></p></td></tr><tr><th>email<span class="txt--red"> *</span></th><td><input size="30"type="text"name="txtEmail"id="txtEmail"class="frm-base-input js_validate"/><br /><p class="error_message" id="error_txtEmail"></p></td></tr><tr><th>xac nhan lai email<span class="txt--red"> *</span></th><td><div id="box_emailconfirm"><input size="30"type="text"name="txtEmail_confirm"id="txtEmail_confirm"class="frm-base-input js_validate"/><p class="error_message" id="error_txtEmail_confirm"></p></div></td></tr><tr><th>so dien thoai</th><td><input size="30"type="text"name="txtTel"id="txtTel"class="frm-base-input js_validate"/><p class="error_message" id="error_txtTel"></p></td></tr><tr><th>yeu cau cua khach hang<span class="txt--red"> *</span></th><td><textarea name="txtComment"id="txtComment"cols="50"rows="5"class="frm-base-input frm-base-textarea js_validate"></textarea><p class="error_message" id="error_txtComment"></p></td></tr></table></div>',
	);
}
function dataFrom() {
	txtName_preview = document.getElementById('txtName').value;
	txtEmail_preview = document.getElementById('txtEmail').value;
	txtTel_preview = document.getElementById('txtTel').value;
	txtComment_preview = document.getElementById('txtComment').value;

	mailform_token = document.getElementById('mailform_token').value;
	console.log(txtName_preview);
	console.log(txtEmail_preview);
	console.log(txtTel_preview);
	console.log(mailform_token);
	mailform_js = document.getElementById('mailform_js').value;
}
function InputDataCopy01() {
	document.getElementById('txtName_preview').innerHTML = txtName_preview;
	document.getElementById('txtEmail_preview').innerHTML = txtEmail_preview;
	document.getElementById('txtTel_preview').innerHTML = txtTel_preview;
	document.getElementById('txtComment_preview').innerHTML = txtComment_preview;

	document.getElementById('txtName').value = txtName_preview;
	document.getElementById('txtEmail').value = txtEmail_preview;
	document.getElementById('txtTel').value = txtTel_preview;
	document.getElementById('txtComment').value = txtComment_preview;

	document.getElementById('mailform_token').value = mailform_token;
	document.getElementById('mailform_js').value = mailform_js;
}
function InputDataCopy02() {
	document.getElementById('txtName').value = txtName_preview;
	document.getElementById('txtEmail').value = txtEmail_preview;
	document.getElementById('txtEmail_confirm').value = txtEmail_preview;
	document.getElementById('txtTel').value = txtTel_preview;
	document.getElementById('txtComment').innerHTML = txtComment_preview;

	document.getElementById('mailform_js').value = mailform_js;
}



function DisplayInput() {
	fromPreviewContact();
	InputDataCopy02();
	$('.contact-title').toggleClass('hide');
	$('.contact-btn').toggleClass('hide');
	$('#contact_check').css('display', 'block');
	$('#mail-btn').css('display', 'none');
	return false;
}

function EscapeHTML(_strTarget) {
	var div = document.createElement('div');
	var text = document.createTextNode('');
	div.appendChild(text);
	text.data = _strTarget;
	return div.innerHTML;
}
String.prototype.trim = function () {
	return this.replace(/^[ 　]*/gim, '').replace(/[ 　]*$/gim, '');
};

// 確認画面表示
function DisplayConfirmation() {
	document.getElementById('mail_input').style.display = 'none';
	document.getElementById('mail_preview').style.display = '';
	window.scrollTo(0, 0);
}

// 入力画面表示
function EscapeHTML(_strTarget) {
	var div = document.createElement('div');
	var text = document.createTextNode('');
	div.appendChild(text);
	text.data = _strTarget;
	return div.innerHTML;
}

function EscapeSpanHTML(_strTarget) {
	var div = document.createElement('span');
	var text = document.createTextNode('');
	div.appendChild(text);
	text.data = _strTarget;
	return div.innerHTML;
}


var $name = {};
$name['txtName'] = 'Họ Và Tên';
$name['txtEmail'] = 'Emai';
$name['txtEmail_confirm'] = 'Xác Nhận lại Email';
$name['txtTel'] = 'Số Điện Thoại';
$name['txtComment'] = 'Yêu Cầu';
$name['txtRequests'] = 'Yêu Cầu';

var $ERROR = {};
$ERROR['require'] = 'Vui lòng nhập ';;
$ERROR['select'] = 'を選択してください。';
$ERROR['format'] = ' định dạng sai';
$ERROR['email_confirm'] = ' không đúng';
$ERROR['maxlength_7'] = 'は7文字以内で入力してください。';
$ERROR['maxlength_15'] = 'は15文字以内で入力してください。';
$ERROR['maxlength_50'] = 'は50文字以内で入力してください。';
$ERROR['maxlength_100'] = 'は100文字以内で入力してください。';
$ERROR['maxlength_200'] = 'は200文字以内で入力してください。';
$ERROR['maxlength_254'] = 'は254文字以内で入力してください。';
$ERROR['maxlength_1000'] = ' Nhập Không quá 1000 từ';

function isZenKatakana(str) {
	str = str == null ? '' : str;
	if (str.match(/^[ァ-ヶー　]+$/)) {
		//"ー"の後ろの文字は全角スペースです。
		return true;
	} else {
		return false;
	}
}

function validateEmail(email) {
	email = email == null ? '' : email;
	var re =
		/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(String(email).toLowerCase());
}

function isNumber(int) {
	int = int == null ? '' : int;
	if (int.match(/^[0-9]+$/)) {
		return true;
	} else {
		return false;
	}
}



function hankaku2Zenkaku(str) {
	str = str == null ? '' : str;
	return str.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function (s) {
		return String.fromCharCode(s.charCodeAt(0) - 0xfee0);
	});
}

function isZenSpace(str) {
	str = str == null ? '' : str;
	if (str.match(/^\s+/)) {
		return true;
	} else {
		return false;
	}
}

function isString(str) {
	str = str == null ? '' : str;
	if (str.match(/^[A-Za-z0-9Ａ-Ｚａ-ｚ０-９]+$/)) {
		return true;
	} else {
		return false;
	}
}

function isAlphabet(str) {
	str = str == null ? '' : str;
	if (str.match(/^[A-Za-zＡ-Ｚａ-ｚ]+$/)) {
		return true;
	} else {
		return false;
	}
}

// function isJapanese(str) {
// 	str = str == null ? '' : str;
// 	if (str.match(/[一-龠]+|[ぁ-ゔ]+|[ァ-ヴー]+[々〆〤]+/)) {
// 		return true;
// 	} else {
// 		return false;
// 	}
// }

function checkAlphabet(str) {
	str = str == null ? '' : str;
	const myArray = str.split('');
	for (var j = 0; j < myArray.length; j++) {
		if (isString(myArray[j])) {
			return true;
		}
	}
}


function regexNotNumber(str) {
	str = str == null ? '' : str;
	if (str.match(/^([^0-9]*)$/)) {
		return true;
	} else {
		return false;
	}
}
// txtName regex
function txtName() {
	var txtName = trim(document.getElementById('txtName').value);
	var get_txtName = document.getElementById('txtName').value;
	var error_txtName = document.getElementById('error_txtName');

	if (txtName == '' || txtName == null) {
		error_txtName.innerHTML = $ERROR['require'] + $name['txtName'];
		return false;
	} else if (!regexNotNumber(get_txtName) || isZenSpace(get_txtName)) {
		error_txtName.innerHTML = "một giá trị không hợp lệ đã được nhập";
		return false;
	} else if (txtName.length > 50) {
		error_txtName.innerHTML = $name['txtName'] + $ERROR['maxlength_50'];
		return false;
	} else {
		error_txtName.innerHTML = '';
	}
}

// txtEmail
function txtEmail() {
	var txtEmail = trim(document.getElementById('txtEmail').value);
	var error_txtEmail = document.getElementById('error_txtEmail');
	if (txtEmail == '' || txtEmail == null) {
		error_txtEmail.innerHTML = $name['txtEmail'] + $ERROR['require'];
		return false;
	} else if (!validateEmail(txtEmail)) {
		error_txtEmail.innerHTML = $name['txtEmail'] + 'Không hợp lệ';
		return false;
	} else if (txtEmail.length > 254) {
		error_txtEmail.innerHTML = $name['txtEmail'] + $ERROR['maxlength_254'];
		return false;
	} else {
		error_txtEmail.innerHTML = '';
	}
}

// txtEmail_confirm
function txtEmail_confirm() {
	var txtEmail = trim(document.getElementById('txtEmail').value);
	var txtEmail_confirm = trim(document.getElementById('txtEmail_confirm').value);
	var error_txtEmail_confirm = document.getElementById('error_txtEmail_confirm');
	if (txtEmail_confirm == '' || txtEmail_confirm == null) {
		error_txtEmail_confirm.innerHTML = $name['txtEmail_confirm'] + $ERROR['require'];
		return false;
	} else if (txtEmail != txtEmail_confirm) {
		error_txtEmail_confirm.innerHTML = $name['txtEmail_confirm'] + $ERROR['email_confirm'];
		return false;
	} else {
		error_txtEmail_confirm.innerHTML = '';
	}
}

// company_name
function company_name() {
	var company_name = trim(document.estimate_frm.company_name.value);
	var error_company_name = document.getElementById('error_company_name');
	if (company_name == '' || company_name == null) {
		error_company_name.innerHTML = $name['company_name'] + $ERROR['require'];
		return false;
	} else if (company_name.length > 50) {
		error_company_name.innerHTML = $name['company_name'] + $ERROR['maxlength_50'];
		return false;
	} else {
		error_company_name.innerHTML = '';
	}
}

// txtDepartment
function txtDepartment() {
	var txtDepartment = trim(document.estimate_frm.txtDepartment.value);
	var error_txtDepartment = document.getElementById('error_txtDepartment');
	if (txtDepartment == '' || txtDepartment == null) {
		return true;
	} else if (txtDepartment.length > 50) {
		error_txtDepartment.innerHTML = $name['txtDepartment'] + $ERROR['maxlength_50'];
		return false;
	} else {
		error_txtDepartment.innerHTML = '';
	}
}

// Prefectures
function Prefectures() {
	var prefectures = trim(document.estimate_frm.Prefectures.value);
	var error_Prefectures = document.getElementById('error_Prefectures');
	if (prefectures == '-1') {
		error_Prefectures.innerHTML = $name['Prefectures'] + $ERROR['select'];
		return false;
	} else {
		error_Prefectures.innerHTML = '';
	}
}


// telephone
function telephone() {
	var telephone = trim(document.estimate_frm.telephone.value);
	var error_telephone = document.getElementById('error_telephone');
	if (telephone == '' || telephone == null) {
		error_telephone.innerHTML = $name['txtTel'] + $ERROR['require'];
		return false;
	} else if (!isNumber(telephone)) {
		error_telephone.innerHTML = $name['txtTel'] + $ERROR['format'];
		return false;
	} else if (telephone.length > 15) {
		error_telephone.innerHTML = $name['txtTel'] + $ERROR['maxlength_15'];
		return false;
	} else {
		error_telephone.innerHTML = '';
	}
}

// txtRequests
function txtRequests() {
	var txtRequests = trim(document.estimate_frm.txtRequests.value);
	var error_txtRequests = document.getElementById('error_txtRequests');
	if (txtRequests == '' || txtRequests == null) {
		return true;
	} else if (txtRequests.length > 1000) {
		error_txtRequests.innerHTML = $name['txtRequests'] + $ERROR['maxlength_1000'];
		return false;
	} else {
		error_txtRequests.innerHTML = '';
	}
}

// txtTel
function txtTel() {
	var txtTel = trim(document.contact_frm.txtTel.value);
	var error_txtTel = document.getElementById('error_txtTel');
	if (txtTel == '' || txtTel == null) {
		return true;
	} else if (!isNumber(txtTel)) {
		error_txtTel.innerHTML = $name['txtTel'] + $ERROR['format'];
		return false;
	} else if (txtTel.length > 15) {
		error_txtTel.innerHTML = $name['txtTel'] + $ERROR['maxlength_15'];
		return false;
	} else {
		error_txtTel.innerHTML = '';
	}
}

// txtComment
function txtComment() {
	var txtComment = trim(document.contact_frm.txtComment.value);
	var error_txtComment = document.getElementById('error_txtComment');
	if (txtComment == '' || txtComment == null) {
		error_txtComment.innerHTML = $name['txtComment'] + $ERROR['require'];
		return false;
	} else if (txtComment.length > 1000) {
		error_txtComment.innerHTML = $name['txtComment'] + $ERROR['maxlength_1000'];
		return false;
	} else {
		error_txtComment.innerHTML = '';
	}
}

function contact_frm_submit() {
	var error_key = '';
	var check = {};
	check['txtName'] = txtName();
	check['txtEmail'] = txtEmail();
	check['txtEmail_confirm'] = txtEmail_confirm();
	check['txtTel'] = txtTel();
	check['txtComment'] = txtComment();
	for (var key in check) {
		if (check[key] == false) {
			error_key = key;
			return false;
			break;
		}
	}

	return true;
}

function trim(str) {
	if (!str || typeof str != 'string') return null;
	return str
		.replace(/^[\s]+/, '')
		.replace(/[\s]+$/, '')
		.replace(/[\s]{2,}/, ' ');
}

function forEach(arr, callback, scope) {
	for (var i = 0, l = arr.length; i < l; i++) {
		callback.call(scope, arr[i], i);
	}
}

var classListSupport = 'classList' in document.createElement('_');

var hasClass = classListSupport
	? function (el, str) {
		return el.classList.contains(str);
	}
	: function (el, str) {
		return el.className.indexOf(str) >= 0;
	};

var addClass = classListSupport
	? function (el, str) {
		if (!hasClass(el, str)) {
			el.classList.add(str);
		}
	}
	: function (el, str) {
		if (!hasClass(el, str)) {
			el.className += ' ' + str;
		}
	};

window.onload = function () {
	window.addEventListener(
		'keydown',
		function (e) {
			if (e.keyIdentifier == 'U+000A' || e.keyIdentifier == 'Enter' || e.keyCode == 13) {
				if (e.target.nodeName == 'INPUT' && e.target.type == 'text') {
					e.preventDefault();
					return false;
				}
			}
		},
		true,
	);

	var allInput = document.querySelectorAll('.js_validate');
	forEach(allInput, function (elem) {
		var checkValue = elem.getAttribute('name');
		var timer = false;
		if (window[checkValue] != undefined) {
			elem.addEventListener('input', function () {
				if (timer) clearTimeout(timer);
				timer = setTimeout(function () {
					if (elem.value.length > 0 || hasClass(elem, 'keydowned')) {
						window[checkValue]();
						addClass(elem, 'keydowned');
					}
				}, 200);
			});
		}
	});
};
