<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Update Warehouse</title>
    <!-- Html::style('css/app.css') -->
    {!!Html::script('js/app.js')!!}
</head>
<body>
<!--
<canvas id="cline" height="300" width="300" style="display:none"/>
<canvas id="cpie" height="300" width="300" style="display:none"/>
<canvas id="cdonut" height="300" width="300" style="display:none"/>
<canvas id="cbar" height="300" width="300" style="display:none"/>
<canvas id="cpolar" height="300" width="300" style="display:none"/>
<canvas id="cdonut1" height="300" width="300" style="display:none"/>
-->
    <div class="container">
    <div class="panel panel-body">
        <div class="row">
    <!--<div class="panel-heading">  </div>-->
        <!--
        <div clas="panel-body">
            {!!Form::open(['url'=>'postJquery', 'action'=> '/warehouses/{{$id}}','method'=>'PUT', 'id'=>'frm-insert']) !!}

            <div class="row">
                <div class="col-md-3">
                    <div class=form-group">
                        {!!Form::label('warehouse_id','Warehouse ID') !!}
                        {!!Form::number('warehouse_id',null,['id'=>'warehouse_id','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class=form-group">
                        {!!Form::label('warehouse_name','Warehouse Name') !!}
                        {!!Form::text('warehouse_name',null,['id'=>'warehouse_name','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class=form-group">
                        {!!Form::label('manager_name','Manager name') !!}
                        {!!Form::text('manager_name',null,['id'=>'manager_name','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-3">
                    <div class=form-group">
                        {!!Form::label('mobile','Mobile') !!}
                        {!!Form::number('mobile',null,['id'=>'mobile','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class=form-group">
                        {!!Form::label('email','E-mail') !!}
                        {!!Form::email('email',null,['id'=>'email','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class=form-group">
                        {!!Form::label('code','Code') !!}
                        {!!Form::text('code',null,['id'=>'code','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <hr>
                    {!!Form::submit('Save',['id'=>'btn btn-primary']) !!}
                </div>
            </div>

            {!!Form::close() !!}
        </div>
    </div>
    </div>
-->

<?php $id=1;?>
<form action = "/warehouses/" method = "post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
    <input type="hidden" name="_method" value="PUT">

    <!--<h1>Update warehouse ID #, {{$id}}</h1>-->
    <table>

        <tr>
            <td>Warehouse ID</td>
            <td><input type = "text" name = "warehouse_id" id="warehouse_id" /></td>
        </tr>

        <tr>
            <td>Warehouse Name</td>
            <td><input type = "text" name = "warehouse_name" id="warehouse_name" /></td>
        </tr>

        <tr>
            <td>Manager Name</td>
            <td><input type = "text" name = "manager_name" id = "manager_name" /></td>
        </tr>

        <tr>
            <td>Mobile</td>
            <td><input type = "text" name = "mobile" id = "mobile" /></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><input type = "text" name = "email" id = "email" /></td>
        </tr>

        <tr>
            <td>Code</td>
            <td><input type = "text" name = "code" id="code"/></td>
        </tr>

        <tr>
            <td colspan = "2" align = "center">
                <input type = "submit" value = "Update Warehouse" />
            </td>
        </tr>
    </table>
</form>
    </div>
    </div>
    </div>
<script>
    function updateWarehouse(res4){

        $.post("/warehouses/"+res4["warehouse_id"], res4 , function(data, status){
            try{
                console.debug(data);
            }catch (e) {
                alert("Request error. Please try again.");
            }
        });
    }
</script>
    <script type="text/javascript">
        var res4 = new String();
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        $('#frm-insert').on('submit', function(e){
            e.preventDefault();
            //console.log($(this).serializeArray());
            //var name="Hind Walieddine";
            //var email="hind@pixel38.com";
            //var password='123';
            //$('#name').val(name)
            //$('#email').val('email')
            //$('#password').val('password')

            var data = $(this).serialize();
            var url=$(this).attr('action');
            var post =$(this).attr('method');
            //alert (url)

            $.ajax({
                type: post,
                url: url, //hayda el url 3m ye5edni 3ala function tenyi esma postJquery kamen b zet l class
                data:JSON.stringify(data, res4),
                //data:{'name': name, 'email':email,'password':password}, //JSON array
            success:function (data) {
                var str=data;  // put data str variable
                var res=data.split("&"); //split the data
                console.log(res);

                var i=0; var j=0;  var items=[[]];
                for(i=0;i<res.length;i++){
                    var value=res[i];
                    var res3=value.split("=");
                    //console.log(res3);

                    items.push(res3);
                    if(res[i]){
                        res4[ res3[0] ] = res3[1];
                       // $('#warehouse_id').val(res4["warehouse_id"]);
                    }
                }
                console.log(res4);
               // console.log(items);
                //var id = items[2][1];
                //window.location.href = "/warehouses/"+id;


                updateWarehouse(res4);


                }
            })

        });
    </script>
</body>
</html>
