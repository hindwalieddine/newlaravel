@extends('layouts.dashboard')
@section('page_heading','Update Warehouse')
@section('section')
<style>
    .panel.panel-body {
        width: 33%;
    }

</style>
    <!-- /.row -->
    <div class="col-sm-12">

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6" id="main">

            @section ('pane2_panel_title', 'Request')
            @section ('pane2_panel_body')

                <!-- /.panel -->



                    <ul><!--  class="timeline"-->


                        <!-- call to the form.php depending on what we click ajax call -->

                        @include('jquery/jquery')


                    </ul>

                    <!-- /.panel-body -->

                    <!-- /.panel -->
                @endsection
                @include('widgets.panel', array('header'=>true, 'as'=>'pane2'))
            </div>
            <!-- /.col-lg-8 -->
            <div class="col-lg-6">


                @section ('pane1_panel_title', 'Response Notifications Panel')
                @section ('pane1_panel_body')


                    <div class="list-group">
                        <?php if(isset($response)){?>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-comment fa-fw"></i> {{$response}}
                            <span class="pull-right text-muted small"><em>1 minutes ago</em>
                                    </span>
                        </a>
                        <?php }?>
                    </div>


                    <!-- /.panel-body -->

                @endsection
                @include('widgets.panel', array('header'=>true, 'as'=>'pane1'))


            <!-- /.panel -->
                @section ('pane3_panel_title', 'Chat')
                @section ('pane3_panel_body')

            </div>
            <!-- /.panel-heading -->

            <!-- /.panel-body -->

            <!-- /.panel-footer -->
        </div>
        <!-- /.panel .chat-panel -->
        @endsection

    </div>

    <!-- /.col-lg-4 -->
@stop
