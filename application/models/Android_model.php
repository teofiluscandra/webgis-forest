<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Android_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function LoginApi($username, $password)
    {
        $result = $this->db->query("SELECT
                                     *
                                    FROM
                                        users
                                    WHERE
                                        username = '$username'
                                    AND password = '$password'");
        return $result->result();
    }

    function save_relawan($data){
       

            $result = $this->db->trans_start();
            $result = $this->db->insert('detail_penanaman',$data);
            $result = $this->db->trans_complete();
            return $result->result();       
       }
    }
}

