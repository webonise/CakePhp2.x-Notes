# What is Helper ?

Helpers are the component-like classes for the presentation layer of your application. They contain presentational logic that is shared between many views, elements, or layouts.


# Core Helpers in Cake PHP

* A **CacheHelper** assists in caching entire layouts and views, saving time repetitively retrieving data.
* A **FormHelper** does most of the heavy lifting in form creation.
* A **HtmlHelper** in CakePHP is to make HTML-related options easier, faster, and more resilient to change.
* A **JsHelper** is an Adapter based helper, and included 3 of the most requested libraries. Prototype/Scriptaculous, Mootools/Mootools-more, and jQuery/jQuery UI.
* A **NumberHelper** contains convenience methods that enable display numbers in common formats in your views.
* A **Paginator** is used to output pagination controls such as page numbers and next/previous links.
* A **RSS**  makes generating XML for RSS feeds easy.
* A **SessionHelper** replicates most of the Session components functionality and makes it available in your view.
* A **TextHelper**  contains methods to make text more usable and friendly in your views.
* A **TimeHelper** does what it says on the tin: saves you time. It allows for the quick processing of time related information.


## More Information about JsHelper

As stated above **JSHelper** is an Adapter based helper, and included 3 of the most requested libraries. Prototype/Scriptaculous, Mootools/Mootools-more, and jQuery/jQuery UI. Javascript Engines form the backbone of the new JsHelper. A Javascript engine translates an abstract Javascript element into concrete Javascript code specific to the Javascript library being used.

While using the JSHelper first of all you'll have to download your preferred javascript library and place it in app/webroot/js. Then you must include the library in your page.

Javascript engine selection is declared when you include the helper in your controller:

        public $helpers = array('Js' => array('Jquery'));

The above would use the Jquery Engine in the instances of JsHelper in your views. If you do not declare a specific engine, the jQuery engine will be used as the default.


## Using the JsHelper inside customHelpers

Declare the JsHelper in the $helpers array in your customHelper:

        public $helpers = array('Js');

If you are willing to use an other javascript engine than the default, do the helper setup in your controller as follows:

        public $helpers = array(
            'Js' => array('Prototype'),
            'CustomHelper'
        );


## Javascript engine usage

Since most methods in Javascript begin with a selection of elements in the DOM, $this->Js->get() returns a **$this**, allowing you to chain the methods using the selection. Method chaining allows you to write shorter, more expressive code:

    $this->Js->get('#foo')->event('click', $eventCode);

    OR

    $this->Js->get('#foo');
    $this->Js->event('click', $eventCode);


## Working with buffered scripts

It is recommended that you place $this->Js->writeBuffer() at the bottom of your layout file above the body tag. This will allow all scripts generated in layout elements to be output in one place. It should be noted that buffered scripts are handled separately from included script files.

**JsHelper::writeBuffer($options = array())**

Writes all Javascript generated so far to a code block or caches them to a file and returns a linked script.

# Options

* inline - Set to true to have scripts output as a script block inline if cache is also true, a script link tag will be generated. (default true)
* cache - Set to true to have scripts cached to a file and linked in (default false)
* clear - Set to false to prevent script cache from being cleared (default true)
* onDomReady - wrap cached scripts in domready event (default true)
* safe - if an inline block is generated should it be wrapped in <![CDATA[ ... ]]> (default true)

# Some methods in the helpers are buffered by default. The engines buffer the following methods by default:

* event
* sortable
* drag
* drop
* slider

# JsHelper::request($url, $options = array())¶

Generate a javascript snippet to create an XmlHttpRequest or ‘AJAX’ request.

**Event Options**

* complete - Callback to fire on complete.
* success - Callback to fire on success.
* before - Callback to fire on request initialization.
* error - Callback to fire on request failure.

**Options**

* method - The method to make the request with defaults to GET in more libraries
* async - Whether or not you want an asynchronous request.
* data - Additional data to send.
* update - Dom id to update with the content of the request.
* type - Data type for response. ‘json’ and ‘html’ are supported. Default is html for most libraries.
* evalScripts - Whether or not script tags should be eval’ed.
* dataExpression - Should the data key be treated as a callback. Useful for supplying $options['data'] as another Javascript expression.


## Other Methods

* **JsHelper::object($data, $options = array())**
Serializes $data into JSON. This method is a proxy for json_encode() with a few extra features added via the $options parameter.

* **JsHelper::sortable($options = array())**
Sortable generates a javascript snippet to make a set of elements (usually a list) drag and drop sortable.

* **JsHelper::get($selector)**
Set the internal ‘selection’ to a CSS selector. The active selection is used in subsequent operations until a new selection is made.

* **JsHelper::set(mixed $one, mixed $two = null)**
Pass variables into Javascript. Allows you to set variables that will be output when the buffer is fetched with JsHelper::getBuffer() or JsHelper::writeBuffer(). The Javascript variable used to output set variables can be controlled with JsHelper::$setVariable.

* **JsHelper::drag($options = array())**
Make an element draggable.

* **JsHelper::drop($options = array())**
Make an element accept draggable elements and act as a dropzone for dragged elements.

* **JsHelper::slider($options = array())**
Create snippet of Javascript that converts an element into a slider ui widget.

* **JsHelper::effect($name, $options = array())**
Creates a basic effect. By default this method is not buffered and returns its result.

* **JsHelper::event($type, $content, $options = array())**
Bind an event to the current selection. $type can be any of the normal DOM events or a custom event type if your library supports them.

* **JsHelper::domReady($callback)**
Creates the special ‘DOM ready’ event. JsHelper::writeBuffer() automatically wraps the buffered scripts in a domReady method.

* **JsHelper::each($callback)**
Create a snippet that iterates over the currently selected elements, and inserts $callback.

* **JsHelper::alert($message)**
Create a javascript snippet containing an alert() snippet. By default, alert does not buffer, and returns the script snippet.

* **JsHelper::confirm($message)**
Create a javascript snippet containing a confirm() snippet. By default, confirm does not buffer, and returns the script snippet.

* **JsHelper::prompt($message, $default)**
Create a javascript snippet containing a prompt() snippet. By default, prompt does not buffer, and returns the script snippet.

* **JsHelper::submit($caption = null, $options = array())**
Create a submit input button that enables XmlHttpRequest submitted forms. Options can include both those for FormHelper::submit() and JsBaseEngine::request(), JsBaseEngine::event();.

* **JsHelper::link($title, $url = null, $options = array())**
Create an html anchor element that has a click event bound to it.

* **JsHelper::serializeForm($options = array())**
Serialize the form attached to $selector. Pass true for $isForm if the current selection is a form element.

* **JsHelper::redirect($url)**
Redirect the page to $url using window.location.

* **JsHelper::value($value)**
Converts a PHP-native variable of any type to a JSON-equivalent representation. Escapes any string values into JSON compatible strings. UTF-8 characters will be escaped.


# Find more about JSHelper

* [Using JSHelper with Cake PHP 2.x applications](http://book.cakephp.org/2.0/en/core-libraries/helpers/js.html)