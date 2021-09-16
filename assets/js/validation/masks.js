$('.number').keyup(function(){
	v = $(this).val();
	v=v.replace(/\D/g,"")
	v=v.replace(/^(\d\d)(\d)/g,"($1) $2")
	v=v.replace(/(\d{5})(\d)/,"$1-$2")
	v = $(this).val(v);
});

$('.cep').keyup(function(){
	v = $(this).val();
	v=v.replace(/\D/g,"")
	v=v.replace(/^(\d\d)(\d)/g,"$1$2")
	v=v.replace(/(\d{5})(\d)/,"$1-$2")
	v = $(this).val(v);
});

$('.rg').keyup(function(){
	v = $(this).val();
	v=v.replace(/\D/g,"")
	v=v.replace(/^(\d\d)(\d)/g,"$1$2")
	v=v.replace(/(\d{2})(\d)/,"$1.$2")
	v=v.replace(/(\d{3})(\d)/,"$1.$2")
	v=v.replace(/(\d{3})(\d)/,"$1-$2")
	v = $(this).val(v);
});

$('.cpf').keyup(function(){
	v = $(this).val();
	v=v.replace(/\D/g,"")
	v=v.replace(/^(\d\d)(\d)/g,"$1$2")
	v=v.replace(/(\d{3})(\d)/,"$1.$2")
	v=v.replace(/(\d{3})(\d)/,"$1.$2")
	v=v.replace(/(\d{3})(\d)/,"$1-$2")
	v = $(this).val(v);
});

$('.cnpj').keyup(function(){
	v = $(this).val();
	v=v.replace(/\D/g,"")
	v=v.replace(/^(\d\d)(\d)/g,"$1$2")
	v=v.replace(/(\d{2})(\d)/,"$1.$2")
	v=v.replace(/(\d{3})(\d)/,"$1.$2")
	v=v.replace(/(\d{3})(\d)/,"$1/$2")
	v=v.replace(/(\d{4})(\d)/,"$1-$2")
	v = $(this).val(v);
});

$('.data').keyup(function(){
	v = $(this).val();
	v=v.replace(/\D/g,"")
	v=v.replace(/^(\d\d)(\d)/g,"$1$2")
	v=v.replace(/(\d{2})(\d)/,"$1/$2")
	v=v.replace(/(\d{2})(\d)/,"$1/$2")
	v = $(this).val(v);
});
