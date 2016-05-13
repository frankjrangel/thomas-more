jQuery(document).ready(function($) {
  $('button.boton-descarga').click(function(){
      $(this).fadeOut();
      $('.formulario').fadeIn();
  });

  var formval = $('form').parsley();

  // process the form
  $('form').submit(function(event) {

    // Form data
    if ($('input[type=checkbox]').is(':checked'))
        var subscripcion = 'subscribed';
    else
        var subscripcion = 'unsubscribed';

    if ( $('label#nombre').val === 'Nombre' )
        var lang = 'es';
    else
        var lang = 'en';

    var formData = {
        'email'     : $('input[name=email]').val(),
        'fname'     : $('input[name=fname]').val(),
        'lname'     : $('input[name=lname]').val(),
        'company'   : $('input[name=company]').val(),
        'position'  : $('input[name=position]').val(),
        'status'    : subscripcion,
        'lang'      : lang
      };

  // process the form
  $.ajax({
    type      : 'POST', // define the type of HTTP verb we want to use (POST for our form)
    url       : 'http://vccw.dev/thomasmore/wp-content/themes/thomas-more/process_formulario_ebook.php', // the url where we want to POST
    // url       : '../process_formulario_ebook.php', // the url where we want to POST
    data      : formData, // our data object
    dataType  : 'json', // what type of data do we expect back from the server
    encode    : true
  })
  // using the done promise callback
  .done(function(data) {

    if ( data === undefined || data.length == 0 )
        alert('Ocurrió un error por favor refresca la página e intenta nuevamente');
    else
        //$('#errors').text(data.errors['name']);

    // log data to the console so we can see
    console.log(data, formData);
    console.log('done called');
    // here we will handle errors and validation messages
    if ( ! data.success) {

            // handle errors for email ---------------
            if (data.errors.email) {
                $('#email-group').addClass('has-error'); // add the error class to show red input
                $('#email-group').append('<div class="help-block">' + data.errors.email + '</div>'); // add the actual error message under our input
            }

        } else {

            // ALL GOOD! just show the success message!
            // $('form').append('<div class="alert alert-success">' + data.message.title + '</div>');
            $('form').fadeOut();
            $('.formulario h3').fadeOut();
            $('#errors').html('<p style="text-align:center">Si la descarga no comienza utiliza este botón</p><br /><a href="#"><button class="boton-descarga">Download</button></a>');

            window.location = 'http://vccw.dev/thomasmore/wp-content/uploads/sites/2/2016/05/sales-compensation.pdf'; // redirect a user to another page
            // alert('success'); // for now we'll just alert the user

        }
  })
  // .fail(function(data) {
  //   console.log('failing');
  //   console.log(data);
  //   $('#errors').text(data.responseText);
  // });

  // stop the form from submitting the normal way and refreshing the page
  event.preventDefault();
  });

});
