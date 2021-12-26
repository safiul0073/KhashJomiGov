$(document).ready(function(){
	$(window).scroll(function(){
		var scrolValue = $(window).scrollTop();
		if(scrolValue > 155) {
			$('#fixed-header').slideDown(400);
		} else{
			$('#fixed-header').slideUp(400);
		}
	});

	$("#up").on('click',function(e){
		e.preventDefault();
		$('html,body').animate({
			'scrollTop':'0'
		},500);
	});
});






$("#latest-news > span").css("color","white");
$(document).on("click","#checkAll",function(){
    $('.state').prop("checked",'true');
});

$(document).on("click","#uncheckAll",function(){
    $('.state').removeAttr("checked",'false');
});

$(".give_date").on('change',function() {
	$(".take_date").val($(this).val());
});

//$(document).on('change','.s_s',function() {
//	var sem,val;
//	val = $(this).val();
//	sem = $(this).attr('name','sold_brick_cat['+val+']');
//	sem = $(this).closest('tr.s_f_r').find('.s_v').attr('name','sold_brick_qty['+val+']');
//});
//
//$(document).on('change','.s_m',function() {
//	var sem,val;
//	val = $(this).val();
//	sem = $(this).closest('tr.s_f_m').find('.s_m_v').attr('name','mid_fee['+val+']');
//});


var i = 1;
$('#add').on('click',function () {
	i++;
	$('#dynamic-field').append('<tr id="row_sem'+i+'" class="s_f_r"><td><select class="form-control s_s" name="sold_brick_cat[]"><option value="">Category</option><option value="1">1 No</option><option value="2">2 No</option><option value="3">3 No</option><option value="4">Pik</option><option value="5">Adla</option></select></td><td><input type="text" name="sold_brick_qty[]" id="name" class="form-control s_v" placeholder="Quantity"></td><td><button type="button" class="btn btn-danger btn_remove " name="remove" id="'+i+'">x</button></td></tr>');
});

$(document).on('click','.btn_remove',function () {
	var button_id = $(this).attr("id");
	$('#row_sem'+button_id+'').remove();
});

var i = 1;

$('#add1').on('click',function () {
	i++;
	$('#dynamic-field1').append('<tr id="row_mid'+i+'" class="s_f_m"><td><select class="form-control s_m" name="due_brick_cat[]"><option value="">Category</option><option value="1">1 No</option><option value="2">2 No</option><option value="3">3 No</option><option value="4">Pik</option><option value="5">Adla</option></select></td><td><input type="text" name="due_brick_qty[]" id="name" class="form-control s_m_v" placeholder="Quantity"></td><td><input type="text" name="due_brick_date[]" class="form-control datepicker" placeholder="Delivery Date"></td><td><button type="button" class="btn btn-danger btn_remove1" name="remove" id="'+i+'">x</button></td></tr>');
});

$(document).on('click','.btn_remove1',function () {
	var button_id = $(this).attr("id");
	$('#row_mid'+button_id+'').remove();
});





$("#print").click(function(){
	$('.print-hide').hide();
    $("#values").show().printMe();
});

$("#print1").click(function(){
    $("#values1").show().printMe();
});

dycalendar.draw({
    target : "#calender",
    type : "month",
    highlighttoday: true
});