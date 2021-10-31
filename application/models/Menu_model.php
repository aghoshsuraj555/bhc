<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Menu_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table_name = 'menus';
        $this->primary_key = 'id';
    }

    function get_all()
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_cond($cond = array())
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where($cond);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_one($id)
    {
        $cond[$this->primary_key] = $id;
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where($cond);
        $query = $this->db->get();
        return $query->row();
    }
    function get_pagination_count()
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_pagination($num, $offset)
    {
        $this->db->select('*');
        $this->db->limit($num, $offset);
        $this->db->from($this->table_name);
        $query = $this->db->get();
        return $query->result_array();
    }
    function insert($data)
    {
        return $this->db->insert($this->table_name, $data);
    }

    function update($data, $id)
    {
        $cond[$this->primary_key] = $id;
        return $this->db->update($this->table_name, $data, $cond);
    }

    function delete($id)
    {
        $cond[$this->primary_key] = $id;
        return $this->db->delete($this->table_name, $cond);
    }

    function get_role_menu($menu_id = 0)
    {
        $role_menu = '';
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('menu_id', $menu_id);
        $query = $this->db->get();
        $menus = $query->result_array();
        foreach ($menus as $menu) :
            if($menu['url']){
                $url = base_url($menu['url']);
            }
            else{
                $url = "javascript:void(0)";
            }
            $sub_menus = $this->get_sub_menu($menu['id']);
            ($sub_menus) ? $collapse = "data-bs-toggle='collapse' data-bs-target='#home-collapse' aria-expanded='true'" : $collapse = '';
            $role_menu.= "<a href=" .$url. " class='nav_link' " . $collapse . "> <img src=" . base_url('/public/assets/images/icons/' . $menu['icon']) . " data-bs-toggle='tooltip' data-bs-placement='right' title=" . $menu['name'] . " alt='' srcset=''> <span class='nav_name'>" . $menu['name'] . "</span> </a>";
            if ($sub_menus) {
                $role_menu.= "<div class='collapse' id='home-collapse'>
                <ul class='btn-toggle-nav list-unstyled fw-normal ps-md-5'>";
                foreach ($sub_menus as $sub_menu) :
                    if($sub_menu['url']){
                        $url = base_url($sub_menu['url']);
                    }
                    else{
                        $url = "javascript:void(0)";
                    }
                    $role_menu.="<li><a href=".$url." class='nav_link'>".$sub_menu['name']."</a></li>";
                endforeach;
                $role_menu.= '</ul>
				</div>';
            }
        endforeach;
        return $role_menu;
    }

    function get_sub_menu($menu_id)
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('menu_id', $menu_id);
        $query = $this->db->get();
        return $query->result_array();
    }
}
