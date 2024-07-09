/*let a = 100;
let b = 62;
let res = a + b;
console.log(res);

const mass = [1, 2, 3];

mass.forEach((el)=>{
	console.log(el);
});

mass.forEach(function(){
	console.log(this);
});

let test = document.querySelectorAll("div");

console.log(test);

test.innerHTML = "new_test";

const btn = document.querySelectorAll(".btn");



btn.forEach((el)=>{
	el.addEventListener("click",(e)=>{
		console.log(e.target.innerHTML);
	});
});
*/


console.log("text");

const form = document.querySelector('.form1');
form.addEventListener('submit', function(event){
	
	event.preventDefault();

	const name = document.querySelector('[name="name"]');
	const email = document.querySelector('[name="email"]');
	const message = document.querySelector('[name="message"]');

	const emailRegex = /^([a-zA-Z]|[0-9])([a-zA-Z]|[0-9]|[\.\_\-])+@([a-zA-Z]|[0-9])+\.[a-zA-Z]+/gm;

	clearErrors();

	let errors = [];

	if (!name.value){
		errors.push("Поле 'Имя' обязательное для заполнения.");
	}

	if (!email.value){
		errors.push("Поле 'Email' обязательное для заполнения.");
	} else if(!emailRegex.test(email.value)){
		errors.push("Поле 'Email' заполнено неверно.");
	}

	if (message.value.length >= 10){
		errors.push("Поле для комментария не должно превышать 10 символов.");
	}

	if(errors.length > 0){
		showErrors(errors);
	} else{
		document.querySelector('.form1').submit();
		document.querySelector('.form1').remove();

		const finalText = document.createElement('p');
		finalText.textContent = "Спасибо за отправку";

		document.body.appendChild(finalText);
		sendMail(name,email,message);
	}
});


function showErrors(errors){
	const errorMessages = document.querySelector('.errorMessages');
	errors.forEach(error => {
		const error_elem = document.createElement('p');
		error_elem.textContent = error;
		errorMessages.appendChild(error_elem);
	})
};

function sendMail(name, email, message) {
	fetch("/mail.php", {
		method: "POST",
		body: JSON.stringify({name: name, email: email, message: message}),
	    headers: {
	        'content-type': 'application/json'
	    	}
		});
}

function clearErrors() {
    const errors = document.querySelectorAll('.error');
    errors.forEach(error => error.remove());
}