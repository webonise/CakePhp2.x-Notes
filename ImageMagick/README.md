# How to use Image Magick Component.
Hey everyone,
As everyone have in there mind how to resize the images, and not asking Users of the application to upload an image of definite size.There are couple of ways to do it via PHP. The most known one which we use very often while development is, by the use of Image Magick Library.

## Minimal requirement :
*   As this is PHP team's code snippet section, one should have the LAMP installed in place; for which you can follow the below give link,

*   PHP LAMP Installation

or one can follow the shell script for PHP dev environment - click here

* Another prior requirement is that Image Magick has to be installed in your system with php.

* Now while using the ImageMagick Component should be there under your application's Controller/Component folder.

* Now how to Use is, it given below :

After uploading the file to Local Server (i.e Apache), pass the physical path of the file to be resized to ImageMagick, followed with the dimensions and the path to resized file.


...ImageMagick
$this->ImageMagick->resize([FILE_PATH] , [WIDTH] , [HEIGHT] , [TAG] , [CACHED_FILE_PATH] , [QUALITY] , [PHYSICAL_PATH_OF_THE_FILE_TO_BE_RESIZED] );**


Usually, Tag is kept as TRUE and Quality is kept as 100;for a better quality image after resizing.
I hope this helps. Please feel free to add/edit the post, as per convenience.
...