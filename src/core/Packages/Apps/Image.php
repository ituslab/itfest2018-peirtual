<?php
  /**
   *
   */
  namespace Package\Apps;
  use Package\Apps\SimpleImage;
  
  class Image extends SimpleImage{
    private $success = false, $uploadImages = [], $successPath = [], $errors = [], $pathReplace;

    public function __construct($pathReplace = ''){
      $this->pathReplace = $pathReplace;
    }

    public function success(){
      return $this->success;
    }

    public function addError($error){
      $this->errors[] = $error;
    }

    public function addSuccessPath($key, $path){
      $this->successPath[$key] = '/'.substr(strstr($path, $this->pathReplace), strlen($this->pathReplace));
    }

    public function getSuccessPath(){
      return $this->successPath;
    }

    public function getErrors(){
      return $this->errors;
    }

    public function uploadImages($path, $images = []){
      foreach ($images as $key => $image) {
        $name = strtolower($image['name']);
        $error = $image['error'];
        $format = $image['type'];
        $size = $image['size'];
        $from = $image['tmp_name'];
        $extension = '.'.pathinfo($name, PATHINFO_EXTENSION);
        $location = str_replace($extension, '', $name);
        $location = '['.$key.']-'.date('[Y-m-d]-His-').rand(0, 99).$extension;
        $toLocation = $path.$location;
        if ($error === 2) {
          $this->addError($name.": Error. Image exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.");
        }else if ($error === 3) {
          $this->addError($name.": Error. Image was only partially uploaded.");
        }else if ($error == 7) {
          $this->addError($name.": Failed to write image to disk");
        }else if (!$error) {
          if(($extension == '.jpg') || ($extension == '.jpeg') || ($extension == '.png')) {
            $this->uploadImages[$key][$from] = $toLocation;
          }else {
            $this->addError($name.": Image format must be JPG/JPEG/PNG");
          }
        }else {
          $this->addError($name.": UNKNOWN FATAL ERROR. FAILED TO UPLOAD IMAGE");
        }
      }
      if (empty($this->errors)) $this->saveImages($this->uploadImages);
      return $this;
    }

    public function saveImages($images = [], $width = 500, $height = 500){
      if (!empty($images)) {
        foreach ($images as $key => $image) {
          foreach ($image as $from => $to) {
            $this->load($from);
            $this->resize($width, $height);
            $this->save($to);
            $this->addSuccessPath($key, $to);
          }
        }
        $this->success = true;
      }
    }

  }

?>
