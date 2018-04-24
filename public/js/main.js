/* Filters */
$('body').on('change', '.w_sidebar input', function(){
    var checked = $('.w_sidebar input:checked'),
        data = '';
    checked.each(function () {
        data += this.value + ',';
    });
    if(data){
        $.ajax({
            url: location.href,
            data: {filter: data},
            type: 'GET',
            beforeSend: function(){
                $('#spinner').fadeIn(200, function(){
                    $('.product-one').hide();
                });
            },
            success: function(res){
                $('#spinner').delay(300).fadeOut('slow', function(){
                    $('.product-one').html(res).fadeIn();
                    var url = location.search.replace(/filter(.+?)(&|$)/g, ''); //$2
                    var newURL = location.pathname + url + (location.search ? "&" : "?") + "filter=" + data;
                    newURL = newURL.replace('&&', '&');
                    newURL = newURL.replace('?&', '?');
                    history.pushState({}, '', newURL);
                });
            },
            error: function () {
                showAlert('Ошибка!');
            }
        });
    }else{
        window.location = location.pathname;
    }
});

/* Search */
var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: path + '/search/typeahead?query=%QUERY'
    }
});

products.initialize();

$("#typeahead").typeahead({
    // hint: false,
    highlight: true
},{
    name: 'products',
    display: 'title',
    limit: 10,
    source: products
});

$('#typeahead').bind('typeahead:select', function(ev, suggestion) {
    // console.log(suggestion);
    window.location = path + '/search/?s=' + encodeURIComponent(suggestion.title);
});

/*Cart*/
$('body').on('click', '.add-to-cart-link', function(e){
     e.preventDefault();
     var id = $(this).data('id'),
         qty = $('.quantity input').val() ? $('.quantity input').val() : 1,
         mod = $('.available select').val();
     $.ajax({
         url: '/cart/add',
         data: {id: id, qty: qty, mod: mod},
         type: 'GET',
		 beforeSend: function(){
			$("#spinner").fadeIn(200);
		 },
         success: function(res){
			$("#spinner").css('display', 'none');
            showCart(res);
         },
         error: function(){
			$("#spinner").css('display', 'none');
            showAlert('Возможно такого товара нет!');
         }
     });
});

$('#cart .modal-body').on('click', '.del-item', function(){
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        beforeSend: function(){
			$("#spinner").fadeIn(200);
		 },
         success: function(res){
			$("#spinner").css('display', 'none');
            showCart(res);
         },
         error: function(){
			$("#spinner").css('display', 'none');
            showAlert('Ошибка! Попробуйте позже');
        }
    });
});

function showCart(cart){
    if($.trim(cart) == '<h3>Корзина пуста</h3>'){
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'none');
    }else{
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'inline-block');
    }
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
	if($('.cart-sum').text()){
        $('.simpleCart_total').html($('#cart .cart-sum').text());
    }else{
        $('.simpleCart_total').text('Empty Cart');
    }
}

$('.subscribe-form').on('click', '.subscribe-btn', function(e){
    e.preventDefault();
    var email = $('input.subscribe').val();
	var reg = /^[\w\.\d-_]+@[\w\.\d-_]+\.\w{2,4}$/i;
	
	if (!reg.test(email)){
		showAlert('Неверный формат email');
		return;
	}
    $.ajax({
        url: '/subscribe',
        data: {subscribe: email},
        type: 'GET',
		beforeSend: function(){
			$("#spinner").fadeIn(200);
		},
        success: function(res){
			$("#spinner").css('display', 'none');
			if(res.success){
				showAlert(res.success, 'success');
			}else{
				showAlert(res.error, 'error');
			}
        },
        error: function(){
			$("#spinner").css('display', 'none');
            showAlert('Ошибка!');
        }
    });
});

function getCart() {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        beforeSend: function(){
			$("#spinner").fadeIn(200);
		 },
         success: function(res){
			$("#spinner").css('display', 'none');
            showCart(res);
         },
         error: function(){
			$("#spinner").css('display', 'none');
            showAlert('Ошибка! Попробуйте позже');
        }
    });
}

function clearCart() {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        beforeSend: function(){
			$("#spinner").fadeIn(200);
		 },
         success: function(res){
			$("#spinner").css('display', 'none');
            showCart(res);
         },
         error: function(){
			$("#spinner").css('display', 'none');
            showAlert('Ошибка! Попробуйте позже');
        }
    });
}
/*Cart*/

function closeAlert(){
	$(".modal-alert").fadeOut();
}

function showAlert(msg, type = 'error'){
	var color = '';
	$(".modal-alert p").text(msg);
	if(type == 'success'){
		color = '#2E8B57';
		$(".alert-header").css('background', color);
		$(".modal-alert h3").text('Сообщение!');
		$(".alert-body").css('color', color);
	} else{
		color = '#CD5C5C';
		$(".alert-header").css('background', color);
		$(".modal-alert h3").text('Внимание ошибка!');
		$(".alert-body").css('color', color);
	}
	$(".modal-alert").fadeIn();
}


$('#currency').change(function(){
    window.location = 'currency/change?curr=' + $(this).val();
	//console.log($(this).val());
});

$('.available select').on('change', function(){
    var modId = $(this).val(),
        color = $(this).find('option').filter(':selected').data('title'),
        price = $(this).find('option').filter(':selected').data('price'),
        basePrice = $('#base-price').data('base');
    if(price){
        $('#base-price').text(symboleLeft + price + symboleRight);
    }else{
        $('#base-price').text(symboleLeft + basePrice + symboleRight);
    }
});

$(window).load(function(){
	$('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	});
	
	$('.my-slider').unslider({
		autoplay:true,
		arrows: false,
	});

	
});