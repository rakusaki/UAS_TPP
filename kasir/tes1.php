<script src="tes.js"></script>

<table class="table table-bordered" id="stock" >
    <thead>
    <tr>
        <td>Sr no.</td>
        <td>Product Name</td>
        <td>Description</td>
        <td>Qty</td>
        <td>Unit</td>
        <td>Rate</td>
        <td>Tax</td>
        <td>Dis</td>
        <td>Total</td>
        <td><input type="button" name="add" id="add" value="+" class="btn btn-warning" /></td>
    </tr>
    </thead>
    <tbody class="details">
    <tr>
        <td class="no">1</td>
        <td><input type="text" name="items[]" id="items_1" class="form-control items"  autocomplete="off" /></td>
        <td><textarea name="size[]" id="size_1" class="form-control size" autocomplete="off"></textarea></td>
        <td><input type="text" name="qty[]" id="qty_1" class="form-control qty" autocomplete="off"/></td>
        <td><input type="text" name="unit[]" id="unit_1" class="form-control unit" autocomplete="off"/></td>
        <td><input type="text" name="price[]" id="price_1" class="form-control price" autocomplete="off"/></td>
        <td><input type="text" name="tax[]" id="tax_1" class="form-control tax"  autocomplete="off" /></td>
        <td><input type="text" name="dis[]" id="dis_1" class="form-control dis" autocomplete="off" /></td>
        <td><input type="text" name="stkamt[]" id="amt" class="form-control amt" autocomplete="off" /></td>
        <td><button class="btn btn-danger remove">X</button></td>
    </tr>
    </tbody>
    <tfoot></tfoot>
</table>