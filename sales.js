$(".add-more").on('click', function() {
  var html = $(".copy").html();
  $(".after-add-more").after(html);
});
$("body").on("click", ".remove", function() {
  $(this).parents(".control-group").remove();
});




$(document).ready(function() {
  $('div.mydiv').on("keyup", 'input[name^="unit_price"]', function(event) {
    var currentRow = $(this).closest('.subdiv');
    var quantity = currentRow.find('input[name^="quantity"]').val();
    var unitprice = currentRow.find('input[name^="unit_price"]').val();

    var total = Number(quantity) * Number(unitprice);
    var total = +currentRow.find('input[name^="total"]').val(total);
    $('#subtotal').val(total);
    var sum = 0;
    $('.total').each(function() {
      sum += Number($(this).val());
    });
    $('#subtotal').val(sum);
    $('#final_total').val(sum);
    var sub_text = $('#subtotal').val();
    var disc = $("#view_discount").val();
    var sub_total = Number(sub_text) - Number(disc);
    $("#final_total").val(sub_total);
  });


  $('div.mydiv').on("keyup", 'input[name^="quantity"]', function(event) {
    var currentRow = $(this).closest('.subdiv');
    var quantity = currentRow.find('input[name^="quantity"]').val();
    var unitprice = currentRow.find('input[name^="unit_price"]').val();

    var total = Number(quantity) * Number(unitprice);
    var total = +currentRow.find('input[name^="total"]').val(total);
    $('#subtotal').val(total);
    var sum = 0;
    $('.total').each(function() {
      sum += Number($(this).val());
    });
    $('#subtotal').val(sum);
    $('#final_total').val(sum);

    var sub_text = $('#subtotal').val();
    var disc = $("#view_discount").val();
    var sub_total = Number(sub_text) - Number(disc);
    $("#final_total").val(sub_total);

    var tot_commi = 0;
  });


  $('form').on("keyup", 'input[name="advanced_amount"]', function(argument) {
    var final_total = $('#final_total').val();
    alert(final_total);
    var advanced_amount = $(this).val();
    alert(advanced_amount);
    if (Number(advanced_amount) > Number(final_total)) {
      alert('Your Amount is greater than:' + final_total);
      $("#advanced_amount").val("");
    } else {
      var cust_amt = Number(final_total) - Number(advanced_amount);
      //alert(cust_amt);
      var cust_pending = $("#pending_amount").val(cust_amt);
    }

  })
});

/*

$('div.mydiv').on("change", 'select[name^="select_services"]', function(event) {
var currentRow = $(this).closest('.subdiv');
var drop_services = $(this).val();
$.ajax({
type: "POST",
url: 'ajax_service.php',
data: {
drop_services: drop_services
},
success: function(data) {
currentRow.find('input[name^="quantity"]').val(1);
currentRow.find('input[name^="unit_price"]').val(data);
var quantity = currentRow.find('input[name^="quantity"]').val();
var unitprice = currentRow.find('input[name^="unit_price"]').val();
var total = parseInt(quantity) * parseInt(unitprice);
currentRow.find('input[name^="total"]').val(total);
var total = +currentRow.find('input[name^="total"]').val(total);
$('#subtotal').val(total);
var sum = 0;
$('.total').each(function() {
if ($(this).val() != '') {
sum += parseInt($(this).val());
}
});
var sub = $('#subtotal').val(sum);
var fsub = $('#final_total').val(sum);
var tot_commi = 0;
}
});
});
/****************************************************/

$('div.mydiv').on("change", 'select[name^="select_services"]', function(event) {
  var currentRow = $(this).closest('.subdiv');
  var drop_services = $(this).val();
  $.ajax({
    type: "POST",
    url: 'ajax_service.php',
    data: {
      drop_services: drop_services
    },
    success: function(data) {
      currentRow.find('input[name^="quantity"]').val(1);
      currentRow.find('input[name^="unit_price"]').val(data);
      var quantity = currentRow.find('input[name^="quantity"]').val();
      var unitprice = currentRow.find('input[name^="unit_price"]').val();
      var total = parseInt(quantity) * parseInt(unitprice);
      currentRow.find('input[name^="total"]').val(total);
      var total = +currentRow.find('input[name^="total"]').val(total);
      $('#subtotal').val(total);
      var sum = 0;
      $('.total').each(function() {
        if ($(this).val() != '') {
          sum += parseInt($(this).val());
        }
      });
      var sub = $('#subtotal').val(sum);
      var fsub = $('#final_total').val(sum);
      var tot_commi = 0;
    }
  });
});
/**************************************************************/
function changeme(a) {
  if (a == 1) {
    document.getElementById('prag1').innerHTML = `
<div class="form-group row col-md-6" id="customer_id">
<label class="col-sm-3 control-label">Customer id</label>
<input type="number" name="customer_id" class="form-control" required>
<input type="hidden" name="customer_name" class="form-control" value="">

</div>
`;
  } else {
    document.getElementById('prag1').innerHTML = `
<div class="form-group row col-md-6">
<label class="col-sm-3 control-label">Customer Name</label>
<input type="text" name="customer_name" class="form-control" required>

</div>
`;
  }
}
/*********************************************************************/
