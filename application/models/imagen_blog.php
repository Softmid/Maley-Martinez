<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imagen_Blog extends MY_Model {

	protected $_id    = 'id';
	protected $_table = 'imagen_blog';
	protected $field_names = array('idBlog','tipoImagen','original');

	public function __construct()
	{
		parent::__construct();
	}

}
/* End of file imagen_revista.php */
/* Location: ./application/models/imagen_revista.php */