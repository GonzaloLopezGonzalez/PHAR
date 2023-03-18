# README.MD
This class allows to manage phar files.

## Installation
Download from github into the corresponding folder.

## Example
### Creating phar file

$srcRoot = $ruta . '\phar\src'; \\Folder which contains the php files will be added to phar file.
$buildRoot = $ruta . '\phar\build'; \\Folder where phar file will be generated.

$phar = new CreatePHAR('C:\xampp\htdocs\phar\src','C:\xampp\htdocs\phar\build','myPHARFile.phar');
$phar->generatePhar();

### Extracting file(s) from phar file

$phar = new CreatePHAR('C:\xampp\htdocs\phar\src','C:\xampp\htdocs\phar\build','hola.phar');
$phar->extractPharFiles('C:\xampp\htdocs\phar\extract',array('file1.php', ...));

### Extracting all file from phar file

$phar = new CreatePHAR('C:\xampp\htdocs\phar\src','C:\xampp\htdocs\phar\build','hola.phar');
$phar->extractAllPharFiles('C:\xampp\htdocs\phar\extract');

### Delete file from phar file

$phar = new CreatePHAR('C:\xampp\htdocs\phar\src','C:\xampp\htdocs\phar\build','hola.phar');
$phar->deleteFileFromPhar('c.php');


## Using  phar file
//It's supposed thar class1.php has been added to myPhar.phar file
include 'phar://C:\xampp\htdocs\phar\build\myPhar.phar/class1.php';
require ('C:\xampp\htdocs\phar\build\pruebas.phar');
$class1 = new Class1();
$class1->method1();
