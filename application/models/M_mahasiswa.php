<?php

class M_Mahasiswa extends CI_Model
{

    // Mahasiswa
    public function get_mhs()
    {
        $query = $this->db->query("SELECT * FROM mahasiswa LEFT join beasiswa on beasiswa.id_beasiswa = mahasiswa.id_beasiswa");
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
        $this->db->insert('mahasiswa', $data);

        // Check if the insertion was successful
        return $this->db->affected_rows() > 0;
    }

    public function insert_mh($nim, $beasiswa, $nama, $alamat)
    {
        $query = $this->db->query("INSERT INTO mahasiswa(NIM, ID_BEASISWA, NAMA, ALAMAT) VALUES ('$nim','$beasiswa','$nama','$alamat')");
        return $query;
    }

    public function cek_nim_terbaru($nim, $id)
    {

        $this->db->where('NIM', $nim);
        $this->db->where('NIM !=', $id);
        $query = $this->db->get('mahasiswa');
        return $query->num_rows() > 0;
    }

    public function edit_mhs($id, $nim, $beasiswa, $nama, $alamat)
    {
        $query = $this->db->query("UPDATE mahasiswa SET NIM='$nim',ID_BEASISWA='$beasiswa',NAMA='$nama',ALAMAT='$alamat' WHERE NIM='$id'");
        return $query;
    }

    public function hapus_mhs($nim)
    {
        $this->db->where('NIM', $nim);
        $this->db->delete('mahasiswa');
        return $this->db->affected_rows() > 0;
    }


    // Beasiswa
    public function get_bs()
    {
        $query = $this->db->query("SELECT * FROM beasiswa");
        return $query;
    }
}