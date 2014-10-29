<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends MY_Model {

	protected $_id    = 'id';
	protected $_table = 'blogs';
	protected $pre_insert  = array('datetime_creado');
	protected $pre_update  = array('datetime_modificado');
	protected $field_names = array('nombre', 'descripcion', 'url', 'idCategoria', 'idSubcategoria', 'visible', 'fecha_publicacion', 'creado', 'modificado');

	public function __construct()
	{
		parent::__construct();
	}

	public function datetime_creado($datos)
	{
		$datos['creado'] = date('Y-m-d H:i:s');
		return $datos;
	}

	public function datetime_modificado($datos)
	{
		$datos['modificado'] = date('Y-m-d H:i:s');
		return $datos;
	}

	public function busqueda($buscar = '', $offset = 0, $limit = 15, $categoria = '', $subcategoria = '')
	{
		$this->db->select('SQL_CALC_FOUND_ROWS id, nombre, visible, descripcion, fecha_publicacion, 
			(select nombre from categorias where blogs.idCategoria = categorias.id limit 1) as categoria,
			(select original from imagen_blog where imagen_blog.idBlog = blogs.id limit 1) as foto
			', FALSE);

		if (!empty($buscar)) {
			$this->db->like("CONCAT(nombre)", $buscar, 'both', FALSE);
		}

		$this->db->order_by('fecha_publicacion', 'DESC');
		$limit  = (is_numeric($limit)) ? $limit:15;

		if ($limit != 0) {
			$offset = (is_numeric($offset)) ? $offset:0;
			$this->db->limit($limit, $offset);
		}

		return $this->db->get($this->_table);
	}

	public function noticias($categoria = '', $offset = 0, $limit = 15)
	{
		$this->db->select('SQL_CALC_FOUND_ROWS id, nombre, visible, descripcion, fecha_publicacion, 
			(select nombre from categorias where blogs.idCategoria = categorias.id limit 1) as categoria,
			(select original from imagen_blog where imagen_blog.idBlog = blogs.id limit 1) as foto
			', FALSE);
		if ($categoria != ''){ $this->db->where('idCategoria', $categoria);}

		$this->db->order_by('fecha_publicacion', 'DESC');
		$limit  = (is_numeric($limit)) ? $limit:15;

		if ($limit != 0) {
			$offset = (is_numeric($offset)) ? $offset:0;
			$this->db->limit($limit, $offset);
		}

		return $this->db->get($this->_table);
	}

	public function noticias_perfil($id = '')
	{
		$this->db->select('SQL_CALC_FOUND_ROWS id, nombre, visible, descripcion, fecha_publicacion, 
			(select nombre from categorias where blogs.idCategoria = categorias.id limit 1) as categoria,
			(select original from imagen_blog where imagen_blog.idBlog = blogs.id limit 1) as foto
			', FALSE);

		$this->db->where('id', $id);

		return $this->db->get($this->_table);
	}

	public function noticias_recientes($offset = 0, $limit = 5)
	{
		$this->db->select('SQL_CALC_FOUND_ROWS id, nombre, visible, descripcion, fecha_publicacion, 
			(select nombre from categorias where blogs.idCategoria = categorias.id limit 1) as categoria,
			(select original from imagen_blog where imagen_blog.idBlog = blogs.id limit 1) as foto
			', FALSE);

		$this->db->order_by('fecha_publicacion', 'DESC');
		$limit  = (is_numeric($limit)) ? $limit:5;

		if ($limit != 0) {
			$offset = (is_numeric($offset)) ? $offset:0;
			$this->db->limit($limit, $offset);
		}

		return $this->db->get($this->_table);
	}
}
/* End of file revista.php */
/* Location: ./application/models/revista.php */