
# Swiftmailer Component  for CakePHP #

Version  2.x

Swiftmailer component offering a flexible  approach to sending emails with a multiple of features.

## Installing ##


## Usage  ##
-First, download [SwiftMailer](http://swiftmailer.org/), and place it under vendors/SwiftMailer.

-Add the plugin to your app/Config/bootstrap.php using:

    CakePlugin::loadAll().

## Create SwiftMailer Component ##

create one SwiftMailer component so we call use functions from anywhere.create a file named SwiftMailerComponent.php under app/Controller/Component.use the [code](https://github.com/webonise/CakePhp2.x-Notes/blob/master/app/Controller/Component/SwiftMailerComponent.php) in to that file and save it.


## Create Email template ##

Email template is the view file which contains template of email.for creating email template we have to create file in app/view/Emails/Html/file_name.ctp in folder.
and we have to use this template while sending email.following is the example of template register.ctp

    Congratulations!!!
    <br/>
    <br/>
    Your registration is successfull <br/>
    <br/>
    Thanks,
    <br/>
Here we can use php variables values as well.

## Sending a mail ##

Once we have created templet for email.we can send this template via email.for that we have to use SwiftMailer Component.

 -First include your component in to our AppController.

    public $components = array('SwiftMailer');

 -Now, use Swiftmailer Components send method to send email with a data.format of data array is:

    $data['from'] = from email;
    $data['fromName'] = 'Sender Name';
    $data['to'] = 'email';
    $data['template'] = 'template name';
    $data['subject'] = 'subject for email';
 -Send above data format to user using:

    $this->SwiftMailer->from = $data['from'];
    $this->SwiftMailer->fromName = $data['fromName'];
    $this->SwiftMailer->to = $data['to'];
    $this->SwiftMailer->toName = $data['toName'];
    $this->set('data', $data);
    $this->SwiftMailer->send($data['template'], $data['subject']);


