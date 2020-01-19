<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends MY_Model
{
  protected $_table = "data_buku";
  protected $has_many = [
    'history' => [
      'primary_key' => 'book_id',
      'model'       => 'history_model']
    ];

  public function __construct()
  {
    parent::__construct();
  }
}
