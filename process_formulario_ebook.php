<?php

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
    // if any of these variables don't exist, add an error to our $errors array

    if (empty($_POST['email']))
        $errors['email'] = 'Email is required.';


// return a response ===========================================================

    // if there are any errors in our errors array, return a success boolean of false
    if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {

        // if there are no errors process our form, then return a message

        $ch = curl_init();

        if (FALSE === $ch)
          throw new Exception('failed to initialize');

        // Set subscription status
        //if ( )

        // data
        $datos = json_encode( array(
          'email_address' => $_POST['email'],
          'status' => $_POST['status'],
          'merge_fields' => array(
            'FNAME'     => $_POST['fname'],
            'LNAME'     => $_POST['lname'],
            'COMPANY'   => $_POST['company'],
            'POSITION'  => $_POST['position']
          )
        ));

        // Set url depending on lang
        if ( $_POST['lang'] == 'es')
            $list_url = 'https://us12.api.mailchimp.com/3.0/lists/e01985cfde/members';
        else
            $list_url = 'https://us12.api.mailchimp.com/3.0/lists/de62a0f954/members';


        // opciones
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $datos );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_URL, $list_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERPWD, 'ThomasMoreMC:93f057ecc0c9b3c60b9946407b27143e-us12');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);

        if (FALSE === $output)
          throw new Exception(curl_error($ch), curl_errno($ch));

        curl_close($ch);

        // show a message of success and provide a true success variable
        $data['success'] = true;
        $data['message'] = json_decode($output);
    }

    // return all our data to an AJAX call
    echo json_encode($data);
