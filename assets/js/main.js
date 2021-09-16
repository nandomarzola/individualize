$(document).ready(function(){

	var altura = $(window).height();
	$('.topo-interna,.topo-busca').height(altura);

	$(window).resize(function() {
		var altura = $(window).height();
		$('.topo-interna,.topo-busca').height(altura);
	});

	$(document).on('click', '.down', function(event){                        
     event.preventDefault();
    var viewportHeight = $(window).height();

     $('html, body').animate({
        scrollTop: viewportHeight,
        complete: function () {
              
         }
    }, 1000);
  });

  $('.down2').bind('click', function(event) {
      var $anchor = $(this);
      $('html, body').stop().animate({
          scrollTop: $('.sobre').offset().top
      }, 1500, 'easeInOutExpo');
  });

	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	});

	$( "#formBusca" ).submit(function( event ) {
		event.preventDefault();
		var busca = $("#formBusca input").val();
		$('.nome-busca').html(busca);
		$.ajax({
			method: "POST",
			data: $('#formBusca').serialize(),
			url: 'functions/busca.php',
			success: function(retorno) {
				$('html, body').animate({ scrollTop: $('#busca').offset().top },500,'linear');
				$('.preencheBusca').html(retorno);
			}
	  	});
	});

  $( "#formBusca-medico" ).submit(function( event ) {
    event.preventDefault();
    var busca = $("#formBusca-medico input").val();
    $('.nome-busca').html(busca);
    $.ajax({
      method: "POST",
      data: $('#formBusca-medico').serialize(),
      url: 'functions/busca-medico.php',
      success: function(retorno) {
        $('html, body').animate({ scrollTop: $('#busca').offset().top },500,'linear');
        $('.preencheBusca').html(retorno);
      }
      });
  });

  $( "#formBusca2" ).submit(function( event ) {
    event.preventDefault();
    var busca = $("#formBusca2 input").val();
    $('.nome-busca').html(busca);
    $.ajax({
      method: "POST",
      data: $('#formBusca2').serialize(),
      url: 'functions/busca.php',
      success: function(retorno) {
        $('.preencheBusca').html(retorno);
      }
      });
  });

  $( "#formBusca2-medico" ).submit(function( event ) {
    event.preventDefault();
    var busca = $("#formBusca2 input").val();
    $('.nome-busca').html(busca);
    $.ajax({
      method: "POST",
      data: $('#formBusca2-medico').serialize(),
      url: 'functions/busca-medico.php',
      success: function(retorno) {
        $('.preencheBusca').html(retorno);
      }
      });
  });

  $( "#formBusca2-glossario" ).submit(function( event ) {
    event.preventDefault();
    var busca = $("#formBusca2-glossario input").val();
    $.ajax({
      method: "POST",
      data: $('#formBusca2-glossario').serialize(),
      url: 'functions/busca-glossario.php',
      success: function(retorno) {
        $('.preencheBusca').html(retorno);
      }
      });
  });


  $( "#formBusca3" ).submit(function( event ) {
    event.preventDefault();
    var busca = $("#formBusca3 input").val();
    $('.nome-busca').html(busca);
    $.ajax({
      method: "POST",
      data: $('#formBusca3').serialize(),
      url: 'functions/busca-categoria.php',
      success: function(retorno) {
        $('.preencheCategoria').html(retorno);
      }
      });
  });

  $( "#formBusca32" ).submit(function( event ) {
    event.preventDefault();
    var busca = $("#formBusca32 input").val();
    $('.nome-busca').html(busca);
    $.ajax({
      method: "POST",
      data: $('#formBusca32').serialize(),
      url: 'functions/busca-categoria2.php',
      success: function(retorno) {
        $('.preencheCategoria').html(retorno);
      }
      });
  });

	$('.slider').owlCarousel({
        items:1,
        loop:false,
        navigation: false,
        dots: false,
        autoplay: false,
        URLhashListener:false,
        startPosition: 'URLHash',
        mouseDrag: false,
        touchDrag: false,
        pullDrag: false,
        freeDrag: false,
        autoHeight:true
    });

    /*$('.menu-items a').click(function() {
        $('.menu-items a').removeClass('active');
        $(this).addClass('active');
    });*/

    $('.topo-gallery').owlCarousel({
        items:1,
        loop:true,
        nav: false,
        dots: true,
        autoplay: true,
    });

    $('.slider-parceiros').owlCarousel({
        items:5,
        loop:true,
        nav: false,
        dots: true,
        autoplay: true,
        margin: 30,
        responsive:{
          200:{
            items:1
          },
          480:{
              items:2
          },
          600:{
              items:5
          }
      }
    });

    //troca parceiro
    $('.abreparceiro').click(function(){
      var nome = $(this).attr('data-nome');
      var texto =  $(this).attr('data-texto');
      var link =  $(this).attr('data-link');
      $("#parceiro .modal-title").html(nome);
      $("#parceiro .modal-body .descricao").html(texto);
      $("#parceiro .modal-body .link").html('<a href="'+link+'" target="_blank">Acessar o site</a>');
    });

});