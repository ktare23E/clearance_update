<?php 



        include_once '../connection.php';


        if(isset($_POST['submit'])){

        $student_id = $_POST['student_id'];
        $id = $_POST['student_id'];
        $student_first_name    = $_POST['student_first_name'];
        $student_middle_name = $_POST['student_middle_name'];
        $student_last_name        = $_POST['student_last_name'];
        $student_year   = $_POST['student_year'];
        $student_email = $_POST['student_email'];
        $student_gender = $_POST['student_gender'];
        $student_status = $_POST['student_status'];
        $course_id   = $_POST['course_id'];
        // $student_username   = $_POST['student_username'];
        $student_password        = $_POST['student_password'];
        // $office_id = $_POST['office_id'];

        $query = "SELECT * FROM course where course_id = '$course_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        $office_id = $row['office_id'];

        if(isset($_FILES['image'])){ //if file is upload
            $img_name = $_FILES['image']['name']; //getting user uploaded img name 
            $tmp_name = $_FILES['image']['tmp_name']; // this temporary name is used to save/move file in our folder

            // let's explode image and get the last extension like jpg png
            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode); //here we get the extension of an user uploaded img file

            $extensions = ['png','jpeg','jpg']; //these are some valid extension and we've store then in array
            if(in_array($img_ext, $extensions) === true){ // if user upload img extension is matched with any array extensions
                $time = time(); //this will return us current time..
                                //we need this time because when you uploading user img to in our folder we rename user file with current time
                                //so all the image file will have a unique name
                //let's move the user uploaded img to our particular folder
                $new_img_name = $time.$img_name;
                
                if(move_uploaded_file($tmp_name, "uploads/".$new_img_name)){ // if user upload img move to our folder successfully
                    // let's insert all user data inside table
                    $sql2 = mysqli_query($conn,"INSERT INTO student (student_id, student_first_name,student_middle_name, student_last_name, student_year, course_id, office_id, student_gender, student_email, student_password, student_status, student_profile)
                                        VALUES('{$student_id}','{$student_first_name}','{$student_middle_name}','{$student_last_name}','{$student_year}','{$course_id}','{$office_id}','{$student_gender}','{$student_email}','{$student_password}','{$student_status}','$new_img_name')");    
                    
                    header("Location: student.php");
                    exit();
                }

            }else{
                echo "Please select an Image file - jpeg, jpg, png!";
            }
        }else{
            echo "Please select an Image file!";
        }
    }
?>
