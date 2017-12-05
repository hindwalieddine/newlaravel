<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Example</title>
</head>
<body>
<form action = "/warehouses/{{$id}}" method = "post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
    <input type="hidden" name="_method" value="PUT">

    <h1>Update warehouse ID #, {{$id}}</h1>
    <table>

        <tr>
            <td>Warehouse Name</td>
            <td><input type = "text" name = "warehouse_name" /></td>
        </tr>

        <tr>
            <td>Manager Name</td>
            <td><input type = "text" name = "manager_name" /></td>
        </tr>

        <tr>
            <td>Mobile</td>
            <td><input type = "text" name = "mobile" /></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><input type = "text" name = "email" /></td>
        </tr>

        <tr>
            <td>Code</td>
            <td><input type = "text" name = "code" /></td>
        </tr>

        <tr>
            <td colspan = "2" align = "center">
                <input type = "submit" value = "Update Warehouse" />
            </td>
        </tr>
    </table>

</form>
</body>
</html>