<?php
function file_up($file,$path='')
{
    $ci = &get_instance();
    // Set the upload configuration
    $config['upload_path']   = './uploads/'.$path;  // Specify your upload directory
    $config['allowed_types'] = 'gif|jpg|jpeg|png'; // Add or modify allowed file types
    $config['max_size']      = 2048; // Set the max file size in KB
    $config['encrypt_name']  = TRUE; // Generate a random filename

    $ci->upload->initialize($config);

    if ($ci->upload->do_upload($file)) {
        // File uploaded successfully
        $data = $ci->upload->data();
       return $data['file_name'];
    } else {
        // Error in upload
        $error = array('error' => $ci->upload->display_errors());
        print_r($error);exit;
    }
}