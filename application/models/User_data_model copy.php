<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_model extends MY_Model
{
  protected $_table = "history";

  public function __construct()
  {
    parent::__construct();
  }
}
