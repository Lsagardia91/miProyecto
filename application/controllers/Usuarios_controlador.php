


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/La_Paz');

class Usuarios_controlador extends CI_Controller {

  public function index()
{
   var_dump($this->session->userdata('tipo'));

    if($this->session->userdata('tipo') == 1)
    { 
        $lista = $this->Usuarios_model->listadeusuarios();
        $data['usuario'] = $lista;
        
        $this->load->view('inc/header');
        $this->load->view('inc/menu');
        $this->load->view('usuario/lista_usuarios', $data);
        $this->load->view('inc/footer');
    }
    else
    {
        redirect('Username/panel', 'refresh');
    }
}

public function bibliotecario()
{
    if($this->session->userdata('tipo') == 'bibliotecario')
    { 
        $this->load->view('inc/header');
        $this->load->view('panelbibliotecario');
        $this->load->view('inc/footer');
    }
    else
    {
        redirect('Usuarios_controlador/m_listar', 'refresh'); // Redirigir si no es bibliotecario
    }
}

public function lector()
{
    if($this->session->userdata('tipo') == 'lector')
    { 
        $this->load->view('inc/header');
        $this->load->view('panellector'); // Asegúrate de que esta vista existe
        $this->load->view('inc/footer');
    }
    else
    {
        redirect('Usuarios_controlador/m_listar', 'refresh'); // Redirigir si no es lector
    }
}
    public function m_listar()
	{
        $this->load->model('Usuarios_model'); // Cargar el modelo
        $listar=$this->Usuarios_model->listadeusuarios();
        $data['usuarios']=$listar;
        $this->load->view('inc/header');
	      $this->load->view('inc/menu');
        $this->load->view('usuario/lista_usuarios',$data);
	      $this->load->view('inc/footer');
    }
  //  public function  verificarusuario() {
   
      // Verificar si el usuario está logueado
    //  if (!$this->session->userdata('login')) {
      //    redirect('Username/index', 'refresh'); // Redirigir al login si no está logueado
      //}
  //}
    public function agregar()
    {     
       
        $this->load->view('inc/header');
        $this->load->view('inc/menu');
        $this->load->view('usuario/agregar_usuario');
        $this->load->view('inc/footer');
       
    }
    public function agregarbd()
    {
      $this->load->model('Usuarios_model');

      if (!$this->session->userdata('idusuario')) {
          echo "No estás logueado o no se encuentra el ID de usuario.";
          exit();
      }
  
      // Recopilar los datos del formulario
      $data['carnetidentidad'] = $_POST['carnetidentidadv'];
      $data['nombres'] = strtoupper($_POST['nombresv']);
      $data['apellidos'] = strtoupper($_POST['apellidosv']);
      $data['direccion'] = strtoupper($_POST['direccionv']);
      $data['telefono'] = strtoupper($_POST['telefonov']);
      $data['email'] = $_POST['emailv'];
      $data['coluniins'] = $_POST['coluniinsv'];
      $data['username'] = $_POST['usernamev'];
      $data['password'] = sha1($_POST['passwordv']);
      $data['rol'] = $_POST['rolv'];
      // $data['foto'] = ''; // Foto será actualizada después de la subida del archivo
  
      // Agregar el usuario a la base de datos
      if ($this->Usuarios_model->agregarusuario($data)) {
          // Obtener el último ID insertado
          $idusuario = $this->db->insert_id();
  
          // Ahora podemos proceder a subir la foto
          if (!empty($_FILES['fotov']['name'])) {
              $nombrearchivo = $idusuario . ".jpg"; // El nombre de la foto será el ID del usuario
              $config['upload_path'] = './uploads/usuarios/';
              $config['file_name'] = $nombrearchivo;
              $config['allowed_types'] = 'jpg|jpeg|jfif';
  
              // Cargar la librería de subida de archivos
              $this->load->library('upload', $config);
  
              if ($this->upload->do_upload('fotov')) {
                  // Actualizar la columna 'foto' del usuario con el nombre del archivo
                  $dataUpdate = ['foto' => $nombrearchivo];
                  $this->Usuarios_model->modificarusuario($idusuario, $dataUpdate);
              } else {
                  // Manejar el error de la subida de la foto
                  echo "Error al subir la foto: " . $this->upload->display_errors();
              }
          }
  
          // Redirigir a la lista de usuarios u otra página de éxito
          redirect('Usuarios_controlador/m_listar', 'refresh');
      } else {
          // Mostrar un mensaje de error si la inserción falló
          echo "Error al agregar usuario: " . $this->db->last_query();
      }
  }
    
    public function eliminarbd()
    {
    $this->load->model('Usuarios_model'); 
    $id=$_POST['idusuario'];
    $this->Usuarios_model->eliminarusuario($id);
    redirect('usuarios_controlador/m_listar','refresh');//REDIRECIONA
    }
    public function modificar()
    {
      $this->load->model('Usuarios_model'); // Cargar el modelo

    // Obtener el ID del usuario desde el POST
     $id = $this->input->post('idusuario'); 

    // Verificar si el ID fue pasado correctamente
    if (!$id) {
        // Manejar el caso en que no se recibió un ID válido
        echo "ID de usuario no proporcionado";
        return;  // Detener la ejecución si no se tiene un ID válido
    }

    // Recuperar los datos del usuario con el ID proporcionado
    $data['infousuario'] = $this->Usuarios_model->recuperarusuario($id);

    // Cargar las vistas junto con los datos del usuario
    $this->load->view('inc/header');
    $this->load->view('inc/menu');
    $this->load->view('usuario/modificar_usuario', $data);
    $this->load->view('inc/footer');
    }
      public function modificarbd()
      {
          // Cargar el modelo de usuarios
    $this->load->model('Usuarios_model');
    
    // Obtener el ID del usuario a modificar
    $id = $this->input->post('idusuario');

    if (!$id) {
        echo "ID de usuario no proporcionado";
        return;
    }

    // Obtener los datos del formulario
    $data['carnetidentidad'] = $this->input->post('carnetidentidadv');
    $data['nombres'] = strtoupper($this->input->post('nombresv'));
    $data['apellidos'] = strtoupper($this->input->post('apellidosv'));
    $data['direccion'] = strtoupper($this->input->post('direccionv'));
    $data['telefono'] = strtoupper($this->input->post('telefonov'));
    $data['email'] = $this->input->post('emailv');
    $data['coluniins'] = $this->input->post('coluniinsv');
    $data['username'] = $this->input->post('usernamev');
    $data['ultimaactualizacion'] = date('Y-m-d H:i:s');
    $data['rol'] = $this->input->post('rolv');

    // Manejo de la contraseña
    $passwordInput = $this->input->post('passwordv');
    if (!empty($passwordInput)) {
        $data['password'] = sha1($passwordInput);
    }

    // Llamar al método del modelo para modificar el usuario
    $resultado = $this->Usuarios_model->modificarusuario($id, $data);

    if ($resultado) {
        // Redirigir a la lista de usuarios o a una página de éxito
        redirect('Usuarios_controlador/m_listar', 'refresh');
    } else {
        // Manejar el error, por ejemplo, mostrar un mensaje de error
        echo "Error al modificar el usuario: " . json_encode($resultado);
    }
        
      }  
  public function deshabilitarbd()
	{
    $this->load->model('Usuarios_model');
		$id=$_POST['idusuario'];
		$data['estado']='0';

		$this->Usuarios_model->modificarusuario($id,$data);
	  redirect('Usuarios_controlador/deshabilitados','refresh');
	}

	public function deshabilitados()
	{
    $this->load->model('Usuarios_model');
		$lista=$this->Usuarios_model->listausuariosdeshabilitados();
		$data['usuario']=$lista;
		
		$this->load->view('inc/header');
		$this->load->view('usuario/listadeshabilitados',$data);
		$this->load->view('inc/footer');
	}

	public function habilitarbd()
	{
    $this->load->model('Usuarios_model');
		$id=$_POST['idusuario'];
		$data['estado']='1';

		$this->Usuarios_model->modificarusuario($id,$data);
		redirect('Usuarios_controlador/deshabilitados','refresh');
	}
  
  public function subirfoto()
	{
		
		$data['arrayidusuario']=$_POST['idusuario'];
		$this->load->view('inc/header');
		//$this->load->view('inc/vistaslte/menu');
		$this->load->view('usuario/subirform',$data);
    $this->load->view('inc/menu');
    $this->load->view('inc/footer');
	}
	public function subir()
	{
    // Debug para verificar que los datos están siendo enviados
    //var_dump($_POST); // Para verificar que 'idusuario' está presente
   // var_dump($_FILES); // Para verificar que 'userfile' está presente
		$arrayidusuario=$_POST['idusuario'];   // RECEPCION DEL IDENTIFICADOR DEL ESTUDIANTE
		$nombrearchivo=$arrayidusuario.".jpg";
		//ruta donde se guardan loa archivos
		$config['upload_path']='./uploads/usuarios/';
		//nombre del archivo
		$config['file_name']=$nombrearchivo;

		$direccion="./uploads/usuarios/".$nombrearchivo;

		if(file_exists($direccion)) // si se necesitara editar
		{
			unLink($direccion);// SI EXISTR EL ARCHIVO
		}
		$config['allowed_types']='jpg|jpeg|jfif';
		$this->load->library('upload',$config);

		if(!$this->upload->do_upload()){
		{
			$data['error']=$this->upload->display_errors();
		}
    echo "Error: " . $data['error'];
  }
		else
		{
			$data['foto']=$nombrearchivo;
			$this->Usuarios_model->modificarusuario($arrayidusuario,$data);
			$this->upload->data();
		}
		redirect('Usuarios_controlador/index','refresh');
	}

  // RECUPARAR CONTRASEÑA//  // RECUPARAR CONTRASEÑA//
  public function recuperarcontra() {
    // Cargar la librería de validación de formularios
    $this->load->library('form_validation');
    
    // Establecer las reglas de validación para el campo de email
    $this->form_validation->set_rules('email', 'Correo electrónico', 'required|valid_email');

    // Verificar si el formulario ha sido enviado y validado
    if ($this->form_validation->run() == FALSE) {
        // Si no ha pasado la validación, mostrar la vista con los errores
        $this->load->view('recuperarcont');
    } else {
        // Si la validación es exitosa, procesar el formulario
        $email = $this->input->post('email');

        // Verificar si el correo existe en la base de datos
        $user = $this->Usuario_model->get_user_by_email($email);

        if ($user) {
            // Generar un token de restablecimiento de contraseña
            $token = bin2hex(random_bytes(50));  // Genera un token aleatorio

            // Guardar el token en la base de datos con el tiempo de expiración
            if ($this->Usuario_model->store_reset_token($user['id_usuario'], $token)) {
                // Crear el enlace de restablecimiento de contraseña
                // Crear el enlace de restablecimiento de contraseña
                $reset_link = site_url('usuarios/reset_password/' . urlencode($token));


                // Configurar el envío del correo electrónico
                $this->_send_reset_email($email, $reset_link);

                // Mostrar mensaje de éxito
                $this->session->set_flashdata('message', 'Se ha enviado un enlace para restablecer tu contraseña a tu correo.');
            } else {
                // Si hubo un problema al guardar el token
                $this->session->set_flashdata('error', 'Hubo un problema al generar el token. Inténtalo nuevamente.');
            }
        } else {
            // Si no se encuentra el correo, mostrar un mensaje de error
            $this->session->set_flashdata('error', 'El correo electrónico no está registrado.');
        }

        // Redirigir a la vista de recuperación de contraseña (para mostrar el mensaje flash)
        redirect('usuarios/recuperarcontra');
    }
}



private function _send_reset_email($email, $reset_link) {
    $mail = new PHPMailer(true);
    try {

        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);

        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ],
        ];
        // Configuración del correo
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'bikeracealvaro@gmail.com'; // Tu correo Gmail
        $mail->Password = 'gzncuwbkwelnxwys'; // Tu contraseña de aplicación de Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configurar el remitente
        $mail->setFrom('bikeracealvaro@gmail.com', 'Sistema');

        // Añadir destinatario
        $mail->addAddress($email);

        // Asunto del correo
        $mail->Subject = 'Restablecimiento de contraseña';

        // Cuerpo del correo
        $mail->isHTML(true);
        $mailContent = "
            <html>
            <body>
                <h3>Restablecimiento de contraseña</h3>
                <p>Haz clic en el siguiente enlace para restablecer tu contraseña:</p>
                <p><a href='" . htmlspecialchars($reset_link, ENT_QUOTES, 'UTF-8') . "'>Restablecer contraseña</a></p>
                <p>Si no solicitaste este cambio, ignora este mensaje.</p>
            </body>
            </html>";
        $mail->Body = $mailContent;

        // Enviar el correo
        $mail->send();
    } catch (Exception $e) {
        // Manejar errores en el envío del correo
        $this->session->set_flashdata('error', 'Hubo un error al enviar el correo. Por favor, intenta nuevamente.');
    }

}



public function reset_password($token) {
// Obtener el usuario asociado al token
$user = $this->Usuario_model->get_user_by_token($token);

if ($user) {
    // Si el token es válido, cargar la vista de formulario para restablecer la contraseña
    // Aquí, $user['id_usuario'] se puede usar si necesitas el id_usuario
    $data['token'] = $token;
    $data['id_usuario'] = $user['id_usuario']; // Obtener el id_usuario
    
    $this->load->view('reset_password_form', $data);
} else {
    // Si el token no es válido o ha expirado, mostrar un mensaje de error
    $this->session->set_flashdata('error', 'El token es inválido o ha expirado.');
    redirect('usuarios/recuperarcontra'); // Verifica que 'usuarios' sea el controlador correcto
}
}


// MODIFICAR DATOS PERSONALES 
public function modificardatosperfil()
{
    /// Verificar si el usuario está logueado
    if (!$this->session->userdata('idusuario')) {
        redirect('login'); // Redirigir al login si no está logueado
    }

    // Obtener el ID del usuario logueado desde la sesión
    $id_usuario = $this->session->userdata('idusuario');
    var_dump($id_usuario); // Agregar esto para depuración

    // Obtener los datos del usuario desde el modelo
    $data['usuario'] = $this->Usuario_model->obtener_usuario_por_id($id_usuario);

    // Cargar la vista de modificación de perfil con los datos del usuario
    $this->load->view('modificardatosperfil', $data);
}

public function actualizar_perfil()
{
    // Verificar si el usuario está logueado
    if (!$this->session->userdata('idusuario')) {
        redirect('login'); // Redirigir al login si no está logueado
    }

    $id_usuario = $this->session->userdata('idusuario'); // ID del usuario logueado

    // Validar los datos del formulario
    $this->form_validation->set_rules('nombres', 'Nombres', 'required');
    $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
    $this->form_validation->set_rules('email', 'Correo Electrónico', 'required|valid_email');

    if ($this->form_validation->run() === FALSE) {
        // Volver a la vista de modificación si hay errores
        $this->modificardatosperfil();
    } else {
        // Datos a actualizar
        $data = array(
            'nombres' => $this->input->post('nombres'),
            'apellidos' => $this->input->post('apellidos'),
            'email' => $this->input->post('email'),
            'direccion' => $this->input->post('direccion'),
            'telefono' => $this->input->post('telefono'),
            'idusuario' => $id_usuario // Asegúrate de incluir quién actualiza
        );

        // Actualizar los datos en la base de datos
        $this->Usuario_model->actualizar_usuario($id_usuario, $data);

        // Redirigir o mostrar mensaje de éxito
        redirect('Usuarios_controlador/perfil_actualizado'); // Verifica que esta ruta exista
    }
}

}




  




