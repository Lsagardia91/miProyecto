<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_libro extends CI_Controller {


    public function m_listar()
	{
        //$this->load->model('Libros_model'); // Cargar el modelo
        $listar=$this->Libros_model->listadelibros();
        $data['libross']=$listar;
        //$this->load->view('temp/head');
	    	//$this->load->view('temp/menu');
        $this->load->view('temp/v_listadelibros',$data);
       // $this->load->view('temp/test');
		   // $this->load->view('temp/footer');
  }
  public function agregar()
  {
      //$this->load->view('temp/head');
      // $this->load->view('temp/menu');
       $this->load->view('temp/v_formulario');
       //$this->load->view('v_formulario');
     // $this->load->view('temp/test');
     // $this->load->view('temp/footer');
  }
  public function agregarbd()
  {
    //$this->load->model('Libros_model'); 
    $data['titulo']=strtoupper($_POST['titulov']);
    $data['autor']=strtoupper($_POST['autorv']);
    $data['isbn']=($_POST['isbnv']);
    $data['anioPublicacion']=$_POST['anioPublicacionv'];
    $data['categoria']=strtoupper($_POST['categoriav']);
    $data['ubicacion']=strtoupper($_POST['ubicacionv']);
    $data['editorial']=strtoupper($_POST['editorialv']);
    $data['dewey']=strtoupper($_POST['dewayv']);
    $data['cutter']=strtoupper($_POST['cutterv']);

    $this->Libros_model->agregarlibro($data);
    redirect('C_libro/m_listar','refresh');//REDIRECIONA
  }
  public function eliminarbd()
  {
  $idLibro=$_POST['idlibro'];
  $this->Libros_model->eliminarlibro($idLibro);
  redirect('C_libro/m_listar','refresh');//REDIRECIONA
  }
  public function modificar()
  {
    $idLibro=$_POST['idlibro'];
    //echo $idlibro;
	  $data['infolibro']=$this->Libros_model->recuperarlibro($idLibro);
   // $this->load->view('temp/head');
    //$this->load->view('temp/menu');
    $this->load->view('temp/formulario2',$data);
    //$this->load->view('temp/test');
   // $this->load->view('temp/footer');
  }
	public function modificarbd()
	{
	  $idLibro=$_POST['idlibro'];
    $data['titulo']=strtoupper($_POST['titulov']);
    $data['autor']=strtoupper($_POST['autorv']);
    $data['isbn']=($_POST['isbnv']);
    $data['anioPublicacion']=$_POST['anioPublicacionv'];
    $data['categoria']=strtoupper($_POST['categoriav']);
    $data['ubicacion']=strtoupper($_POST['ubicacionv']);
    $data['editorial']=strtoupper($_POST['editorialv']);
    $data['dewey']=strtoupper($_POST['dewayv']);
    $data['cutter']=strtoupper($_POST['cutterv']);

		$this->Libros_model->modificarlibro($idLibro,$data);
		redirect('C_libro/m_listar','refresh');
	}

  public function listapdf()
	{
		if($this->session->userdata('tipo')=='admin')
		{ 
			$lista=$this->estudiante_model->listaestudiantes();
			$lista=$lista->result();

			$this->pdf=new Pdf();
			$this->pdf->AddPage();
			$this->pdf->AliasNbPages();
			$this->pdf->SetTitle("Lista de estudiantes");
			$this->pdf->SetLeftMargin(15);
			$this->pdf->SetRightMargin(15);
			$this->pdf->SetFillColor(210,210,210);
			$this->pdf->SetFont('Arial','B',11);
			$this->pdf->Cell(30);
			$this->pdf->Cell(120,10,'LISTA DE ESTUDIANTES',0,0,'C',1);
			$this->pdf->Ln(10);

			$this->pdf->Cell(9,5,'No.','TBLR',0,'L',0);
			$this->pdf->Cell(50,5,'NOMBRE','TBLR',0,'L',0);
			$this->pdf->Cell(50,5,'PRIMER APELLIDO','TBLR',0,'L',0);
			$this->pdf->Cell(50,5,'SEGUNDO APELLIDO','TBLR',0,'L',0);
			$this->pdf->Cell(15,5,'NOTA','TBLR',0,'L',0);
			$this->pdf->Ln(5);

			$this->pdf->SetFont('Arial','',9);
			$num=1;
			foreach ($lista as $row) {
				$nombre=$row->nombre;
				$primerapellido=$row->primerApellido;
				$segundoapellido=$row->segundoApellido;
				$nota=$row->nota;
				$this->pdf->Cell(9,5,$num,'TBLR',0,'L',0);
				$this->pdf->Cell(50,5,$nombre,'TBLR',0,'L',0);
				$this->pdf->Cell(50,5,$primerapellido,'TBLR',0,'L',0);
				$this->pdf->Cell(50,5,$segundoapellido,'TBLR',0,'L',0);
				$this->pdf->Cell(15,5,$nota,'TBLR',0,'L',0);
				$this->pdf->Ln(5);
				$num++;
			}

			$this->pdf->Output("listaestudiantes.pdf","I");

		}
		else
		{
			redirect('usuarios/panel','refresh');
		}
	}
}