# README.MD
This class allows to manage phar files.

## Installation
Download from github into the corresponding folder.

## Example
### Creating phar file

<p>$srcRoot = $ruta . '\phar\src'; \\Folder which contains the php files will be added to phar file.</p>
<p>$buildRoot = $ruta . '\phar\build'; \\Folder where phar file will be generated.</p>

<p>$phar = new CreatePHAR('C:\xampp\htdocs\phar\src','C:\xampp\htdocs\phar\build','myPHARFile.phar');</p>
<p>$phar->generatePhar();</p>

### Extracting file(s) from phar file

<p>$phar = new CreatePHAR('C:\xampp\htdocs\phar\src','C:\xampp\htdocs\phar\build','hola.phar');</p>
<p>$phar->extractPharFiles('C:\xampp\htdocs\phar\extract',array('file1.php', ...));</p>

### Extracting all file from phar file

<p>$phar = new CreatePHAR('C:\xampp\htdocs\phar\src','C:\xampp\htdocs\phar\build','hola.phar');</p>
<p>$phar->extractAllPharFiles('C:\xampp\htdocs\phar\extract');</p>

### Delete file from phar file

<p>$phar = new CreatePHAR('C:\xampp\htdocs\phar\src','C:\xampp\htdocs\phar\build','hola.phar');</p>
<p>$phar->deleteFileFromPhar('c.php');</p>

## Using  phar file
<p>//It's supposed thar class1.php has been added to myPhar.phar file</p>
<p>include 'phar://C:\xampp\htdocs\phar\build\myPhar.phar/class1.php';</p>
<p>require ('C:\xampp\htdocs\phar\build\pruebas.phar');</p>
<p>$class1 = new Class1();</p>
<p>$class1->method1();</p>
