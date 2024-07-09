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



document.querySelector('.form1').addEventListener('submit', function(event){
	
	event.preventDefault();

	const name = document.querySelector('[name="name"]');
	const email = document.querySelector('[name="email"]');
	const message = document.querySelector('[name="message"]');

	let regex = /^(?!\d)[a-zA-Z0-9]+\@[a-zA-Z0-9]+\.(?!\d)[a-zA-Z0-9]{2,}+(\.(?!\d)[a-zA-Z0-9]{2,})*(\.(?!\d)[a-zA-Z0-9]{2,})*$/;

	let errors = [];

	if (!name.value){
		errors.push("Поле 'Имя' обязательное для заполнения.");
	}

	if (!email.value){
		errors.push("Поле 'Email' обязательное для заполнения.");
	} else if(!regex.test(email.value)){
		errors.push("Поле 'Email' заполнено неверно.");
	}

	if (!message.value.length > 10){
		errors.push("Поле для комментария не должно превышать 10 символов.");
	}

	if(errors.length > 0){
		showErrors(errors);
	} else{
		const form = document.querySelector('.form1');
		form.remove();

		const finalText = document.createElement('p');
		finalText.textContent = "Спасибо за отправку";

		document.body.appendChild(finalText);
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







