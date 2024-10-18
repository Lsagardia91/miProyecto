<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libros_model extends CI_Model {
    
    public function listadelibros()
    {
/*      $this->db->select('*');
        $this->db->from('libro');
        return $this->db->get(); // devuelve resultado*/
        // Consulta para obtener libros que no están prestados
         $this->db->select('libro.*'); // Selecciona todos los campos de la tabla libro
         $this->db->from('libro');
         $this->db->join('libro_prestamo', 'libro.id = libro_prestamo.libro_id', 'left'); // Relaciona libro con libro_prestamo
         $this->db->join('prestamo', 'libro_prestamo.prestamo_id = prestamo.id', 'left'); // Relaciona libro_prestamo con prestamo

         // Filtro para excluir libros prestados (prestamo.estado = 1)
         $this->db->group_by('libro.id'); // Agrupamos para evitar duplicados
         $this->db->having('SUM(CASE WHEN prestamo.estado = 1 THEN 1 ELSE 0 END) = 0'); // Solo libros que no tienen estado 1
         
         $query = $this->db->get();
         return $query->result(); // Devuelve el objeto de consulta
        // $query = $this->db->get();
   
         //return $query->result(); // Devuelve los resultados
     }
     public function agregarlibro($data)
     {
         $this->db->insert('libro',$data);
         return $this->db->insert_id(); // Devuelve el ID del libro insertado
     }
     public function eliminarlibro($id)
     {
        $this->db->where('id',$id);
        $this->db->delete('libro');
     } 
     public function recuperarlibro($id)
	{
		$this->db->select('*');
		$this->db->from('libro');
		$this->db->where('id',$id);
		return $this->db->get(); //devuelve el resultado
	}

	public function modificarlibro($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('libro',$data);
	}
    public function agregarAutorLibro($libro_id, $autor_id)
{
    $data = array(
        'libro_id' => $libro_id,
        'autor_id' => $autor_id
    );
    $this->db->insert('libro_tiene_autor', $data);
}
public function obtener_autores_por_libro($id)
{
    // Selecciona los autores asociados al libro
    $this->db->select('a.id, a.nombreautor');
    $this->db->from('libro_tiene_autor la');
    $this->db->join('autor a', 'la.autor_id = a.id');
    $this->db->where('la.libro_id', $id);
    
    return $this->db->get()->result(); // devuelve los autores asociados
}
public function eliminarAutoresLibro($libro_id)
{
    $this->db->where('libro_id', $libro_id);
    $this->db->delete('libro_tiene_autor');
}
public function agregarEjemplar($data)
{
    // Obtener el código de la categoría
    $categoria = $this->db->get_where('categoria', ['id' => $data['categoria_id']])->row();
    if (!$categoria) { 
        return ['success' => false, 'message' => 'Categoría no encontrada.'];
    }
    
    $codigoDewey = $categoria->codigodewey; // Obtén el código Dewey de la categoría
    $numeroCategoria = str_pad($categoria->id, 2, '0', STR_PAD_LEFT); // Asegúrate de que el número de la categoría tenga al menos 2 dígitos

    // Obtener la inicial del título
    $inicialTitulo = substr($data['titulo'], 0, 1); // Inicial del título

    // Obtener la inicial del autor
    $inicialAutor = ''; // Inicial del autor
    if (isset($data['autor_id'])) {
        $autor = $this->db->get_where('autor', ['id' => $data['autor_id']])->row();
        if ($autor) {
            $inicialAutor = substr($autor->nombreautor, 0, 1); // Inicial del autor
        }
    }

    // Generar el código base con inicial del título, inicial del autor, código Dewey y número de categoría
    $codigoBase = strtoupper($inicialTitulo . $inicialAutor . $codigoDewey . $numeroCategoria);

    // Verificar si el libro ya existe por ISBN
    $libroExistente = $this->db->get_where('libro', ['isbn' => $data['isbn']])->row();

    if ($libroExistente) {
        // Si el libro ya existe, incrementar la cantidad de ejemplares
        $this->db->where('id', $libroExistente->id);
        $this->db->set('cantidadejemplares', 'cantidadejemplares + 1', FALSE); // Incrementar en 1
        $this->db->update('libro');

        return ['success' => true, 'message' => 'Ejemplar agregado correctamente.', 'libro_id' => $libroExistente->id];
    }

    // Obtener el último número usado para el mismo código base
    $this->db->select('codigocutterdewey');
    $this->db->like('codigocutterdewey', $codigoBase);
    $this->db->order_by('codigocutterdewey', 'DESC');
    $ultimoCodigo = $this->db->get('libro')->row();

    // Determinar el número a usar
    if ($ultimoCodigo) {
        // Extraer el número final y aumentar
        preg_match('/\d+$/', $ultimoCodigo->codigocutterdewey, $matches);
        $numeroFinal = isset($matches[0]) ? (int)$matches[0] + 1 : 1; // Aumenta el último número encontrado
    } else {
        // Si no hay libros, empieza en 1
        $numeroFinal = 1;
    }

    // Generar el nuevo código Cutter-Dewey
    $codigoCutterDewey = $codigoBase . str_pad($numeroFinal, 4, '0', STR_PAD_LEFT);

    // Aquí puedes agregar el código generado al array de datos, pero sin 'autor_id'
    unset($data['autor_id']); // Elimina autor_id del arreglo
    $data['codigocutterdewey'] = $codigoCutterDewey;
    $data['cantidadejemplares'] = 1; // Inicializa la cantidad de ejemplares a 1

    // Inserta el nuevo libro en la tabla libro
    $this->db->insert('libro', $data);

    // Devuelve el ID del nuevo libro insertado
    return ['success' => true, 'message' => 'Libro agregado correctamente.', 'libro_id' => $this->db->insert_id()];
}




// Método para agregar la relación entre libro y autor
/*public function agregarAutorLibro($libro_id, $autor_id)
{
    $data = [
        'libro_id' => $libro_id,
        'autor_id' => $autor_id
    ];
    return $this->db->insert('libro_has_autor', $data);
}*/


public function obtenerLibros()
{
  /* $query = $this->db->get('libro'); // Asegúrate de que sea el nombre correcto de tu tabla
   return $query->result();*/
    // Consulta para obtener libros que no están prestados
    $this->db->select('libro.*'); // Selecciona todos los campos de la tabla libro
    $this->db->from('libro');
    $this->db->join('libro_prestamo', 'libro.id = libro_prestamo.libro_id', 'left'); // Relaciona libro con libro_prestamo
    $this->db->join('prestamo', 'libro_prestamo.prestamo_id = prestamo.id', 'left'); // Relaciona libro_prestamo con prestamo

    $this->db->group_by('libro.id'); // Agrupamos para evitar duplicados
    $this->db->having('SUM(CASE WHEN prestamo.estado = 1 THEN 1 ELSE 0 END) = 0'); // Solo libros que no tienen estado 1

    $query = $this->db->get(); // Ejecuta la consulta
    return $query->result(); // Devuelve el objeto de consulta
}
public function countLibros()
{
    return $this->db->count_all('libro');
}
}

/*public function registrarPrestamo($libro_id)
{
    $this->db->trans_start();

    // Suponiendo que también necesitas el ID del lector, debes obtenerlo de la sesión o pasarlo como parámetro
    $lector_id = $this->session->userdata('idUsuario'); // Cambia esto según tu lógica

    // Datos para insertar en libro_has_prestamo
    $data = [
        'libro_id' => $libro_id,
        'prestamo_id' => $lector_id, // Asumiendo que tienes esta columna en tu tabla libro_has_prestamo
        'fechaprestamo' => date('Y-m-d H:i:s'),
        'estado' => 'prestado', // Un campo que podría indicar el estado del préstamo
    ];

    $this->db->insert('libro_tiene_prestamo', $data); // Inserta el préstamo en la tabla intermedia

    $this->db->trans_complete();

    return $this->db->trans_status(); // Devuelve el estado de la transacción
}*/


 




 

 


    
