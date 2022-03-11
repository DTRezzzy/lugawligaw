<?php
//$project_title = $project_description = $project_deadline = $project_bank_account = 

function upload_file ($file_field = null, $check_image = false, $random_name = false) {
    //Config Section    
    //Set file upload path
    $target_path_upload = '../../../uploads/project-images/';
    //Set max file size in bytes
    $max_size = 10000000; // 10 Megabytes total
    //Set default file extension whitelist
    $whitelist_ext = array('jpeg','jpg','png');
    //Set default file type whitelist
    $whitelist_type = array('image/jpeg', 'image/jpg', 'image/png');

    //The Validation
    // Create an array to hold any output
    $out = array( 'error'=> null);

    if ( !$file_field ) {
        $out['error'][] = "Please specify a valid form field name";           
    }

    if ( !$target_path_upload ) {
        $out['error'][] = "Please specify a valid upload path";               
    }

    if ( count($out['error'])>0 ) {
        return $out;
    }

    //Make sure that there is a file
    if( ( !empty($_FILES[$file_field] ) ) && ( $_FILES[$file_field]['error'] === 0 ) ) {

        // Get filename
        $file_info = pathinfo($_FILES[$file_field]['name']);
        $name = $file_info['filename'];
        $ext = $file_info['extension'];

        //Check file has the right extension           
        if (!in_array($ext, $whitelist_ext)) {
            $out['error'][] = "Invalid file Extension";
        }

        //Check that the file is of the right type
        if (!in_array($_FILES[$file_field]["type"], $whitelist_type)) {
            $out['error'][] = "Invalid file Type";
        }

        //Check that the file is not too big
        if ($_FILES[$file_field]["size"] > $max_size) {
            $out['error'][] = "File is too big";
        }

        //If $check image is set as true
        if ($check_image) {
            if (!getimagesize($_FILES[$file_field]['tmp_name'])) {
                $out['error'][] = "Uploaded file is not a valid image";
            }
        }

        //Create full filename including path
        if ($random_name) {
            // Generate random filename
            $tmp = str_replace(array('.',' '), array('',''), microtime());

            if ( !$tmp || $tmp === '') {
                $out['error'][] = "File must have a name";
            }     
            $newname = $tmp.'.'.$ext;                                
        } else {
            $newname = $name.'.'.$ext;
        }

        //Check if file already exists on server
        if (file_exists($target_path_upload.$newname)) {
            $out['error'][] = "A file with this name already exists";
        }

        if (count($out['error'])>0) {
            //The file has not correctly validated
            return $out;
        } 

        if (move_uploaded_file($_FILES[$file_field]['tmp_name'], $target_path_upload.$newname)) {
            //Success
            $out['filepath'] = $target_path_upload;
            $out['filename'] = $newname;
            return $out;
        } else {
            $out['error'][] = "Server Error!";
        }
    } else {
        $out['error'][] = "No file uploaded";
        return $out;
    }      
}

// Check request if POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check for CSRF token in form
    if (!empty($_POST['token'])) {
        // Check if stored token in session equals sent token
        if (hash_equals($_SESSION['token'], $_POST['token'])) {

            if( isset($_POST['btn-submit']) ){
                // var_dump($_POST);
                // var_dump($_FILES);

                $database = new Database();
                $db = $database->get_connection();

                $sql_query = "INSERT INTO fund_projects (Title, Description, BankAccount, ProjectDeadline, CreatedBy) VALUES (?, ?, ?, ?, ?)";

                $stmt = $db->prepare($sql_query);

                $stmt->bindParam(1, $_POST['project-title']);
                $stmt->bindParam(2, $_POST['project-description']);
                $stmt->bindParam(3, $_POST['project-deposit-number']);
                $stmt->bindParam(4, $_POST['project-deadline']);
                $stmt->bindParam(5, $_SESSION['id']);

                $stmt->execute();

                $arr = $stmt->errorInfo();
                print_r($arr);
                
                $last_inserted_id = $db->lastInsertId();

                $target_path_upload = '../../../uploads/project-images/';

                $full_path_name = "";
                print(realpath($target_path_upload));

                for( $x = 0; $x < count($_FILES['project-images']['name']); ++$x ){
                    // Get filename
                    $file_info = pathinfo($_FILES['project-images']['name'][$x]);
                    

                    $ext = $file_info['extension'];

                    $new_directory_name = $last_inserted_id.'-'.date('Y-m-d');

                    $new_image_name = $last_inserted_id.'-'.date('Y-m-d').'-'.$x.'.'.$ext;
                    
                    if ( !file_exists($target_path_upload.$new_image_name) ) {
                        mkdir(realpath($target_path_upload).'/'.$new_directory_name, 0777);
                    }
                    move_uploaded_file( $_FILES['project-images']['tmp_name'][$x], realpath($target_path_upload).'\\'.$new_directory_name.'\\'.$new_image_name );
                    
                    $full_path_name .= $target_path_upload.$new_image_name.'|';
                }

                $sql_query = "UPDATE fund_projects SET ProjectImages = ? WHERE id = ?";
                $stmt = $db -> prepare($sql_query);
                $stmt->execute([$full_path_name, $last_inserted_id]);
                // 0644
                // 0777 - all permission

                // file_field = project-images
                // $field_errors = array();

                // if( !isset( $_POST['project-title'] ) ){
                //     $project_title = sanitize_input($_POST['project-title']);
                // } else { 
                //     $field_errors = array('title' => `<span class='error'>Please enter title for project</span>`);
                // }
                
                // $project_description = sanitize_input($_POST['project-description']);
                // $project_deadline = sanitize_input($_POST['project-deadline']);

                // $dateTime = DateTime::createFromFormat('Y-m-d', $date);

                // $project_deadline = sanitize_input($_POST['project-deadline']);

                // if( !isset( $_POST['project-title'] ) ){
                //     $field_errors = array('title' => '<span><');
                // }
                

            } else {

            }

        } else {
            //$json_response = array("error"=> "Invalid Token!");
        }

    } else {
        //$json_response = array("error"=> "No Token!");
    }

    //echo json_encode($json_response);
}
// if ( isset($_POST['btn-submit']) ) {

//     $file = upload_file('file', true, false);

//     if (is_array($file['error'])) {
//         $message = '';
//         foreach ($file['error'] as $msg) {
//             $message .= '<p>'.$msg.'</p>';    
//         }
// } else {
//     $message = "File uploaded successfully".$newname;
// }
//     echo $message;
// }
?>



