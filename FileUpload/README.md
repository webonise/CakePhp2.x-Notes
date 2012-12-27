##How to use File Upload Component.##


_We can upload image or any other file/files using ‘File Upload Component’  in ‘CakePHP’._
### **How to use:**###
* Include ‘FileUploadComponent.php’ in app/Controller/Component in your application.

* Include component in your $component array.

    Ex: If you are uploading file in any method in ‘UsersController’ then

    `class UsersController extends AppController{

    public $component=array(‘FileUpload’);

    //...

    }`

* Specify Form type to ‘file’. Specifying ‘file’ changes the form submission method to ‘post’, and
    includes an enctype of “multipart/form-data” on the form tag.

    Ex: If you are creating user form then

Eg.
    `
   echo $this->Form->create(‘User’,array(‘type’=>’file’));
    `

* Take field ‘file’ in your view part.
    Ex:
    `echo $this->Form->file(‘User.image’);`

    Upon submission, file fields provide an expanded data array to the script receiving the form data.

    In $this->request->data you will get information about the uplaoded file like

    [User]
    (
    [image]=>array
        (
        [name] => pic.gif
        [type] => image/gif
        [tmp_name] => /tmp/phpVq9TUk
        [error] => 0
        [size] => 34635
        )
    )

* FileUploadComponent has method

14. Eg.
    #app/Model/ModelName.php

    ```Php
    function uploadFiles($folder, $formdata, $itemId = null, $permitted, $multifile = false) {
        //.....
        }
    ```




    you can use this method to uload file.

    $folder  =>The folder to upload the files e.g. 'img/files
	This is folder path related to webroot where you want to save your file.
	If there is no folder having this name it will create it and give permission also.

    $formdata=>The array containing the form files
	     This is the extended data array which you get in request data.

    $itemId =>id of the item (optional) will create a new sub folder

     $permitted=>Type of files you want to allow to upload.
	    This is array of types of file you want to allow for upload.
	     This can include in AppController.
     Ex: For image you can include like

    `class AppController extends Controller {
         public $permitted = array('image/jpeg', 'image/jpg', 'image/jpe_', 'image/pjpeg',
                    'image/jpeg', 'image/jpg',  'image/pjpeg', 'image/pipeg'...');`





     Ex:
    After uploading file you will use method

   ` $this->FileUpload->uploadFiles('img/UserImage', $this->request->data[‘User’]['image']
                , null, $this->permitted, false);`

     So it will save image inside folder ‘app/webroot/img/UserImage’ having name ‘pic.gif’

