<?php



class Model_city extends CI_Model {

    

    public function fetch_c($id = NULL) {

		if(!empty($id)){

		$where = 'WHERE id='.$id;	

		}else{

		$where = '';

		}

		

        $query = $this->db->query("select * from city ".$where." ORDER BY name ASC");

        if(!empty($id)){

		$result =  $query->row();

		}else{

		$result = $query->result();	

		}

		

        if(!empty($result))

        {

            return $result;

        }else{

            return false;

        }

    }



    public function fetchName_c($id) {

        $this->db->select('*');

        $this->db->from('city');

		$this->db->join ( 'countries', 'countries.code = city.code' , 'left' );

        $this->db->where('id', $id);

        $query = $this->db->get();



        if ($query->num_rows() == 1) {



            return $query->row();

        } else {



            return false;

        }



    }

	

	  public function filter_city($lang = 'eng') {
     
       // $lang = $this->session->userdata('lang');
		$this->db->select('*');

        $this->db->from('city');

        $this->db->where('countrycode', 'SAU');
        if($lang == 'arb')
		{
			//exit();
			$this->db->order_by('arb_name','asc');
		}else
		{
			$this->db->order_by('name','asc');
		}
        $query = $this->db->get();
        


        if ($query->num_rows() > 0) {



            return $query->result();

        } else {



            return false;

        }



    }





   



}



