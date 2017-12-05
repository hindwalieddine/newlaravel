@extends('layouts.dashboard')
@section('page_heading','Get Sellers')
@section('section')

    <!-- /.row -->
    <div class="col-sm-12">

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12" id="main">

            @section ('pane2_panel_title', 'Response Notifications Panel')
            @section ('pane2_panel_body')

                <!-- /.panel -->



                    <ul><!--  class="timeline"-->


                        <?php //var_dump(json_decode($data, true));
                        $phparray=json_decode($data,true);

                        //print_r($phparray);
                        echo '<pre>',print_r($phparray,1),'</pre>';

                        ?>


                    </ul>

                    <!-- /.panel-body -->

                    <!-- /.panel -->
                @endsection
                @include('widgets.panel', array('header'=>true, 'as'=>'pane2'))
            </div>
            <!-- /.col-lg-8 -->




            <!-- /.panel -->


            </div>
            <!-- /.panel-heading -->

            <!-- /.panel-body -->

            <!-- /.panel-footer -->
        </div>
        <!-- /.panel .chat-panel -->

    </div>

    <!-- /.col-lg-4 -->
@stop
