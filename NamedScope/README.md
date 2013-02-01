## NamedScope Behavior for CakePHP

### Basic :

1) This is a behavior for CakePHP that allows use of named scopes with model’s find() method. What it does it translating defined scopes to conditions before extecuting find query.

2) This NamedScope behavior for CakePHP allows you to define named scopes for a model, and then apply them to any find call. It will automagically create a model method,
and a method for use with the _findMethods property of the model.

3) Named scopes are essentially a shorthand for a frequently used set of conditions you need when you want to query your model.

4) Ruby on Rails 2.1 introduced the concept of named scopes.

#### Description using example:

So if you have a User model and you want to find all the active users which are named “Joe”, you would normally end up with this:

$this->User->find(array('conditions' => array('is_active' => 1, 'name' => 'Joe')));

Using named scopes you can write it like this:

$this->User->active->find(array('conditions' => array('name' => 'Joe')));

Which is not only shorter to write, but also easier to read. And it also leads to better maintainable code.

Our modified behavior requires you to modify your app_model (Without it, the $this->User->active shorthand will not work).
You can read the installation and usage instructions on github, where you can also find the code. Have Fun!!

NamedScope is now packaged as a plugin, so as to allow easier management - particularly with Git submodules - and to support tests.

### Install:

Get it from [http://github.com/joelmoss/cakephp-namedscope](http://github.com/joelmoss/cakephp-namedscope)
or https://github.com/Springest/CakePHP-Named-Scope [Work for CakePHP 1.3, for CakePhp 2.x change the naming convetion.]

Just create a 'named_scope' directory in your app/plugins directory, and drop these files and directories into it.

If your application is managed via Git, you can use NamedScope as a submodule. Just cd into your app directory, and run:

    git submodule add git://github.com/joelmoss/cakephp-namedscope.git plugins/named_scope

Once the submodule is added we need to register this submodule using `init`:

    git submodule init

From now on we can update all the submodules using the following command:

    git submodule update


### Example:

I have a User model and want to return only those which are active. So I define this in my model:

    var $actsAs = array(
        'NamedScope.NamedScope' => array(
            'active' => array(
                'conditions' => array(
                    'User.is_active' => true
                )
            )
        )
    );

#### Shorthands:

Then call this in my User controller:

    $active_users = $this->User->active('all');

or this:

    $active_users = $this->User->find('active');


You can even pass in the standard find params to both calls:

    $active_users = $this->User->active('all', array(
        'conditions' => array(
            'User.created' => '2008-01-01'
        ),
        'order' => 'User.name ASC'
    ));

or:

    $active_users = $this->User->find('active', array(
        'conditions' => array(
            'User.created' => '2008-01-01'
        ),
        'order' => 'User.name ASC'
    ));