<?php

class Model_social extends CI_Model {

    function _construct() {
        parent::_construct();
    }

    public function fetch($id) {

        $this->db->select('*');
        $this->db->from('social_links');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

}
