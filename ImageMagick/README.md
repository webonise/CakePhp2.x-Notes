# How to use Image Magick Component.

As everyone have in there mind how to resize the images, and not asking Users of the application to upload an image of definite size.
There are couple of ways to do it via PHP.
The most known one which we use very often while development is, by the use of Image Magick Library.

## Minimal requirement :
* As this is PHP team's code snippet section, one should have the LAMP installed in place; for which you can follow the below give link,

* [PHP LAMP Installation][installation]
[installation]: https://sites.google.com/a/weboniselab.com/php-team/lamp-installation
* or one can follow the shell script for PHP dev environment - [click here][env]
[env]: http://www.google.com/url?q=https%3A%2F%2Fgist.github.com%2F81d5c4cd30b58554ac71&sa=D&sntz=1&usg=AFrqEzee5owHXLD1SnPDc9_di3_k1GjyZw

* Another prior requirement is that Image Magick has to be [installed][imagemagick] in your system with php.
[imagemagick]: http://www.imagemagick.org/script/install-source.php

* Now while using the ImageMagick Component should be there under your application's Controller/Component folder.
[click to see the component][component]
[component]: https://github.com/webonise/CakePhp2.x-Notes/blob/master/app/Controller/Component/ImageMagickComponent.php
* Now how to Use is, it given below :

After uploading the file to Local Server (i.e Apache), pass the physical path of the file to be resized to ImageMagick, followed with the dimensions and the path to resized file.


      $this->ImageMagick->resize([FILE_PATH] , [WIDTH] , [HEIGHT] , [TAG] , [CACHED_FILE_PATH] , [QUALITY] , [PHYSICAL_PATH_OF_THE_FILE_TO_BE_RESIZED] );

Usually, **Tag** is kept as TRUE and **Quality** is kept as 100;for a better quality image after resizing.

I hope this helps. Please feel free to add/edit the post, as per convenience.
