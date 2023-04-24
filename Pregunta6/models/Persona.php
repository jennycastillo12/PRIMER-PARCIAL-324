<?php 
    class Persona extends CI_Model {
        //agregar
        public function agregar($persona) {
            $this->db->insert('persona', $persona);
        }
        //seleccionar
        public function seleccionar_todo() {
            $this->db->select('*');
            $this->db->from('persona');
            return $this->db->get()->result();
        }
        //eliminar
        public function eliminar($ci_persona) {
            $this->db->where('ci', $ci_persona);
            $this->db->delete('persona');
        }
        //actualizar
        public function actualizar($persona, $ci_persona) {
            $this->db->where('ci', $ci_persona);
            $this->db->update('persona', $persona);
        }
    }
?>