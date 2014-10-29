<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blogs extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('blog');	
		$this->load->model('categoria');		
		$this->load->model('imagen_blog');
	}

	public function index()
	{		
		$class = strtolower(get_class());
		if ($this->input->post('del')) {
			$this->blog->delete($this->input->post('del'));
			$this->session->set_flashdata('msg_success', 'El blog han sido eliminados de manera permanente.');
			redirect($class);
		}

		$default = array('buscar', 'offset');
		$param   = $this->uri->uri_to_assoc(3, $default);
		$num_results = 15;

		$param['buscar'] = ($this->input->post('buscar') != '') ? $this->input->post('buscar', TRUE):$param['buscar'];

		$this->load->library('pagination');
		$datos  = array();
		$datos['msg_success'] = $this->session->flashdata('msg_success');
		$datos['query']       = $this->blog->busqueda( $param['buscar'], $param['offset'], $num_results );
		$datos['buscar']      = $param['buscar'];
		$datos['form_action'] = '/'.$class;

		if (empty($param['buscar'])) {
			unset($param['buscar']);
			$config['uri_segment'] = 4;
		} else {
			$config['uri_segment'] = 6;
		}

		$param['offset'] = '';
		$config['total_rows']    = $this->blog->found_rows();
		$config['base_url']      = '/'.$class.'/index/'.$this->uri->assoc_to_uri($param);
		$config['per_page']      = $num_results;
		
		$this->pagination->initialize($config);

		$datos['pages']          = $this->pagination->create_links();
		$config['num_links']     = 1;

		$this->pagination->initialize($config);
		$datos['pages_mobile']   = $this->pagination->create_links();
		$datos['class'] = $class;
		$this->template->asset_js('consulta.js');
		$this->template->write('title', 'blogs');
		$this->template->write_view('content', 'blog/list', $datos);
		$this->template->render();
	}

	public function nuevo()
	{	
		$class = strtolower(get_class());	
		$this->load->helper('formulario');
		$this->form_validation->set_error_delimiters('<span class="help-block col-lg-4">', '</span>');
		$this->form_validation->set_rules('datos[nombre]', 'nombre noticia', 'required|max_length[150]|trim');
		$this->form_validation->set_rules('datos[url]', 'url noticia', 'required');
		$this->form_validation->set_rules('datos[descripcion]', 'descripcion', 'required|trim');
		$this->form_validation->set_rules('datos[fecha_publicacion]', 'fecha de publicacion', 'required|trim');
		$this->form_validation->set_rules('datos[idCategoria]', 'categoria', 'required|trim');
		$this->form_validation->set_rules('datos[idSubcategoria]', 'sub-categoría', 'trim');
		$this->form_validation->set_rules('datos[visible]', 'blog visible', 'required|trim');
		
		if ($this->form_validation->run()) {

			if ($this->blog->insert( $this->input->post('datos') )) {
				$this->session->set_flashdata('msg_success', 'El blog ha sido agregado.');
				redirect($class.'/images/'.$this->db->insert_id(), 'refresh');
			}
		}

		$datos = $this->blog->prepare_data($this->input->post('datos'));
		$datos['class'] = $class;
		$datos['categoria'] = $this->categoria->get();
		$datos['titulo_form'] = 'Agregar blog';
		$this->template->asset_css('jquery-te-1.4.0.css');
		$this->template->asset_js('jquery-te-1.4.0.min.js');
		$this->template->asset_js('texarea.js');
		$this->template->asset_css('datetimepicker.css');
		$this->template->asset_js('datetimepicker.js');
		$this->template->asset_js('fecha_hora.js');
		$this->template->asset_js('url.js');
		$this->template->asset_js('url-active.js');
		$this->template->asset_js('ajax/post_list_sub_categoria.js');
		$this->template->write('title', 'Agregar noticia');
		$this->template->write_view('content', 'blog/form', $datos);
		$this->template->render();
	}

	public function editar($id = '')
	{
		$class = strtolower(get_class());
		if (! $this->blog->exists($id)) {
			redirect($class);
		}

		$this->load->helper('formulario');
		$edit = $this->blog->get($id)->row_array();
		$this->form_validation->set_error_delimiters('<span class="help-block col-lg-4">', '</span>');
		$this->form_validation->set_rules('datos[nombre]', 'nombre noticia', 'required|max_length[150]|trim');
		$this->form_validation->set_rules('datos[descripcion]', 'descripcion', 'required|trim');
		$this->form_validation->set_rules('datos[fecha_publicacion]', 'fecha de publicacion', 'required|trim');
		$this->form_validation->set_rules('datos[idCategoria]', 'categoria', 'required|trim');
		$this->form_validation->set_rules('datos[idSubcategoria]', 'sub-categoría', 'trim');
		$this->form_validation->set_rules('datos[visible]', 'blog visible', 'required|trim');

		if ($this->form_validation->run()) {

			if ($this->blog->update($this->input->post('datos'), $id) !== FALSE) {
				$this->session->set_flashdata('msg_success', 'Los datos de la blog han sido actualizados.');
				redirect($class);
			} else {
				
			}
		}

		if ($this->input->post('datos')) {
			$datos = $this->input->post('datos');
		} else {
			$datos = $edit;
		}

		$datos = $this->blog->prepare_data($datos);
		$datos['class'] = $class;
		$datos['categoria'] = $this->categoria->get();
		$datos['titulo_form'] = 'Modificar blog';
		$this->template->asset_css('jquery-te-1.4.0.css');
		$this->template->asset_js('jquery-te-1.4.0.min.js');
		$this->template->asset_js('texarea.js');
		$this->template->asset_css('datetimepicker.css');
		$this->template->asset_js('datetimepicker.js');
		$this->template->asset_js('fecha_hora.js');
		$this->template->asset_js('url.js');
		$this->template->asset_js('url-active.js');
		$this->template->asset_js('ajax/post_list_sub_categoria.js');
		$this->template->write('title', 'Modificar noticia');
		$this->template->write_view('content', 'blog/form', $datos);
		$this->template->render();
	}

	public function detalle($id = '')
	{
		if (! $this->blog->exists($id)) {
			show_error('El blog no existe');
		} else {
			$datos = $this->blog->get($id)->row_array();
			$this->load->view('blogs/details', $datos);
		}
	}

	public function eliminar($id = '')
	{
		if (!empty($id)) {
			$this->blog->delete($id);
			$this->session->set_flashdata('msg_success', 'El blog ha sido eliminado.');
		}
		redirect('blogs');
	}

	public function images($id = '')
	{
		$class = strtolower(get_class());
		if (!empty($id)) {
			$this->load->helper('formulario');
			$this->form_validation->set_error_delimiters('<span class="help-block col-lg-4">', '</span>');
			$this->form_validation->set_rules('datos[tipoImagen]', 'tipo de la imagen', 'required|max_length[150]|trim');
			$dir = 'assets/img/'.$class.'/'.$id;
			if(!file_exists($dir))
			{
				mkdir($dir,0777); 
			}
			$config['upload_path'] = $dir;
		    $config['allowed_types'] = 'jpg|png|jpeg';
		    $config['max_size'] = '250000';
		    $config['max_width'] = '2024';
		    $config['max_height'] = '2024';
		    $config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config); 

			if ($this->form_validation->run()) {
				if($this->upload->do_upload('imagen')) {
					$image = $this->upload->data(); 
					$insert = array_merge(array('original' => $image['file_name'], 'idblog' => $id), $this->input->post('datos'));

					if ($this->imagen_blog->insert($insert)) {
						$this->session->set_flashdata('msg_success', 'La imagen ha sido agregado.');
						redirect($class.'/images/'.$id);
					}
				}
				else
				{
					echo $this->upload->display_errors('<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<h4>Error</h4>', '</div>');
				}
			}

			$datos = $this->imagen_blog->prepare_data($this->input->post('datos'));
			$datos['id'] = $id;
			$datos['imagenes'] = $this->imagen_blog->get_img($id, 'idblog');
			$datos['class'] = $class;
			$datos['titulo_form'] = 'Agregar Imagen';
			$this->template->write('title', 'Agregar Imagen');
			$this->template->write_view('content', 'blog/form_img', $datos);
			$this->template->render();
		}
	}

	public function eliminar_img($idImagen = '', $id)
	{
		$class = strtolower(get_class());
		if (!empty($idImagen)) {
			$delete = $this->imagen_blog->get($idImagen)->row();
				unlink('assets/img/'.$class.'/'.$id.'/'.$delete->original);
			$this->imagen_blog->delete($idImagen);
			$this->session->set_flashdata('msg_success', 'La imagen ha sido eliminado.');
		}
		redirect($class.'/images/'.$id);
	}
}

/* End of file blog.php */
/* Location: ./application/controllers/blog.php */