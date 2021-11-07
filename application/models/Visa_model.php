<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visa_model extends CI_Model
{
    public $table = 'tbl_visa';
    public $id    = 'tbl_visa.id';

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_last()
    {
        $this->db->from($this->table);
        $query = $this->db->order_by('id',"desc")->limit(5)->get();
        return $query->result();
    }

    public function get_count_all()
    {
        $this->db->from($this->table);
        return $query = $this->db->get()->num_rows();
        // return $query->row();
    }

    public function get_count_type($type)
    {
        $this->db->from($this->table);
        return $query = $this->db->where('visa_type',$type)->get()->num_rows();
        // return $query->row();
    }

    public function get_count_status()
    {
        $this->db->from($this->table);
        return $query = $this->db->where('status_notification',1)->get()->num_rows();
        // return $query->row();
    }

    public function get_all()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}
