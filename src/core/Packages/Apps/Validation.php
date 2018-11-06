<?php
/**
 *
 */
namespace Package\Apps;
use Package\Database\Mysql;

class Validation extends Mysql{
  private $valid  = false, $errors = [], $connection, $table;

  public function __construct($validateTable = null){
    $this->connection = parent::getConnection();
    $this->table = $validateTable;
  }

  private function addError($error){
    $this->errors[] = $error;
  }

  public function errors(){
    return $this->errors;
  }

  public function valid(){
    return $this->valid;
  }

  public function checkUniqueData($column, $value, $dataSkip = false){
    $checkData = $this->connection->get($this->table, [$column.'=' => $value]);
    if (($dataSkip !== false) && $checkData) {
      if (!($dataSkip == $checkData[$column])) {
        return true;
      }
    }
    elseif ($checkData) {
      return true;
    }
    return false;
  }

  public function checkData($items = array(), $dataSkip = false){
    foreach ($items as $item => $rules) {
      foreach ($rules as $rule => $rule_value) {
        switch ($rule) {
          case 'required':
            if (trim(!Input::get($item)) && $rule_value) {
              $this->addError(strtoupper("$item wajib diisi!!"));
            }
            break;
          case 'min':
            if (strlen(Input::get($item)) < $rule_value) {
              $this->addError(strtoupper("$item minimal $rule_value karakter!!"));
            }
            break;
          case 'max':
            if (strlen(Input::get($item)) > $rule_value) {
              $this->addError(strtoupper("$item maksimal $rule_value karakter!!"));
            }
            break;
          case 'unique':
            if (!$dataSkip) {
              $isRegistered = $this->checkUniqueData($item, Input::get($item));
            }else {
              $isRegistered = $this->checkUniqueData($item, Input::get($item), $dataSkip);
            }
            if (($isRegistered === true) && $rule_value) {
              $this->addError(strtoupper("$item sudah terdaftar silahkan cari $item lain!!"));
            }
            break;
          default:
            break;
        }
      }
    }
    if (empty($this->errors)) {
      $this->valid = true;
    }
    return $this;
  }
}

?>
