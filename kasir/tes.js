$(function(){
  $('#add').click(function(){
    addnewrow();
  });
});

function addnewrow()
{
    var n = ($('.details tr').length - 0) + 1;
    var tr = '<tr>'+
        '<td class="no">' + n + '</td>' +
        '<td><input type="text" name="items[]" id="items_' + n + '" class="form-control items"  autocomplete="off" /></td>' +
        '<td><textarea name="size[]" id="size_' + n + '" class="form-control size" autocomplete="off"></textarea></td>' +
        '<td><input type="text" name="qty[]" id="qty_' + n + '" class="form-control qty" autocomplete="off"/></td>' +
        '<td><input type="text" name="unit[]" id="unit_' + n + '" class="form-control unit" autocomplete="off"/></td>' +
        '<td><input type="text" name="price[]" id="price_' + n + '" class="form-control price" autocomplete="off"/></td>' +
        '<td><input type="text" name="tax[]" id="tax_' + n + '" class="form-control tax"  autocomplete="off" /></td>' +
        '<td><input type="text" name="dis[]" id="dis_' + n + '" class="form-control dis" autocomplete="off" /></td>' +
        '<td><input type="text" name="stkamt[]" id="amt_' + n + '" class="form-control amt" autocomplete="off" /></td>' +
        '<td><button class="btn btn-danger remove">X</button></td>' +
        '</tr>';
    $('.details').append(tr);
};

$('body').delegate('.items', 'blur', function(e) {
    checkitems(e.currentTarget.id.split('_')[1]);   // e.currentTarget.id.split('_')[1] - Target element ID
});

function checkitems(targetID)
{
    var items = $('#items_' + targetID).val();
    if (items != "") {
      $.ajax({
        type: 'post',
        url: 'tes1.php', 
        data: {key: items},
        dataType: 'json',
        success: function(data) {   
        if (data) {
            var tr = $(this).closest('tr'); // here is the code for retrieving the values. i think here i need to make some changes     
            $('#price_' + targetID).val(data.rate);
            $('#size_' + targetID).val(data.des);
            $('#qty_' + targetID).val(data.qty);
            $('#unit_' + targetID).val(data.unit);
        } else {
           $('#myitemmodal').modal("show");
         }
       }
      });
    }
};