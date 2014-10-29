<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('categoria');
		$this->load->model('subcategoria');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$class = strtolower(get_class());
		$datos['class'] = $class;
		$datos['categoria'] = $this->categoria->get();
		$this->template->asset_js('ajax/post_sub_categoria.js');
		$this->template->write('title', 'Categorias');
		$this->template->write_view('content', 'categorias/list', $datos);
		$this->template->render();
	}

	public function ajax_subcategoria()
	{
		$id_categoria = $this->input->post('idCategoria');
		if(!empty($id_categoria)):
			$subcategoria = $this->subcategoria->get_rel($id_categoria, 'idCategoria');
			if ($subcategoria->num_rows()):
				echo '<ul class="list-group">';
				foreach ($subcategoria->result() as $row) {
					echo '
						<li class="list-group-item">
							<div class="checkbox">
								<label>
									<input type="checkbox">'.$row->nombre.'<a href="" class="btn btn-danger list-eliminar"><i class="fa fa-times"></i></a>
								</label>
							</div>
						</li>
					';
				}
				echo '</ul>';
			else:
				echo '<p class="form-control-static">No hay resultados</p>';
			endif;
		else: 
			echo '<p class="form-control-static">No hay resultados</p>';
		endif;
	}

	public function ajax_list_subcategoria()
	{
		$id_categoria = $this->input->post('idCategoria');
		if(!empty($id_categoria)):
			$idSubcategoria = $this->input->post('idSubcategoria');
			$subcategoria = $this->subcategoria->get_rel($id_categoria, 'idCategoria');
			if ($subcategoria->num_rows()):
				echo '<select name="datos[idSubcategoria]" id="subcategoria" class="form-control">';
				echo '<option value="">Seleccione una Sub-categoría</option>';
				foreach ($subcategoria->result() as $row) {
					echo '
						<option value="'.$row->id.'"'.validar_seleccion($idSubcategoria, $row->id).'>'.$row->nombre.'</option>
					';
				}
				echo '</select>';
			else:
				echo '<option value="">No se encontraron resultados.</option>';
			endif;
		else: 
			echo '<option value="">No se encontraron resultados.</option>';
		endif;
	}

	public function insert_categoria()
	{
		$class = strtolower(get_class());
		$this->load->helper('formulario');
		$this->form_validation->set_error_delimiters('<span class="help-block col-lg-4">', '</span>');
		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|max_length[150]|trim');
		
		$config['upload_path'] = './assets/img/categorias';
	    $config['allowed_types'] = 'png';
	    $config['max_size'] = '10000';
	    $config['encrypt_name'] = TRUE;

	    $this->load->library('upload', $config); 

		if ($this->form_validation->run()) {
			if($this->upload->do_upload('archivo')){
				$aux = $this->upload->data();
			    
				$insert = array_merge($this->input->post('datos'), array('foto' => $aux['file_name']));

				if ($this->categoria->insert($insert)) {
					$this->session->set_flashdata('msg_success', 'La categoria ha sido agregado.');
					redirect($class);
				}
			}
			else
			{
				echo $this->upload->display_errors('<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">x</button>
				<h4>Error</h4>', '</div>');
			}
		}

		$this->index();
	}

	public function editar_categoria($id = '')
	{
		$class = strtolower(get_class());
		if (! $this->categoria->exists($id)) {
			redirect($class);
		}
		$this->load->helper('formulario');
		$edit = $this->categoria->get($id)->row_array();
		$this->form_validation->set_error_delimiters('<span class="help-block col-lg-4">', '</span>');
		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|max_length[150]|trim');

		$config['upload_path'] = './assets/img/categorias';
	    $config['allowed_types'] = 'png';
	    $config['max_size'] = '10000';
	    $config['encrypt_name'] = TRUE;

	    $this->load->library('upload', $config); 


		if($this->upload->do_upload('archivo')){
			$aux = $this->upload->data();
			$update = array_merge($this->input->post('datos'), array('foto' => $aux['file_name']));
			if ($this->categoria->update($update, $id) !== FALSE) {
				$this->session->set_flashdata('msg_success', 'Los datos de la categoria han sido actualizados.');
				redirect($class);
			} 
		}

		if ($this->categoria->update($this->input->post('datos'), $id) !== FALSE) {
			$this->session->set_flashdata('msg_success', 'Los datos de la categoria han sido actualizados.');
			redirect($class);
		} else {
			
		}

		if ($this->input->post('datos')) {
			$datos = $this->input->post('datos');
		} else {
			$datos = $edit;
		}
		$datos = $this->categoria->prepare_data($datos);
		$datos['class'] = $class;
		$datos['id'] = $id;
		$this->load->view('categorias/form',$datos);
		
	}

	public function eliminar($id = '')
	{
		$class = strtolower(get_class());
		if (!empty($id)) {
			$this->categoria->delete($id);
			$this->session->set_flashdata('msg_success', 'La categoria ha sido eliminado.');
		}
		redirect($class);
	}

	public function insert_subcategoria()
	{
		$this->load->helper('formulario');
		$this->form_validation->set_error_delimiters('<span class="help-block col-lg-4">', '</span>');
		$this->form_validation->set_rules('datos[nombre]', 'sub-categoria', 'required|max_length[150]|trim');
		$this->form_validation->set_rules('datos[idCategoria]', 'nombre', 'required|max_length[1]|trim');
		
		if ($this->form_validation->run()) {
				if ($this->subcategoria->insert( $this->input->post('datos') )) {
				$this->session->set_flashdata('msg_success', 'La Sub-Categoría ha sido agregado.');
				redirect('categorias');
			}
		}

		$this->index();
	}
}

/* End of file categorias.php */
/* Location: ./application/controllers/categorias.php */