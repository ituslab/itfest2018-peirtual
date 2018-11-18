<?php
namespace Package\App;

use Package\App\Image;

class File extends Image{

    private
      $success = false,
      $files = [],
      $successPath = [],
      $errors = [],
      $pathReplace,
      $path;

    public function __construct($relativePath = './'){
      $this->pathReplace = $relativePath;
    }

    public function setPath($path = ''){
      $this->path = $this->pathReplace.$path;
      return $this;
    }

    public function addError($error){
      $this->errors[] = $error;
    }

    public function addSuccessPath($key, $path){
      $this->successPath[$key] = '/'.substr(strstr($path, $this->pathReplace), strlen($this->pathReplace));
    }

    public function success(){
      return $this->success;
    }

    public function getErrors(){
      return $this->errors;
    }

    public function getSuccessPath(){
      return $this->successPath;
    }

    public function upload($files = [], $width = 500, $height = 500){
      foreach ($files as $key => $file) {
        $name = strtolower($file['name']);
        $error = $file['error'];
        $format = $file['type'];
        $size = $file['size'];
        $from = $file['tmp_name'];
        $extension = '.'.pathinfo($name, PATHINFO_EXTENSION);
        $location = str_replace($extension, '', $name);
        $location = '['.$key.']-'.date('[Y-m-d]-His-').rand(0, 999).$extension;
        $toLocation = $this->path.$location;
        if ($error === 2) {
          $this->addError($name.": Error. file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.");
        }else if ($error === 3) {
          $this->addError($name.": Error. file was only partially uploaded.");
        }else if ($error === 7) {
          $this->addError($name.": Failed to write file to disk");
        }else if (!$error) {
          $this->files[$key][$from] = $toLocation;
        }else {
          $this->addError($name.": UNKNOWN FATAL ERROR. FAILED TO UPLOAD file");
        }
      }
      if (empty($this->errors)) {
        if (!file_exists($this->path)) mkdir($this->path);
        $this->move($this->files, $width, $height);
      }
      return $this;
    }

    public function move($files = [], $width, $height){
      if (!empty($files)) {
        foreach ($files as $key => $file) {
          foreach ($file as $from => $to) {
            $extension = '.'.pathinfo($to, PATHINFO_EXTENSION);
            if (($extension == '.jpg') || ($extension == '.jpeg') || ($extension == '.png')) {
              $this->load($from);
              $this->resize($width, $height);
              $this->save($to);
            }else {
              move_uploaded_file($from, $to);
            }
            $this->addSuccessPath($key, $to);
          }
        }
        $this->success = true;
      }
    }

    public function delete($files = []){
      foreach ($files as $location) {
        $file = $this->pathReplace.$location;
        if (file_exists($file) && is_file($file)) unlink($file);
        else continue;
      }
      return $this;
    }

    public function rmdir($dir){
      $dir = $this->pathReplace.$dir;
      if (is_dir($dir)) {
        rmdir($dir);
        return true;
      }
      return false;
    }

  }
