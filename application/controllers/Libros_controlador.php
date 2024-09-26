<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libros_controlador extends CI_Controller {

    public function m_listar()
	{
        $this->load->model('Libros_model');
        $listar=$this->Libros_model->listadelibros();
        $data['libross']=$listar;
        $this->load->view('inc/header');
	      $this->load->view('inc/menu');
        $this->load->view('lista_libros',$data);
        $this->load->view('inc/footer');
  }
  public function agregar()
  {
       $this->load->view('inc/header');
     //  $this->load->view('inc/menu');
       $this->load->view('agregar_libro');
       $this->load->view('inc/footer');
  }
  public function agregarbd()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('titulov','Titulo de libro',
		'required|min_length[5]|max_length[25]',
    array(
      'required'=>'Se requiere el titulo',
		  'min_length'=>'Por lo menos 5 caracteres',
       'max_length'=>'Maximo 30 caracteres en titulo de libro'));

   $this->form_validation->set_rules('isbnv', 'ISBN', 'required', 
     array(
        'required' => 'Se requiere el ISBN'
    ));
  

    if($this->form_validation->run()==FALSE)
		{
			  $this->load->view('inc/header');
		    $this->load->view('agregar_libro');
		    $this->load->view('inc/footer');
		}
		else
    {
    $this->load->model('Libros_model');
    $data['titulo']=strtoupper($_POST['titulov']);
    $data['isbn']=($_POST['isbnv']);
    $data['ubicacion']=strtoupper($_POST['ubicacionv']);
    $data['codigocutter']=strtoupper($_POST['codigocutterv']);
    $data['fechacreacion']=date('Y-m-d H:i:s');
    $data['usuariocreador']=$this->session->userdata('login');
    $data['categoria_id']=strtoupper($_POST['categoria_idv']);
    $data['editorial_id']=$_POST['editorial_idv'];
   

    $this->Libros_model->agregarlibro($data);
    redirect('Libros_controlador/m_listar','refresh');//REDIRECIONA
  }
}
  public function eliminarbd()
  {
    $this->load->model('Libros_model');
    $id=$_POST['idlibro'];
    $this->Libros_model->eliminarlibro($id);
    redirect('Libros_controlador/m_listar','refresh');//REDIRECIONA
  }
  public function modificar()
  {
    $this->load->model('Libros_model');
    $id=$_POST['idlibro'];
    //echo $idlibro;
	  $data['infolibro']=$this->Libros_model->recuperarlibro($id);
    $this->load->view('inc/header');
    $this->load->view('modificar_libro',$data);
    $this->load->view('inc/footer');
  }
	public function modificarbd()
	{
    $this->load->model('Libros_model');
	  $id=$_POST['idlibro'];
    $data['titulo']=strtoupper($_POST['titulov']);
    $data['isbn']=($_POST['isbnv']);
    $data['ubicacion']=strtoupper($_POST['ubicacionv']);
    $data['codigocutter']=strtoupper($_POST['codigocutterv']);
    $data['ultimaactualizacion']=date('Y-m-d H:i:s');
    $data['categoria_id']=strtoupper($_POST['categoria_idv']);
    $data['editorial_id']=$_POST['editorial_idv'];

		$this->Libros_model->modificarlibro($id,$data);
		redirect('Libros_controlador/m_listar','refresh');
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
  // DESDE AQUI HICE LA TRANSACCION DE CATEGORIA //  // DESDE AQUI HICE LA TRANSACCION DE CATEGORIA //
  public function registrar()
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
	}
}