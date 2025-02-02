<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/La_Paz');
class Libros_controlador extends CI_Controller {

    public function m_listar()
    {
        $this->load->model('Libros_model');
        $listar = $this->Libros_model->listadelibros();
        $data['libross'] = $listar;
        $this->load->view('inc/header');
        $this->load->view('inc/menu');
        $this->load->view('libros/lista_libros', $data);
        $this->load->view('inc/footer');
    }

    public function agregar()
    {
        // Cargar modelos de categorías, editoriales y autores
        $this->load->model('Categoria_model');
        $this->load->model('Editorial_model');
        $this->load->model('Autor_model');
        
        // Obtener datos de categorías, editoriales y autores
        $data['categorias'] = $this->Categoria_model->listadecategorias();
        $data['editoriales'] = $this->Editorial_model->listadeeditoriales();
        $data['autores'] = $this->Autor_model->listadeautores();

        // Cargar vista con los datos
        $this->load->view('inc/header');
        $this->load->view('libros/agregar_libro', $data);
        $this->load->view('inc/footer');
    }
    public function agregarbd()
    {
        $this->load->library('form_validation');
    
        // Reglas de validación
        $this->form_validation->set_rules('titulov', 'Título de libro', 'required|min_length[5]|max_length[255]', 
            array(
                'required' => 'Se requiere el título',
                'min_length' => 'Por lo menos 5 caracteres',
                'max_length' => 'Máximo 255 caracteres en el título de libro'
            )
        );
    
        $this->form_validation->set_rules('isbnv', 'ISBN', 'required', 
            array('required' => 'Se requiere el ISBN')
        );
    
        $this->form_validation->set_rules('ubicacionv', 'Ubicación', 'required', 
            array('required' => 'Se requiere la ubicación del libro')
        );
    
        $this->form_validation->set_rules('categoria_idv', 'Categoría', 'required', 
            array('required' => 'Se requiere seleccionar una categoría')
        );
    
        $this->form_validation->set_rules('editorial_idv', 'Editorial', 'required', 
            array('required' => 'Se requiere seleccionar una editorial')
        );
    
        $this->form_validation->set_rules('autor_idv[]', 'Autores', 'required', 
            array('required' => 'Se requiere seleccionar al menos un autor')
        );
    
        
    
        // Si la validación falla
        if ($this->form_validation->run() == FALSE)
        {
            $this->agregar(); // Volver a cargar la vista con los datos
        }
        else
        {
            // Cargar modelo
            $this->load->model('Libros_model');
            
            // Datos del libro
            $data_libro = array(
                'titulo' => strtoupper($this->input->post('titulov')),
                'isbn' => $this->input->post('isbnv'),
                'ubicacion' => strtoupper($this->input->post('ubicacionv')),
                'fechacreacion' => date('Y-m-d H:i:s'),
                'idusuario' => $this->session->userdata('idusuario'), // ID del usuario logueado
                'categoria_id' => $this->input->post('categoria_idv'),
                'editorial_id' => $this->input->post('editorial_idv'),
                'autor_id' => $this->input->post('autor_idv')[0], // Enviar el primer autor seleccionado
            );
    
            // Llamar al método agregarEjemplar para agregar el libro
            $resultado = $this->Libros_model->agregarEjemplar($data_libro);
            
            if (!$resultado['success']) {
                // Manejar el error, por ejemplo, redirigir de nuevo a la vista con un mensaje de error
                $this->session->set_flashdata('error', $resultado['message']);
                $this->agregar();
                return;
            }
    
            $libro_id = $resultado['libro_id'];
    
            // Obtener la cantidad de ejemplares
            $cantidadEjemplares = (int)$this->input->post('cantidadejemplaresv');
            
            // Insertar la relación en la tabla intermedia `libro_has_autor`
            $autores = $this->input->post('autor_idv');
            if (!empty($autores)) {
                foreach ($autores as $autor_id) {
                    // Verifica si la inserción fue exitosa
                    if (!$this->Libros_model->agregarAutorLibro($libro_id, $autor_id)) {
                        // Manejar el error si la inserción falla
                        $this->session->set_flashdata('error', 'Error al agregar autor al libro.');
                        break; // Salir del bucle si hay un error
                    }
                }
            }
    
            // Agregar la cantidad de ejemplares
            for ($i = 0; $i < $cantidadEjemplares; $i++) {
                // Aquí puedes llamar a otro método que maneje la inserción de ejemplares,
                // o modificar el modelo para que maneje la lógica de añadir ejemplares.
                $this->Libros_model->agregarEjemplar($libro_id, $data_libro['ubicacion']); // Asegúrate que este método esté definido
            }
    
            // Redireccionar a la vista de éxito o lista de libros
            $this->session->set_flashdata('success', 'Libro agregado correctamente con ' . $cantidadEjemplares . ' ejemplares.');
            redirect('Libros_controlador/m_listar'); // Cambia esta línea a la vista o página de éxito
        }
    }
    
    
   
    public function eliminarbd()
    {
        $this->load->model('Libros_model');
        $id = $_POST['idlibro'];
        $this->Libros_model->eliminarlibro($id);
        redirect('Libros_controlador/m_listar', 'refresh'); // Redirige a la lista
    }

    public function modificar($idlibro)
    {
        // Cargar modelos necesarios
        $this->load->model('Libros_model');
        $this->load->model('Categoria_model');
        $this->load->model('Editorial_model');
        $this->load->model('Autor_model');
    
        // Recuperar información del libro por ID
        $data['infolibro'] = $this->Libros_model->recuperarlibro($idlibro);
    
        // Asegúrate de manejar el caso donde no se encuentra el libro
        if ($data['infolibro']->num_rows() === 0) {
            // Manejar el error (redirigir o mostrar un mensaje)
            redirect('Libros_controlador/m_listar');
            return;
        }
    
        // Obtener listas de categorías, editoriales y autores
        $data['categorias'] = $this->Categoria_model->listadecategorias();
        $data['editoriales'] = $this->Editorial_model->listadeeditoriales();
        $data['autores'] = $this->Autor_model->listadeautores();
    
        // Obtener los autores asociados al libro
        $data['autoresSeleccionados'] = $this->Libros_model->obtener_autores_por_libro($idlibro);
    
        // Cargar la vista para modificar el libro
        $this->load->view('inc/header');
        $this->load->view('libros/modificar_libro', $data);
        $this->load->view('inc/footer');
    }
    
    public function modificarbd()
    {
        $this->load->library('form_validation');
    
        // Establecer reglas de validación
        $this->form_validation->set_rules('titulov', 'Título', 'required');
        $this->form_validation->set_rules('isbnv', 'ISBN', 'required');
        $this->form_validation->set_rules('ubicacionv', 'Ubicación', 'required');
        // Agrega más reglas según sea necesario...
    
        if ($this->form_validation->run() == FALSE) {
            // Si la validación falla, redirigir al formulario de modificar con errores
            $idlibro = $this->input->post('idlibro'); // Asegúrate de obtener el ID del libro
            $this->modificar($idlibro); // Redirigir al método modificar
        } else {
            // Cargar modelo
            $this->load->model('Libros_model');
    
            // Datos del libro
            $data_libro = array(
                'titulo' => strtoupper($this->input->post('titulov')),
                'isbn' => $this->input->post('isbnv'),
                'ubicacion' => strtoupper($this->input->post('ubicacionv')),
                'codigocutterdewey' => strtoupper($this->input->post('codigocutterdeweyv')),
                'categoria_id' => $this->input->post('categoria_idv'),
                'editorial_id' => $this->input->post('editorial_idv'),
                'ultimaactualizacion' => date('Y-m-d H:i:s') // No es necesario usuarioactualizador si no existe en la tabla
            );
    
            // ID del libro a modificar
            $idlibro = $this->input->post('idlibro');
    
            // Actualizar el libro
            $this->Libros_model->modificarLibro($idlibro, $data_libro);
    
            // Obtener los autores seleccionados
            $autores = $this->input->post('autor_idv');
    
            // Actualizar la relación en la tabla intermedia `libro_has_autor`
            $this->Libros_model->eliminarAutoresLibro($idlibro); // Primero eliminamos las relaciones existentes
    
            if (!empty($autores)) {
                foreach ($autores as $autor_id) {
                    $this->Libros_model->agregarAutorLibro($idlibro, $autor_id); // Añadir los nuevos autores
                }
            }
    
            // Mensaje de éxito
            $this->session->set_flashdata('success', 'El libro se ha modificado correctamente.');
    
            // Redireccionar a la lista de libros
            redirect('Libros_controlador/m_listar', 'refresh');
        }
    }
    public function verificarlibroform() 
{
    // Cargar la vista del formulario de verificación de libro
    $this->load->view('libros/verificarlibroform');
}
    public function verificar_libro()
{
     // Capturar el título y el ISBN del libro desde el formulario
     $titulo = $this->input->post('titulo');
     $isbn = $this->input->post('isbn');
 
     // Verificar si el libro ya existe por su título e ISBN
     $libroExistente = $this->db->get_where('libro', [
         'titulo' => $titulo,
         'isbn' => $isbn
     ])->row();
 
     if ($libroExistente) {
         // Si el libro ya existe, redirigir a la vista para agregar más ejemplares
         $data['libro'] = $libroExistente;
         $this->load->view('agregar_ejemplar', $data);
     } else {
         // Si el libro no existe, redirigir al formulario para agregar un nuevo libro
         redirect('Libros_controlador/agregar_libro');
     }
}

    


  public function listapdf()
	{
    $this->load->model('Libros_model');
    $this->load->library('pdf');
		//if($this->session->userdata('rol')=='administrador')
		{ 
			$lista=$this->Libros_model->listadelibros();
			$lista=$lista->result();

			$this->pdf=new Pdf();
			$this->pdf->AddPage();
			$this->pdf->AliasNbPages();
			$this->pdf->SetTitle("Lista de libros");
			$this->pdf->SetLeftMargin(15);
			$this->pdf->SetRightMargin(15);
			$this->pdf->SetFillColor(210,210,210);
			$this->pdf->SetFont('Arial','B',11);
			$this->pdf->Ln(10);// este es el espacio entre cabecera y titulo
			$this->pdf->Cell(30);
			$this->pdf->Cell(120,10,'LISTA DE LIBROS',0,0,'C',1);
			$this->pdf->Ln(10);

			$this->pdf->Cell(9,5,'No.','TBLR',0,'L',0);
			$this->pdf->Cell(50,5,'TITULO','TBLR',0,'L',0);
			$this->pdf->Cell(55,5,'AUTOR','TBLR',0,'L',0);
			$this->pdf->Cell(40,5,'CATEGORIA','TBLR',0,'L',0);
			$this->pdf->Cell(35,5,'EDITORIAL','TBLR',0,'L',0);
			$this->pdf->Ln(5);

			$this->pdf->SetFont('Arial','',9);
			$num=1;
			foreach ($lista as $row) {
				$titulo=$row->titulo;
				$autor=$row->autor;
				//$isbn=$row->isbn;
			//	$anioPublicacion=$row->anioPublicacion;
        $categoria=$row->categoria;
       // $ubicacion=$row->ubicacion;
        $editorial=$row->editorial;
       // $dewey=$row->dewey;
       // $cutter=$row->cutter;

				$this->pdf->Cell(9,5,$num,'TBLR',0,'L',0);
				$this->pdf->Cell(50,5,$titulo,'TBLR',0,'L',0);
				$this->pdf->Cell(55,5,$autor,'TBLR',0,'L',0);
				//$this->pdf->Cell(50,5,$isbn,'TBLR',0,'L',0);
				//$this->pdf->Cell(15,5,$anioPublicacion,'TBLR',0,'L',0);
        $this->pdf->Cell(40,5,$categoria,'TBLR',0,'L',0);
      //  $this->pdf->Cell(15,5,$ubicacion,'TBLR',0,'L',0);
        $this->pdf->Cell(35,5,$editorial,'TBLR',0,'L',0);
       // $this->pdf->Cell(15,5,$dewey,'TBLR',0,'L',0);
        //$this->pdf->Cell(15,5,$cutter,'TBLR',0,'L',0);
				$this->pdf->Ln(5);
				$num++;
			}

			$this->pdf->Output("listadelibros.pdf","I");// esta letra I hace que tengamos la opcion de descargar pero si utilizaramos la D eso lo forza la descarga	                                                
		}
		//else
		//{
		//	redirect('Libros_controlador/lista_libros','refresh');
		//}
	}

}

  // DESDE AQUI HICE LA TRANSACCION DE CATEGORIA //  // DESDE AQUI HICE LA TRANSACCION DE CATEGORIA //
  /*public function registrar()
	{
		//if($this->session->userdata('tipo')=='admin')
		{ 
      $this->load->model('Registrarlibro_model');
			$data['infocategorias']=$this->Registrarlibro_model->listaCategorias();
			
			$this->load->view('inc/header');
			$this->load->view('registroform',$data);
			$this->load->view('inc/footer');
		}
		//else
	//	{
		//	redirect('usuarios/panel','refresh');
		//}
	}

	public function registrarbd()
	{
    $this->load->model('Registrarlibro_model');
	  $data['titulo']=strtoupper($_POST['titulov']);
    $data['autor']=strtoupper($_POST['autorv']);
    $data['isbn']=($_POST['isbnv']);
    $data['anioPublicacion']=$_POST['anioPublicacionv'];
    $data['categoria']=strtoupper($_POST['categoriav']);
    $data['ubicacion']=strtoupper($_POST['ubicacionv']);
    $data['editorial']=strtoupper($_POST['editorialv']);
    $data['dewey']=strtoupper($_POST['deweyv']);
    $data['cutter']=strtoupper($_POST['cutterv']);
		//$data['nombre']=$_POST['nombre'];
		//$data['primerApellido']=$_POST['primerapellido'];
		//$data['segundoApellido']=$_POST['segundoapellido'];
		$idCategoria=$_POST['idCategoria'];

		$this->Registrarlibro_model->registrar($idCategoria,$data);
		redirect('Libros_controlador/m_listar','refresh');
	}*/


