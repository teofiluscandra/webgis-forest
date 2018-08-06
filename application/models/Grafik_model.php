<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grafik_model extends CI_Model
{

     function __construct()
    {
        parent::__construct();
    }

    function get_buah_2016(){
  $sql = $this->db->query("
   
  SELECT
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=1)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Januari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=2)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Februari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=3)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Maret`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=4)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `April`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=5)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Mei`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=6)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Juni`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=7)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Juli`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=8)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Agustus`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=9)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `September`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=10)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Oktober`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=11)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `November`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=12)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Desember`  
FROM detail_penanaman JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` GROUP BY YEAR(tgl_tanam) LIMIT 1");
   
  return $sql;
    }

     function get_buah_2017(){
  $sql = $this->db->query("
   
  SELECT
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=1)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Januari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=2)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Februari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=3)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Maret`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=4)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `April`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=5)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Mei`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=6)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Juni`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=7)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Juli`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=8)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Agustus`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=9)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `September`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=10)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Oktober`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=11)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `November`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=12)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Desember`  
FROM detail_penanaman JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` GROUP BY YEAR(tgl_tanam) LIMIT 1");
   
  return $sql;
    }

     function get_buah_2018(){
  $sql = $this->db->query("
   
  SELECT
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=1)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Januari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=2)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Februari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=3)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Maret`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=4)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `April`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=5)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Mei`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=6)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Juni`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=7)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Juli`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=8)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Agustus`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=9)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `September`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=10)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Oktober`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=11)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `November`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=12)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND jenis_pohon = \"Buah-buahan\")),0) AS `Desember`  
FROM detail_penanaman JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` GROUP BY YEAR(tgl_tanam) LIMIT 1");
   
  return $sql;
    }

    function get_mati_2016(){
  $sql = $this->db->query("
   
  SELECT
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=1)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Januari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=2)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Februari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=3)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Maret`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=4)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `April`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=5)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Mei`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=6)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Juni`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=7)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Juli`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=8)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Agustus`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=9)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `September`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=10)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Oktober`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=11)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `November`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=12)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Desember`  
FROM detail_penanaman JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` GROUP BY YEAR(tgl_tanam) LIMIT 1");
   
  return $sql;
    }

    function get_mati_2017(){
  $sql = $this->db->query("
   
  SELECT
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=1)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Januari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=2)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Februari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=3)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Maret`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=4)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `April`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=5)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Mei`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=6)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Juni`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=7)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Juli`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=8)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Agustus`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=9)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `September`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=10)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Oktober`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=11)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `November`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=12)AND (YEAR(tgl_tanam)=2017) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Desember`  
FROM detail_penanaman JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` GROUP BY YEAR(tgl_tanam) LIMIT 1");
   
  return $sql;
    }

    function get_mati_2018(){
  $sql = $this->db->query("
   
  SELECT
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=1)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Januari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=2)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Februari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=3)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Maret`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=4)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `April`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=5)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Mei`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=6)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Juni`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=7)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Juli`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=8)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Agustus`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=9)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `September`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=10)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Oktober`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=11)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `November`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=12)AND (YEAR(tgl_tanam)=2018) AND penanaman.`status` = 2 AND status_pohon = 0)),0) AS `Desember`  
FROM detail_penanaman JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` GROUP BY YEAR(tgl_tanam) LIMIT 1");
   
  return $sql;
    }

    function get_bambu_2016(){
  $sql = $this->db->query("
   
 SELECT
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=1)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Januari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=2)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Februari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=3)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Maret`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=4)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `April`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=5)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Mei`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=6)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Juni`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=7)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Juli`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=8)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Agustus`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=9)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `September`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=10)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Oktober`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=11)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `November`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=12)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Desember`  
FROM detail_penanaman JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` GROUP BY YEAR(tgl_tanam) LIMIT 1");
   
  return $sql;
    }

    function get_bambu_2017(){
  $sql = $this->db->query("
   
 SELECT
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=1)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Januari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=2)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Februari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=3)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Maret`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=4)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `April`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=5)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Mei`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=6)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Juni`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=7)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Juli`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=8)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Agustus`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=9)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `September`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=10)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Oktober`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=11)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `November`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=12)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Desember`  
FROM detail_penanaman JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` GROUP BY YEAR(tgl_tanam) LIMIT 1");
   
  return $sql;
    }

    function get_bambu_2018(){
  $sql = $this->db->query("
   
 SELECT
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=1)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Januari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=2)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Februari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=3)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Maret`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=4)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `April`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=5)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Mei`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=6)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Juni`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=7)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Juli`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=8)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Agustus`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=9)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `September`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=10)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Oktober`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=11)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `November`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=12)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Bambu\")),0) AS `Desember`  
FROM detail_penanaman JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` GROUP BY YEAR(tgl_tanam) LIMIT 1");
   
  return $sql;
    }

    function get_kayu_2016(){
  $sql = $this->db->query("
   
 SELECT
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=1)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Januari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=2)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Februari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=3)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Maret`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=4)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `April`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=5)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Mei`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=6)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Juni`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=7)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Juli`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=8)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Agustus`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=9)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `September`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=10)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Oktober`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=11)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `November`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=12)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Desember`  
FROM detail_penanaman JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` GROUP BY YEAR(tgl_tanam) LIMIT 1");
   
  return $sql;
    }

     function get_kayu_2017(){
  $sql = $this->db->query("
   
 SELECT
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=1)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Januari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=2)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Februari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=3)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Maret`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=4)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `April`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=5)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Mei`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=6)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Juni`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=7)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Juli`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=8)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Agustus`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=9)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `September`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=10)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Oktober`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=11)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `November`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=12)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Desember`  
FROM detail_penanaman JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` GROUP BY YEAR(tgl_tanam) LIMIT 1");
   
  return $sql;
    }

     function get_kayu_2018(){
  $sql = $this->db->query("
   
 SELECT
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=1)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Januari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=2)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Februari`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=3)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Maret`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=4)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `April`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=5)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Mei`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=6)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Juni`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=7)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Juli`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=8)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Agustus`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=9)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `September`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=10)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Oktober`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=11)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `November`,
  IFNULL((SELECT COUNT(id_detail) FROM (detail_penanaman) JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` JOIN pohon ON pohon.`id_pohon` = penanaman.`id_pohon` WHERE ((MONTH(tgl_tanam)=12)AND (YEAR(tgl_tanam)=2016) AND penanaman.`status` = 2 AND jenis_pohon = \"Kayu-kayuan\")),0) AS `Desember`  
FROM detail_penanaman JOIN penanaman ON penanaman.`id_penanaman` = detail_penanaman.`id_penanaman` GROUP BY YEAR(tgl_tanam) LIMIT 1");
   
  return $sql;
    }
}