<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestamo_model extends CI_Model {
    public function registrarPrestamo($usuario_id, $libro_id)
    {
        // Obtener el ID del bibliotecario logueado
        $id_bibliotecario = $this->session->userdata('id'); // ID del bibliotecario logueado
    
        // Validar que el lector existe y es un lector
        $this->db->where('id', $usuario_id);
        $this->db->where('rol', 'lector'); // Asegúrate de que sea un lector
        $lector = $this->db->get('usuario');
        
        if ($lector->num_rows() == 0) {
            echo 'Error: El lector con ID ' . $usuario_id . ' no existe o no tiene el rol de lector.';
            return false; // No es lector o no existe
        }
    
        // Iniciar la transacción
        $this->db->trans_start();
    
        // Verificar que el libro realmente existe antes de proceder
        $this->db->where('id', $libro_id);
        $existeLibro = $this->db->get('libro');
    
        if ($existeLibro->num_rows() == 0) {
            echo 'Error: El libro con ID ' . $libro_id . ' no existe.';
            $this->db->trans_complete();
            return false; // El libro no existe
        }
    
        // Verificar que el libro esté disponible (no prestado)
        $this->db->select('libro_prestamo.*');
        $this->db->from('libro_prestamo');
        $this->db->join('prestamo', 'prestamo.id = libro_prestamo.prestamo_id');
        $this->db->where('libro_prestamo.libro_id', $libro_id);
        $this->db->where('prestamo.estado', 1); // Estado 1 significa que está prestado
        $existePrestamo = $this->db->get();
    
        if ($existePrestamo->num_rows() > 0) {
            echo 'Error: El libro con ID ' . $libro_id . ' ya está prestado.';
            $this->db->trans_complete();
            return false; // El libro ya está prestado
        }
    
        // Datos para la tabla 'prestamo'
        $data_prestamo = array(
            'usuario_id' => $usuario_id, // Cambiado a ID del lector, no del bibliotecario
            'fechaprestamo' => date('Y-m-d H:i:s'),
            'estado' => 0, // Estado 0 significa "pendiente"
        );
    
        // Insertar el préstamo en la tabla 'prestamo'
        if (!$this->db->insert('prestamo', $data_prestamo)) {
            echo 'Error: Al insertar en la tabla prestamo.';
            $this->db->trans_complete();
            return false; 
        }
    
        $prestamo_id = $this->db->insert_id(); // Obtener el ID del préstamo recién insertado
    
        // Insertar la relación libro-prestamo en la tabla intermedia
        $data_libro_prestamo = array(
            'prestamo_id' => $prestamo_id,
            'libro_id' => $libro_id
        );
    
        // Insertar en libro_prestamo
        if (!$this->db->insert('libro_prestamo', $data_libro_prestamo)) {
            echo 'Error: Al insertar en la tabla libro_prestamo.';
            $this->db->trans_complete();
            return false; 
        }
    
        // Completar la transacción
        $this->db->trans_complete();
    
        // Verificar si la transacción fue exitosa
        if ($this->db->trans_status() === FALSE) {
            echo 'Error: En la transacción de préstamo.';
            return false; 
        }

        echo 'Éxito: Préstamo registrado correctamente con ID ' . $prestamo_id;
        return $prestamo_id; // Retorna el ID del préstamo registrado
    }
     // Método para actualizar los detalles de un préstamo
     public function actualizarPrestamo($prestamo_id, $estado, $fechaDevolucion = null)
     {
         // Datos que quieres actualizar
         $data = array(
             'estado' => 1, // Actualizar el estado (1: prestado, 0: pendiente, 2: devuelto, etc.)
             'fechadevolucion' => $fechaDevolucion ? $fechaDevolucion : date('Y-m-d H:i:s'), // Registrar fecha de devolución si se proporciona
         );
         
         // Condición para actualizar el préstamo específico
         $this->db->where('id', $prestamo_id);
         
         // Actualizar en la tabla 'prestamo'
         if ($this->db->update('prestamo', $data)) {
             echo 'Préstamo actualizado correctamente.';
             return true;
         } else {
             echo 'Error al actualizar el préstamo.';
             return false;
         }
     }
 
    public function obtenerSolicitudesPendientes() {
        // Selecciona los campos necesarios, incluyendo los de las tablas relacionadas
        $this->db->select('prestamo.id, prestamo.fechaprestamo, prestamo.estado, 
                           usuario.nombres, usuario.carnetidentidad, libro.titulo');
        $this->db->from('prestamo');
        
        // Join con la tabla de usuarios para obtener los nombres y el carnet del usuario que realizó el préstamo
        $this->db->join('usuario', 'prestamo.usuario_id = usuario.id');
        
        // Join con la tabla intermedia de libro_prestamo para relacionar los préstamos con los libros
        $this->db->join('libro_prestamo', 'prestamo.id = libro_prestamo.prestamo_id');
        
        // Join con la tabla de libros para obtener el título del libro prestado
        $this->db->join('libro', 'libro_prestamo.libro_id = libro.id');
        
        // Solo préstamos pendientes (estado = 0)
        $this->db->where('prestamo.estado', 0);
        
        // Ejecuta la consulta
        $query = $this->db->get();
        
        // Retorna los resultados en forma de array de objetos
        return $query->result();
    }
    
    public function obtenerLibrosPrestados() {
      $this->db->select('prestamo.id,usuario.nombres, usuario.carnetidentidad, libro.titulo, prestamo.fechaprestamo, prestamo.fechadevolucion');
      $this->db->from('prestamo');
      $this->db->join('usuario', 'prestamo.usuario_id = usuario.id'); // Relación entre préstamo y usuario
      $this->db->join('libro_prestamo', 'prestamo.id = libro_prestamo.prestamo_id'); // Relación entre préstamo y libros prestados
      $this->db->join('libro', 'libro_prestamo.libro_id = libro.id'); // Relación entre libro_prestamo y libro
      $this->db->where('prestamo.estado', 1);  // Solo los préstamos que han sido realizados
      $query = $this->db->get();
      
      if ($query->num_rows() > 0) {
          return $query->result();
      } else {
          return false;
      }
  }
  public function registrarDevolucion() {
      // Verifica si se ha enviado el ID del préstamo
    $prestamo_id = $this->input->post('prestamo_id');

    if ($prestamo_id) {
        // Iniciar la transacción
        $this->db->trans_start();

        // Obtener la fecha y hora actual
        $fecha_devolucion = date('Y-m-d H:i:s');

        // Crear un array con los datos a actualizar
        $data = array(
            'fechadevolucion' => $fecha_devolucion,
            'estado' => 0 // Asumiendo que 1 significa "devuelto"
        );

        // Actualizar la tabla de préstamos usando el ID del préstamo
        $this->db->where('id', $prestamo_id);
        $this->db->update('prestamo', $data); // Captura el resultado de la actualización

        // Finalizar la transacción
        $this->db->trans_complete();

        // Verificar si la transacción fue exitosa
        if ($this->db->trans_status() === FALSE) {
            // Manejo de error si la actualización falla
            $this->session->set_flashdata('error', 'No se pudo registrar la devolución. Inténtalo de nuevo.');
        } else {
            // Redirigir a la vista de libros prestados con un mensaje de éxito
            $this->session->set_flashdata('success', 'El libro ha sido devuelto con éxito.');
        }
    } else {
        // Manejo de error si no se recibe el ID
        $this->session->set_flashdata('error', 'No se pudo registrar la devolución. ID de préstamo no recibido.');
    }

    redirect('Prestamo_controlador/librosPrestados');
    }
  

}
