<?php
if (isset($_POST['submit'])) {
    //$file = $_FILES['file'];

    //Collecting inforamtion on the file being submitted
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileDestination = '/Applications/MAMP/htdocs/CX3/uploads/';

    //Getting file type extension
    $fileExplode = explode('.', $fileName);
    $fname=$fileExplode[0];
    $fext=$fileExplode[1];
    echo $_FILES['file']['name'];
    echo "fname: ".$fname."<br />";
    echo "file extention:".$fext."<br />";
    //File types to allow
    $allowed = array('xls', 'xlt', 'xlm', 'xlsx', 'xlsm', 'xltx', 'xltm');

    //Checks size of file
    if (in_array($fext, $allowed)) {
        if ($fileError === 0) {
            if($fileSize < 100000000) {
               // $fileNameNew = uniqid('', true).".".$fname;
              //  if(!is_writable($fileDestination)){ echo "error in dir"; } //For debugging Ch
          //    else { //added for debugging
          if(is_uploaded_file($fileTmpName))
          {echo "file uploaded ";}
          if (move_uploaded_file($fileTmpName,"/Applications/MAMP/htdocs/CX3/uploads/".$fileName))

        //  if (move_uploaded_file($_FILES['file']['name'],"/Applications/MAMP/htdocs/CX3/uploads/"))
          {
          // $upload_message = $fileName.'has been uploaded';
               // header("Location: index.html?uploadsuccess");
               echo "Your file is successfully uploaded";
              $mystring = system('python ./uploads/OncoEvalBC.py $fileName, $retval');
             echo "You fiile is being processed = ";
              //echo "mystring = ".$mystring;
          //  }   //added for debugging
        } else {
          echo "The file upload is failed";
        }
            }else {
                echo "Your file is too big!";
            }
        }else {
            echo "There was an error uplading your file";
        }
    }else {
        echo "You cannot upload files of this type!";
    }

}
?>
