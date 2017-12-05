@extends('layouts.dashboard')
@section('page_heading','Choose a Warehouse ID')
@section('section')

    <div class="col-sm-12">

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-8" id="main">

            @section ('pane2_panel_title', 'Request')
            @section ('pane2_panel_body')

                <!-- /.panel -->

                    <ul><!--  class="timeline"-->

                        <!-- Attribut set id: <input type="text"> -->
                        <?php
                        //echo Form::open(array('method'=>'post','class'=>'col-md-6','url' => '/attributeset/number','id'=>'attributsetid'));
                        //echo Form::label('Attribut Set Number');
                        //echo Form::number('attribute_id', 'value',['class'=>'id']);
                        //echo Form::text( 'attribute_id', '', array(
                         //   'id' => 'setting_name',
                        //    'placeholder' => 'Enter Attribute Set ID',
                        //    'maxlength' => 3,
                        //    'required' => true,
                       // ) );
                        //echo Form::submit('Send',['class'=>'submit']);
                       // echo Form::close();
                        ?>


                    </ul>

                    <script>
                        //var data = data;
                        //var arraydata = JSON.parse(data);
                        //console.log(data);
                        //data=data.replace("quot;","",data);
                        //console.log(arraydata);

                    </script>

                    <form action = "products/1" method = "get">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                        <input type="hidden" name="_method" value="POST">

                        <table>
<!--
                            <tr>
                                <td>Attribute Set ID</td>
                                <td><input type = "text" name = "attribute_id" id="attribute_id" /></td>
                            </tr>-->

                            <tr>
                                <td>Attribute Set ID</td>
                                <td>
                                    <select name="attributeID" id="attributeID">
                                        <?php //var_dump(json_decode($data, true));
                                        $phparray=json_decode($data,true);

                                        //print_r($phparray);
                                        //echo '<pre>',print_r($phparray,1),'</pre>';
                                        $arrayofids=[];
                                        foreach ($phparray as $value){?>
                                            <option value="<?php echo $value['warehouse_id'] ?>"><?php echo $value['warehouse_name'] ?></option>
                                            <?php
                                            //print_r($value[]);
                                            //echo $value['attribute_set_id'];
                                            //echo ",";
                                            //echo "{attribute_set_id} =>{$value}";
                                            //array_push($value);

                                        }
                                        ?>

                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td colspan = "2" align = "center">
                                    <input type = "submit" value = "Submit" />
                                </td>
                            </tr>
                        </table>
                    </form>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                        });
                        $('#frm-insert').on('submit', function(e){
                            e.preventDefault();
                            var data = $(this).serialize();
                            var url=$(this).attr('action');
                            var post =$(this).attr('method');
                            //alert (url)

                            $.ajax({
                                type: post,
                                url: 'attributesetst/', //hayda el url 3m ye5edni 3ala function tenyi esma postJquery kamen b zet l class
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

                    <!-- /.panel-body -->

                    <!-- /.panel -->
                @endsection
                @include('widgets.panel', array('header'=>true, 'as'=>'pane2'))
            </div>
            <!-- /.col-lg-8 -->
            <div class="col-lg-4">


                @section ('pane1_panel_title', 'Response Notifications Panel')
                @section ('pane1_panel_body')


                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <i class="fa fa-comment fa-fw"></i> New Comment
                            <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                    </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                            <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                    </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-envelope fa-fw"></i> Message Sent
                            <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                    </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-tasks fa-fw"></i> New Task
                            <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                    </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                            <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                            <span class="pull-right text-muted small"><em>11:13 AM</em>
                                    </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-warning fa-fw"></i> Server Not Responding
                            <span class="pull-right text-muted small"><em>10:57 AM</em>
                                    </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                            <span class="pull-right text-muted small"><em>9:49 AM</em>
                                    </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-money fa-fw"></i> Payment Received
                            <span class="pull-right text-muted small"><em>Yesterday</em>
                                    </span>
                        </a>
                    </div>
                    <!-- /.list-group -->
                    <a href="#" class="btn btn-default btn-block">View All Alerts</a>

                    <!-- /.panel-body -->

                @endsection
                @include('widgets.panel', array('header'=>true, 'as'=>'pane1'))


            <!-- /.panel -->
                @section ('pane3_panel_title', 'Chat')
                @section ('pane3_panel_body')
                    <div class="btn-group pull-right margin-inverse-top">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li>
                                <a href="#">
                                    <i class="fa fa-refresh fa-fw"></i> Refresh
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-check-circle fa-fw"></i> Available
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-times fa-fw"></i> Busy
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-clock-o fa-fw"></i> Away
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                </a>
                            </li>
                        </ul>
                    </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <ul class="chat">
                    <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">Jack Sparrow</strong>
                                <small class="pull-right text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                                </small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                            </p>
                        </div>
                    </li>
                    <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <small class=" text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
                                <strong class="pull-right primary-font">Bhaumik Patel</strong>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                            </p>
                        </div>
                    </li>
                    <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">Jack Sparrow</strong>
                                <small class="pull-right text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                            </p>
                        </div>
                    </li>
                    <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <small class=" text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                                <strong class="pull-right primary-font">Bhaumik Patel</strong>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /.panel-body -->

            <!-- /.panel-footer -->
        </div>
        <!-- /.panel .chat-panel -->
        @endsection
        @include('widgets.panel', array('header'=>true, 'as'=>'pane3'))
    </div>

    <!-- /.col-lg-4 -->
@stop
