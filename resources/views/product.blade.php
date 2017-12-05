<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Example</title>
</head>
<body>
<form action = "/products" method = "post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
    <input type="hidden" name="_method" value="PUT">

    <h1>Update Product</h1>
    <table>

        <tr>
            <td>Warehouse ID</td>
            <td><input type = "text" name = "warehouse_id" /></td>
        </tr>

        <tr>
            <td>SKU</td>
            <td><input type = "text" name = "sku" /></td>
        </tr>

        <tr>
            <td>Quantity</td>
            <td><input type = "text" name = "qty" /></td>
        </tr>

        <tr>
            <td>Price</td>
            <td><input type = "text" name = "price" /></td>
        </tr>

        <tr>
            <td>Price After Discount</td>
            <td><input type = "text" name = "price_after_discount" /></td>
        </tr>

        <tr>
            <td colspan = "2" align = "center">
                <input type = "submit" value = "Update Product" />
            </td>
        </tr>
    </table>

</form>
</body>
</html>