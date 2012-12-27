<h1>CODING CONVENTIONS IN CAKEPHP</h1>

The Cake PHP is one of the PHP framework created in MVC architecture. It follows all MVC conventions in coding.  Cakse PHP consist of three layers.
1. Model
2. View
3. Controller
Lets take a look at following coding conventions in CakePHP

<h3>MODEL</h3>

Modals are mostly responsible for data fetching and associations. But it is not all of its functionality. It is also responsible for the business logic of the apllication. All the business login is been handled in modal side of the code. Creating associations, saving , updating and  deleting data, and fetching data from tables are the basic functionalities of the modal in Cake PHP

Creating any table in DB, following conventions shoud be followed

1. The ID of the table must be kept as its first field and must have primarry key.
2. The associated table ID shoud come next to the ID of the table with the table name i.e tablename_id.  Eg. roles_id
3. The length of the fields shoud be defined in appropriate manner.
4. The filed name shoud be proper and meaningful.
5. Created and Modified must be at the end of table and shoud have data type as Datetime.
6. The table name be pural, i.e. should have at the end of the word and must be in small  case letters.
7. Eg:  “users”, “roles” etc
8. If table is having two words then the name should be joined by “_”.
9. Eg.  guest_users, user_details, etc


<h3>Creating Model :</h3>

In cake PHP. Model represents the table. We create model to perform table related activities.
Following are the conventions to be followed while creating any model

1. The name of the model shoud be in camel case letters starting with capital letter.
2. Model name is table name in singular form .
3. The file name of model shoud be in camel case letters.
4. The first word of the file name should be model name and the first letter should be capital.
5. The extenssion of the file is .php.
6. Eg: for table users the model will be
User.php
7. If model name is having two words the file name will be joined two words but the next word should start with capital letter
8. Eg. GuestUser.php , UserDetail.php, etc

<h3>Working with Model :</h3>

As I said earlier, model resprsents the table and also describe the business logic. Hence it is very important to write clean and meaning full code.
The model class starts with following convetions

1. After starting PHP tags, allways write the comments about the file. It must contain the liscencing details, Auther details, purpose of creation of file and the created date.
2. Include parent class at top i.e
   ``'App::uses('AppModel', 'Model');'``
3. The model class name shoud be the model name with all above convetions for model name.
4. Model class should extends to the parent class i.e. AppModel
5. Define all the global variables at the begining of the code.
6. Do all your associations at the begining. Writing them in between bad practice.
7. Define all your validations for the fields after associations.
8. The method name should be camel case.
9.  No query should be in loop
10.  No query shoud be written in controller
11.  Utilise same concent queries for multiple types.
12.  Keep Proper Relations with associated models
13.  Keep validations for required fields.
14. Eg.

    <?php
        App::uses('AppModel', 'Model');
        //Comments
        class ModelName extends AppModel {
        //Associations here
        //Validatios here
        //Method Comments
            public function methodNmae ()
            {
            }
        }
    ?>


<h3>CONTROLLER</h3>
Controller in Cake PHP are responsible for handling processing part of the application. It is a middle layer between modal and view.
