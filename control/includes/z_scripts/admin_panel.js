<script> function bigDiv(x) { x.style.width="200px"; } function normalDiv(x) { x.style.width=""; } </script>


<script>
// Attach a submit handler to the form
$( "#SearchOrders" ).submit(function( event ) {
// Stop form from submitting normally
event.preventDefault();
document.getElementById('searchordersbtn').disabled=true;	 
// Get some values from elements on the page:
var $form = $( this ),
username_value = $form.find( "input[name='username']" ).val(),
id_value = $form.find( "input[name='id']" ).val(),
status_value = $form.find( "select[name='status']" ).val(),
type_value = $form.find( "select[name='type']" ).val(),
cmd_value = $form.find( "input[name='cmd']" ).val(),
url = $form.attr( "action" );
// Send the data using post
var posting = $.post( url, { username: username_value, id:id_value, status:status_value, type:type_value, cmd: cmd_value } );
// Put the results in a div
posting.done(function( data ) {
             /* Put the results in a div */
             $( "#SearchOrdersResponse" ).html(data);
			 document.getElementById('searchordersbtn').disabled=false;	 
});
});
</script>



<script>
// Attach a submit handler to the form
$( "#EditOrder" ).submit(function( event ) {
// Stop form from submitting normally
event.preventDefault();
document.getElementById('editorderbtn').disabled=true;	 
// Get some values from elements on the page:
var $form = $( this ),
cmd_value = $form.find( "input[name='cmd']" ).val(),
id_value = $form.find( "input[name='id']" ).val(),
username_value = $form.find( "input[name='username']" ).val(),
original_link_value = $form.find( "input[name='original_link']" ).val(),
item_name_value = $form.find( "input[name='item_name']" ).val(),
item_color_value = $form.find( "input[name='item_color']" ).val(),
item_size_value = $form.find( "input[name='item_size']" ).val(),
item_model_value = $form.find( "input[name='item_model']" ).val(),
item_specs_value = $form.find( "input[name='item_specs']" ).val(),
quantity_value = $form.find( "input[name='quantity']" ).val(),
original_price_value = $form.find( "input[name='original_price']" ).val(),
total_price_value = $form.find( "input[name='total_price']" ).val(),
notes_value = $form.find( "input[name='notes']" ).val(),
date_placed_value = $form.find( "input[name='date_placed']" ).val(),
status_value = $form.find( "select[name='status']" ).val(),
delivery_value = $form.find( "select[name='delivery']" ).val(),
url = $form.attr( "action" );
// Send the data using post
var posting = $.post( url, { date_placed:date_placed_value, notes:notes_value, total_price:total_price_value, original_price:original_price_value, quantity:quantity_value, item_specs:item_specs_value, item_model:item_model_value, item_size:item_size_value, item_color:item_color_value, item_name:item_name_value, original_link:original_link_value, username: username_value, id:id_value, status:status_value, delivery:delivery_value, cmd: cmd_value } );
// Put the results in a div
posting.done(function( data ) {
             /* Put the results in a div */
             $( "#EditOrderResponse" ).html(data);
			 document.getElementById('editorderbtn').disabled=false;	 
});
});
</script>
















<script>
// Attach a submit handler to the form
$( "#SearchUsers" ).submit(function( event ) {
// Stop form from submitting normally
event.preventDefault();
document.getElementById('searchusersbtn').disabled=true;	 
// Get some values from elements on the page:
var $form = $( this ),
username_value = $form.find( "input[name='username']" ).val(),
email_value = $form.find( "input[name='email']" ).val(),
phone_value = $form.find( "input[name='phone']" ).val(),
city_value = $form.find( "input[name='city']" ).val(),
cmd_value = $form.find( "input[name='cmd']" ).val(),
url = $form.attr( "action" );
// Send the data using post
var posting = $.post( url, { username: username_value, email:email_value, phone:phone_value, city:city_value, cmd: cmd_value } );
// Put the results in a div
posting.done(function( data ) {
             /* Put the results in a div */
             $( "#SearchUsersResponse" ).html(data);
			 document.getElementById('searchusersbtn').disabled=false;	 
});
});
</script>



<script>
// Attach a submit handler to the form
$( "#EditUser" ).submit(function( event ) {
// Stop form from submitting normally
event.preventDefault();
document.getElementById('edituserbtn').disabled=true;	 
// Get some values from elements on the page:
var $form = $( this ),
cmd_value = $form.find( "input[name='cmd']" ).val(),
id_value = $form.find( "input[name='id']" ).val(),
username_value = $form.find( "input[name='username']" ).val(),
email_value = $form.find( "input[name='email']" ).val(),
password_value = $form.find( "input[name='password']" ).val(),
full_name_value = $form.find( "input[name='full_name']" ).val(),
phone_value = $form.find( "input[name='phone']" ).val(),
address_value = $form.find( "input[name='address']" ).val(),
city_value = $form.find( "input[name='city']" ).val(),
credits_value = $form.find( "input[name='credits']" ).val(),
url = $form.attr( "action" );
// Send the data using post
var posting = $.post( url, { email:email_value, password:password_value, full_name:full_name_value, phone:phone_value, address:address_value , city:city_value, credits:credits_value, username: username_value, id:id_value, cmd: cmd_value } );
// Put the results in a div
posting.done(function( data ) {
             /* Put the results in a div */
			 $( "#EditUserResponse" ).html(data);
			 document.getElementById('edituserbtn').disabled=false;	 
});
});
</script>





<script>
// Attach a submit handler to the form
$( "#GenerateCards" ).submit(function( event ) {
// Stop form from submitting normally
event.preventDefault();
document.getElementById('addbtn').disabled=true;	 
// Get some values from elements on the page:
var $form = $( this ),
card_type_value = $form.find( "select[name='card_type']" ).val(),
quantity_value = $form.find( "input[name='quantity']" ).val(),
cmd_value = $form.find( "input[name='cmd']" ).val(),
url = $form.attr( "action" );
// Send the data using post
var posting = $.post( url, { card_type: card_type_value, quantity:quantity_value, cmd: cmd_value } );
// Put the results in a div
posting.done(function( data ) {
             /* Put the results in a div */
             $( "#GenerateCardsResponse" ).html(data);
			 alert("Done");  
});
});
</script>





<script>
// Attach a submit handler to the form
$( "#SearchItems" ).submit(function( event ) {
// Stop form from submitting normally
event.preventDefault();
document.getElementById('searchitemsbtn').disabled=true;	 
// Get some values from elements on the page:
var $form = $( this ),
title_value = $form.find( "input[name='title']" ).val(),
cat_id_value = $form.find( "select[name='cat_id']" ).val(),
status_value = $form.find( "select[name='status']" ).val(),
cmd_value = $form.find( "input[name='cmd']" ).val(),
url = $form.attr( "action" );
// Send the data using post
var posting = $.post( url, { title:title_value, cat_id:cat_id_value, status:status_value, cmd: cmd_value } );
// Put the results in a div
posting.done(function( data ) {
             /* Put the results in a div */
             $( "#SearchItemsResponse" ).html(data);
			 document.getElementById('searchitemsbtn').disabled=false;	 
});
});
</script>





<script>
// Attach a submit handler to the form
$( "#EditItem" ).submit(function( event ) {
// Stop form from submitting normally
event.preventDefault();
document.getElementById('edititembtn').disabled=true;	 
// Get some values from elements on the page:
var $form = $( this ),
id_value = $form.find( "input[name='id']" ).val(),
title_value = $form.find( "input[name='title']" ).val(),
price_value = $form.find( "input[name='price']" ).val(),
delivery_time_value = $form.find( "input[name='delivery_time']" ).val(),
model_value = $form.find( "input[name='model']" ).val(),
color_value = $form.find( "input[name='color']" ).val(),
size_value = $form.find( "input[name='size']" ).val(),
description_value = $form.find( "input[name='description']" ).val(),
video_value = $form.find( "textarea[name='video']" ).val(),
cat_id_value = $form.find( "select[name='cat_id']" ).val(),
status_value = $form.find( "select[name='status']" ).val(),
cmd_value = $form.find( "input[name='cmd']" ).val(),
url = $form.attr( "action" );
// Send the data using post
var posting = $.post( url, { video:video_value, description:description_value, size:size_value, color:color_value, model:model_value, delivery_time:delivery_time_value, price:price_value, id:id_value, title:title_value, cat_id:cat_id_value, status:status_value, cmd: cmd_value } );
// Put the results in a div
posting.done(function( data ) {
             /* Put the results in a div */
             $( "#EditItemResponse" ).html(data);
			 document.getElementById('edititembtn').disabled=false;	 
});
});
</script>