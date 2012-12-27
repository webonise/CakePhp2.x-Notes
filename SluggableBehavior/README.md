This is a behavior for CakePHP models. It makes it possible to generate unique URL slugs to be used in permalinks on CakePHP applications.

Quick overview:

* Specify a database field from which the slug should be generated (e.g. headline : 'The Great & the Good')

* Specify a field into which the slug should be stored when new records are created (e.g. url_slug : 'the_great_the_good'). Default is the CakePHP model's displayField

* Specify a slug word separator (defaults to using underscores)

* Automatically handles potential duplicates, and adds numerical suffixes accordingly

* Keeps slugs constant even when source field changes (for true permalinks, unlike the dynamic examples out there)

* Allows slug to be set manually instead of auto-generating it


Add the behaviour to your CakePHP model(s):

    ```Php
public $actsAs = array('Sluggable.Sluggable' => array(
       'label' => 'name',
       'slug' => 'slug',
       'separator' => '-',
       'overwrite' => true
    ));
    ```

How to use a slug in view for redirection:

echo $this->Html->link(__(‘Name’),
                           array('plugin' => plugin_name, 'controller' => controller_name, 'action' => action_name, 'slug' => $name['User']['slug']));


How to write routes using sluggable behavior:

Router::connect('/user/:slug', array('plugin' => plugin_name, 'controller' => controller_name, 'action' => action_name),
    array('pass' => array('slug')));
