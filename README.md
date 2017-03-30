## Imagesolution

A complete solution for all kind of image operation. 

## Current Version

Release 1.0.0

## Installation

Put package name in the composer.json file.
````
"require": {
		........: ........,
		........: ........,
        "shahreare/imagesolution": "dev-master"
    }
````
Then run composer update command. Then create the image object in your code with the image file name;


````
$image = new \Imagesolution\Imagesolution('asset/logo.jpg');
````

## Code Example

There are several functionality this class can do.

### View Image Dimension
**getDim()** function return an associative array with height and width of the image.
```
$val = $image->getDim();
echo $val['width']; // print width of the image
echo $val['height']; // print height of the image

```
 
### View Image Type ###
**getFileType()** function return the image type(extension) of the image.

```
echo $image->getFileType(); // print jpg/png/gif

```

### Convert Image To PNG ###
To convert the image to png file from any file type use **convertToPNG()** function. This function will convert the image to png file with same name and same directory. Write permission is required on the directory to perform this operation.

```
$image->convertToPNG()

```
### Convert Image To JPG ###
 To convert the image to jpg file from any file type use **convertToJPG()** function. This function will convert the image to jpg file with same name and same directory. Write permission is required on the directory to perform this operation.

```
$image->convertToJPG()

```
### Convert Image To GIF ###
 To convert the image to gif file from any file type use **convertToGIF()** function. This function will convert the image to gif file with same name and same directory. Write permission is required on the directory to perform this operation.

```
$image->convertToGIF()

```
### Resize Image ###
**resize()** function is for resizing the current image. This function needs two parameter width and height. By default maintaining aspect ratio is turned off. to maintain aspect ratio you have to add optional third parameter. In case of resize with aspect ratio, height and width will be calculated according to the image using given width and height as maximum value. Write permission is required on the directory to perform this operation.

```
$image->resize($width, $height); // without aspect ratio
$image->resize($width, $height,1); // with aspect ratio

```
### Image FitToWidth ###
 **fitToWidth()** function is a variation of the resize() function. in this function you have to put the width of the image as parameter. this function will calculate the height according to the new width and resize the image. Write permission is required on the directory to perform this operation.

```
$image->fitToWidth($width);

```
### Image FitToHeight ###
 **fitToHeight()** is almost same as fitToWidth() function. As name suggest, instead of width it works on given height. Write permission is required on the directory to perform this operation.
```
$image->fitToHeight($height);

```
### Make Thumbnail ###
 **thumbnail()** function is to make a  small square image. By default it make 100x100 image. To use different length you can put your desire value in the parameter. Write permission is required on the directory to perform this operation.

```
$image->thumbnail();
$image->thumbnail($width);

```
### Rename Image ###
 To change the name of image use rename() function. this will change the name of the image. newfilename should be only name(no directory and no extention). this function keeps same location and image type. Write permission is required on the directory to perform this operation.
```
$image->rename($newfilename);

```
### Copy Image ###
As name suggest, this function is to create a copy  of the image with given name. this function copy the image and keeps in the same location. Write permission is required on the directory to perform this operation.
```
$image->copyImage($filename);

```


## TODO

This is a work in progress. The class will be expanded from time to time.

## Contributors

- Report issues
- Open pull request with improvements
- Spread the word
- Reach out to me directly at [A H M Reza Shahreare Khan](http://www.shahreare.me)

## License

MIT © [A H M Reza Shahreare Khan](http://www.shahreare.me)
