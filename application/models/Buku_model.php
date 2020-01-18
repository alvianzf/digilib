<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends MY_Model
{
  protected $_table = "data_buku";

  public function __construct()
  {
    parent::__construct();
  }
}
