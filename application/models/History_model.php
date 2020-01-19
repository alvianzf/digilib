<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_model extends MY_Model
{
  protected $_table = "history";
  protected $belongs_to = [
      'buku' => [
        'primary_key' => 'book_id',
        'model'       => 'buku_model'
      ]
    ];

  public function __construct()
  {
    parent::__construct();
  }
}
