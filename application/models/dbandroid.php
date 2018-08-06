<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class dbandroid extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function LoginApi($username, $password)
    {
        $result = $this->db->query("SELECT
                                        nim,
                                        kodedosen,
                                        nama,
                                        username,
                                        kelas,
                                        prodi,
                                        email,
                                        photo
                                    FROM
                                        mahasiswa
                                    WHERE
                                        username = '$username'
                                    AND PASSWORD = '$password'");
        return $result->result();
    }
}