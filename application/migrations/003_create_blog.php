<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_Blog extends CI_Migration {
	
	public function up()
	{
		$fields = array(
				"`id` int(11) NOT NULL AUTO_INCREMENT",
				"`nombre` varchar(200) NOT NULL",
				"`url` varchar(300) NOT NULL",
				"`descripcion` text NOT NULL",
				"`idCategoria` varchar(200) NOT NULL",
				"`idSubcategoria` varchar(200) NOT NULL",
				"`fecha_publicacion` date NOT NULL",
				"`visible` varchar(2) NOT NULL DEFAULT '1'",
				"`creado` datetime NOT NULL",
				"`modificado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'"
				);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('blogs', TRUE);
		$this->db->simple_query('ALTER TABLE  `blogs` DEFAULT CHARSET=utf8');

		$fields = array(
			"`id` bigint(20) NOT NULL AUTO_INCREMENT",
			"`original` varchar(250) NOT NULL DEFAULT ''",
			"`tipoImagen` int(2) NOT NULL",
			"`idBlog` int(12) NOT NULL",
			);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('imagen_blog', TRUE);
		$this->db->simple_query('ALTER TABLE  `imagen_blog` DEFAULT CHARSET=utf8');

		
	}

	public function down()
	{
		$this->dbforge->drop_table('blogs');
		$this->dbforge->drop_table('imagen_blog');
	}
}

/* End of file 003-create-blog.php */
/* Location: ./application/migrations/003_create_blog.php */