<?php

class M_Kost extends CI_Model
{

    // Kost
    public function get_mhs()
    {
        $query = $this->db->query("SELECT * FROM kost");
        return $query;
    }
    public function is_nim_exists($nim)
    {
        $this->db->where('NIM', $nim);
        $query = $this->db->get('mahasiswa');
        return $query->num_rows() > 0;
    }

    public function insert_mhs($data)
    {
        // Assuming 'mhs' is the name of your students table
        $this->db->insert('kost', $data);

        // Check if the insertion was successful
        return $this->db->affected_rows() > 0;
    }


    public function edit_kost($id, $no_kost, $nama, $telpon)
    {
        $query = $this->db->query("UPDATE kost SET no_kost='$no_kost',nama='$nama',telpon='$telpon' WHERE id_kost='$id'");
        return $query;
    }

    public function hapus_kost($id)
    {
        $this->db->where('id_kost', $id);
        $this->db->delete('kost');
        return $this->db->affected_rows() > 0;
    }

}