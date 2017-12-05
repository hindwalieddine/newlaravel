$(document).ready(function(){

var url = "getAttributesetsDetailsData";

//display modal form for task editing
$('#submit').click(function(){
var attribute_id = $(this).val();


//create new task / update existing task
$("#submit").click(function (e) {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
}
})

e.preventDefault();

var formData = {
id: $('#id').val(),
}


var type = "POST"; //for creating new resource
var id = $('#id').val();
var my_url = url;

if (state == "update"){
type = "PUT"; //for updating existing resource
my_url += '/' + id;
}

console.log(formData);

$.ajax({

type: type,
url: my_url,
data: formData,
dataType: 'json',
success: function (data) {
console.log(data);


},
error: function (data) {
console.log('Error:', data);
}
});
});
});
</script>

{{ Form::open( array(
    'route' => 'settings.create',
    'method' => 'post',
    'id' => 'form-add-setting'
) ) }}

{{ Form::label( 'setting_id', 'Setting ID:' ) }}
{{ Form::text( 'setting_id', '', array(
    'id' => 'setting_name',
    'placeholder' => 'Enter Attribute Set ID',
    'maxlength' => 3,
    'required' => true,
) ) }}


{{ Form::submit( 'Add Setting', array(
    'id' => 'btn-add-setting',
) ) }}

{{ Form::close() }}

<script>
jQuery( document ).ready( function( $ ) {

    $( '#form-add-setting' ).on( 'submit', function() {

        //.....
        //show some spinner etc to indicate operation in progress
        //.....
        dd('111');

        $.post(
            $( this ).prop( 'action' ),
            {
                "_token": $( this ).find( 'input[name=_token]' ).val(),
                "setting_name": $( '#setting_name' ).val(),
                "setting_value": $( '#setting_value' ).val()
            },
            function( data ) {
                //do something with data/response returned by server
            },
            'json'
        );

        //.....
        //do anything else you might want to do
        //.....

        //prevent the form from actually submitting in browser
        return false;
    } );

} );
</script>