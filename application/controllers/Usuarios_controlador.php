<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

date_default_timezone_set('America/La_Paz');

class Usuarios_controlador extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Usuarios_model');
      
        $this->load->library('upload'); // Cargar la librería de carga
        $this->load->library('form_validation');
    }

  public function index()
{
     // Depurar el contenido de la sesión
   //  echo "<pre>";
    // print_r($this->session->userdata());
    // echo "</pre>";
   //var_dump($this->session->userdata(''));

    if($this->session->userdata('rol') == 'administrador')
   // if ($this->session->userdata('rol') == 'administrador') {  ESTO DEBERIA SER LO CORRECTO
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

/*public function bibliotecario()
{
     // Depurar el contenido de la sesión
     echo "<pre>";
     print_r($this->session->userdata());
     echo "</pre>";
 
    if($this->session->userdata('rol') == 'bibliotecario')
    { 
        $this->load->view('inc/header');
        $this->load->view('panelbibliotecario');
        $this->load->view('inc/footer');
    }
    else
    {
       // redirect('Usuarios_controlador/m_listar', 'refresh'); // Redirigir si no es bibliotecario
    }
}

/*public function lector()
{
    if($this->session->userdata('rol') == 'lector')
    { 
        $this->load->view('inc/header');
        $this->load->view('panellector'); // Asegúrate de que esta vista existe
        $this->load->view('inc/footer');
    }
    else
    {
        redirect('Usuarios_controlador/m_listar', 'refresh'); // Redirigir si no es lector
    }
}*/
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
            $this->load->view('usuario/recuperarcont');
        } else {
            // Si la validación es exitosa, procesar el formulario
            $email = $this->input->post('email');
    
            // Verificar si el correo existe en la base de datos
            $user = $this->Usuarios_model->get_user_by_email($email);
    
            if ($user) {
                // Generar un token de restablecimiento de contraseña
                $token = bin2hex(random_bytes(50));  // Genera un token aleatorio
    
                // Guardar el token en la base de datos con el tiempo de expiración
                if ($this->Usuarios_model->store_reset_token($user['id'], $token)) {
                    // Crear el enlace de restablecimiento de contraseña
                    // Crear el enlace de restablecimiento de contraseña
                    $reset_link = site_url('Usuarios_controlador/reset_password/' . urlencode($token));

    
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
            redirect('Usuarios_controlador/recuperarcontra');
        }
    }
    





private function _send_reset_email($email, $reset_link) {
    $this->load->model('Usuarios_model');
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
    $this->load->model('Usuarios_model');
// Obtener el usuario asociado al token
$user = $this->Usuarios_model->get_user_by_token($token);

if ($user) {
    // Si el token es válido, cargar la vista de formulario para restablecer la contraseña
    // Aquí, $user['id_usuario'] se puede usar si necesitas el id_usuario
    $data['token'] = $token;
    $data['id'] = $user['id']; // Obtener el id_usuario
    
    $this->load->view('usuario/reset_password_form', $data);
} else {
    // Si el token no es válido o ha expirado, mostrar un mensaje de error
    $this->session->set_flashdata('error', 'El token es inválido o ha expirado.');
    redirect('Usuarios_controlador/recuperarcontra'); // Verifica que 'usuarios' sea el controlador correcto
}
}
public function procesar_nueva_contrasena() {
    $this->load->model('Usuarios_model');
    $token = $this->input->post('token');
    $new_password = $this->input->post('new_password');
    $confirm_password = $this->input->post('confirm_password');

    // Validar que las contraseñas coincidan
    if ($new_password !== $confirm_password) {
        $this->session->set_flashdata('error', 'Las contraseñas no coinciden.');
        redirect('Usuarios_controlador/reset_password/' . $token);
    }

    // Verificar que el token sea válido y no haya expirado
    $user = $this->Usuarios_model->get_user_by_token($token);

    if ($user) {
        // Actualizar la contraseña del usuario
        $hashed_password = sha1($new_password);
        $this->Usuarios_model->update_password($user['id'], $hashed_password);

        // Limpiar el token después de usarlo
        $this->Usuarios_model->clear_reset_token($user['id']);

        // Mostrar mensaje de éxito
        $this->session->set_flashdata('message', 'Tu contraseña ha sido restablecida exitosamente.');
        redirect('Username/index');
    } else {
        $this->session->set_flashdata('error', 'El token es inválido o ha expirado.');
        redirect('Usuarios_controlador/recuperarcontra');
    }
}



// MODIFICAR DATOS PERSONALES 
public function modificardatosperfil()
{
        $this->load->model('Usuarios_model');//CARGA EL MODELO
    /// Verificar si el usuario está logueado
    if (!$this->session->userdata('idusuario')) {
       redirect('login'); // Redirigir al login si no está logueado
    }

    // Obtener el ID del usuario logueado desde la sesión
    $id= $this->session->userdata('idusuario');
   //var_dump($id); // Agregar esto para depuración

    // Obtener los datos del usuario desde el modelo
    $data['usuario'] = $this->Usuarios_model->obtener_usuario_por_id($id);

// Verifica si se recuperó el usuario
     if (!$data['usuario']) {
   // echo "Usuario no encontrado"; // Mensaje para depuración
    return; 
    }// Detén la ejecución si no se encuentra el usuario
   // Cargar la vista de modificación de perfil con los datos del usuario
    $this->load->view('usuario/modificardatosperfil', $data);

}
public function actualizar_perfil()
{
    $this->load->model('Usuarios_model');

    // Verificar si el usuario está logueado
    if (!$this->session->userdata('idusuario')) {
        redirect('login'); // Redirigir al login si no está logueado
    }

    $id = $this->session->userdata('idusuario'); // ID del usuario logueado

    // Validar los datos del formulario
    $this->form_validation->set_rules('carnetidentidad', 'Carnet de Identidad', 'required');
    $this->form_validation->set_rules('nombres', 'Nombres', 'required');
    $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
    $this->form_validation->set_rules('email', 'Correo Electrónico', 'required|valid_email');
    $this->form_validation->set_rules('direccion', 'Dirección', 'required');
    $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
    $this->form_validation->set_rules('coluniins', 'Colegio/Universidad/Instituto', 'required');
    $this->form_validation->set_rules('username', 'Usuario', 'required');

    if ($this->form_validation->run() === FALSE) {
        // Volver a la vista de modificación si hay errores
        $this->modificardatosperfil();
    } else {
        // Configuración para la subida de la foto
        $config['upload_path'] = './uploads/perfiles/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // Tamaño máximo del archivo en KB
        $config['file_name'] = time() . '_' . $_FILES['foto']['name']; // Renombra el archivo para evitar duplicados

            $this->load->library('upload', $config);

             // Verificar si se subió una nueva foto
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                // Obtener la información del archivo subido
                $foto_data = $this->upload->data();
                $foto = $foto_data['file_name'];
            } else {
                // Si la subida falla, mostrar errores
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('Usuarios_controlador/modificardatosperfil');
                return;
            }
        } else {
            // Si no se subió una nueva foto, mantener la foto actual
            $foto = $this->input->post('foto_actual');
        }
        

        // Datos a actualizar
        $data = array(
            'carnetidentidad' => $this->input->post('carnetidentidad'),
            'nombres' => $this->input->post('nombres'),
            'apellidos' => $this->input->post('apellidos'),
            'email' => $this->input->post('email'),
            'direccion' => $this->input->post('direccion'),
            'telefono' => $this->input->post('telefono'),
            'coluniins' => $this->input->post('coluniins'),
            'username' => $this->input->post('username'),
            'ultimaactualizacion' => date('Y-m-d H:i:s'),
            'idusuario' => $this->session->userdata('idusuario')
        );

        // Actualizar los datos en la base de datos
        $actualizado = $this->Usuarios_model->actualizar_usuario($id, $data);

        // Verificar si la actualización fue exitosa
        if ($actualizado) {
            // Redirigir o mostrar mensaje de éxito
            $this->session->set_flashdata('success', 'Perfil actualizado correctamente.');
            redirect('Usuarios_controlador/perfil_actualizado');
        } else {
            // Manejo de error en caso de que la actualización falle
            $this->session->set_flashdata('error', 'No se pudo actualizar el perfil. Intente nuevamente.');
            redirect('Usuarios_controlador/modificardatosperfil');
        }
    }
}

public function perfil_actualizado()
    {
        // Cargar la vista de perfil actualizado
        $this->load->view('usuario/perfil_actualizado');
    }


}
