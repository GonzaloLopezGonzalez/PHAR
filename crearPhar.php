<?php
class CreatePHAR{

   private string $srcDir;
   private string $buildDir;
   private string $pharName;
   private object $phar;

    public function __construct(string $srcDir, string $buildDir, string $pharName){
        $this->srcDir = $srcDir;
        $this->buildDir = $buildDir;
        $this->pharName = $pharName;

        $this->checkPathIsDir($this->srcDir);
        $this->checkPathIsDir($this->buildDir);

        $this->createPharObject();
    }

    private function checkPathIsDir(string $path) : void{
      if (!is_dir($path)){
          throw new Exception($path .' is not a directory.');
      }
    }

    private function createPharObject() : void{
      $this->phar = new Phar($this->buildDir . '/' . $this->pharName,
       FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::KEY_AS_FILENAME, $this->pharName);
    }

    private function AddFileToPhar(string $file) : void{
      $this->phar[$file] = file_get_contents($this->srcDir . '/' . $file);
      $this->phar->setStub($this->phar->createDefaultStub($file));
    }

    private function iterateDir(){
      if ($dh = opendir($this->srcDir))
      {
          while (($file = readdir($dh)) !== false)
          {
            if ($file == '.' OR $file == '..') continue;
            $this->AddFileToPhar($file);
          }
          closedir($dh);
      }
    }

    public function generatePhar() :void{
      $this->iterateDir();
  }

  public function extractAllPharFiles(string $extractPath) :void {
      $this->checkPathIsDir($extractPath);
      try {
        $this->phar->extractTo( $extractPath);
      } catch (Exception $e) {
        throw new Exception($e->getMessage());
     }
  }

  public function extractPharFiles(string $extractPath, array $files) :void {
        $this->checkPathIsDir($extractPath);
        if(!is_array($files)){
          throw new InvalidArgumentException('The files to be extracted must be an array.' . ucfirst(gettype($files)) . ' passed');
        }
        try {
          $this->phar->extractTo($extractPath,$files);
        } catch (Exception $e) {
          throw new Exception($e->getMessage());
       }

  }

  public function deleteFileFromPhar(string $fileToDelete){
    try {
      $this->phar->delete($fileToDelete);
    } catch (Exception $e) {
      throw new Exception($fileToDelete .' could not be deleted.');
   }
  }

}
?>
