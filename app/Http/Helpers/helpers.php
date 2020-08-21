<?php

function userDetails($id)
{
    return User::where('id', $id)->first();
}

function formatedDate($date, $formate = 'h:i a, d F, Y')
{   
    return date($formate, strtotime($date));
}

function createDirectory($baseDir, $subDir, $permission=0777)
{
    $directory = public_path('uploads/'.$baseDir.'/'.$subDir.'/');

    if (!file_exists($directory)) {
        mkdir($directory, $permission, true);
    }
}

function createUserImageDirectories($id)
{
    createDirectory('users', $id);
    createDirectory('users', $id.'/thumb');
    createDirectory('users', $id.'/medium');
}

function createUserDocsDirectories($id) 
{
    createDirectory('users', $id.'/docs');
}

function createAudioDirectories($id) 
{
    createDirectory('audio', $id);
}

function getImage($image, $directory, array $options = null)
{
    return config('filesystems.disks.uploads.url') . '/'  . $directory . '/' . $image;
}

function unlinkOldImages($image, $directory) {
    // unlink old image
    @unlink(config('filesystems.disks.uploads.root') . '/'  . $directory . '/' . $image);
    @unlink(config('filesystems.disks.uploads.root') . '/'  . $directory . '/thumb/' . $image);
    @unlink(config('filesystems.disks.uploads.root') . '/'  . $directory . '/medium/' . $image);
}

function getStatus($status) {

    $statusList = ['Inactive', 'Active'];

    return $statusList[$status];
}

function getVerificationStatus($status) {
    
    $statusList = ['Un-Verified', 'Verified'];

    return $statusList[$status];
}

function getRoleBasedImagePrefix() {

    $all = [
        'Admin' => 'admin_',
        'User' => 'user_',
    ];

    return $all[Auth::user()->role];
}

function getRoleBasedImageDirectory() {
    
    $all = [
        'Admin' => 'users',
        'User' => 'users',
    ];

    return $all[Auth::user()->role];
}

function createRoleBasedImageDirectories($id) {

    if(Auth::user()->role == 'Admin') {
        createUserImageDirectories($id);
    }
    else if(Auth::user()->role == 'User') {
        createUserImageDirectories($id);
    }
}

function executeCurlAndGetResponse($url) {

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    
    $response = json_decode($response);

    $response->message = str_replace("_", " ", $response->message);
    
    return $response;
}

function getValidationErrors($validator_messages) {

    $errors = '';

    // Each failed field will have one or more messages.
    foreach($validator_messages as $field_name => $messages) {
        // Go through each message for this field.
        foreach($messages as $message) {
            $errors .= $field_name . ': ' . $message . '; ';
        }
    }

    return $errors;
}

function sendEmail($to, $subject, $txt) {

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <info@eruditeassociates.com>' . "\r\n";
    // $headers .= 'Cc: admin@eruditeassociates.com' . "\r\n";

    $message = "<html>" .
                "<head>" .
                "<title>$subject</title>" .
                "</head>" .
                "<body>". 
                $txt .
                "<p>Regards</p>" .
                "Team Recording" .
                "</body>" .
                "</html>";

    if(mail($to, $subject, $message, $headers)) {

        return ['status' => true, 'message' => 'Email has been sent.'];
    } else {
        return ['status' => false, 'message' => 'Error in email sending.'];
    }
}
