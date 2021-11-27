<?php
class Inventario_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function consultaInventario()
    {
        $this->db->select('*');
        $this->db->from('inventario');
        $rs = $this->db->get();

        $obj["resultado"] = $rs->num_rows() > 0;

        if ($obj["resultado"]) {
            $obj["pedido"] = $rs->result();
            $obj["mensaje"] = "Consulta exitosa";
        } else {
            $obj["mensaje"] = "No se encuentran pedido en la base de datos";
        }

        return $obj;
    }

    public function borrarArticulo($data)
    {
        $rs = $this->db->where("id_articulo", $data["id_articulo"]);
        $rs = $this->db->get("inventario");

        $obj["resultado"] = $rs->num_rows() > 0;

        if ($obj["resultado"]) {
            $this->db->where("id_articulo", $data["id_articulo"]);
            $this->db->delete("inventario");
            $obj["resultado"] = $this->db->affected_rows() > 0;
            if ($obj["resultado"]) {
                $obj["mensaje"] = "El articulo se ha eliminado exitosamente";
            } else {
                $obj["mensaje"] = "Surgio un problema al borrar el articulo";
            }
        } else {
            $obj["mensaje"] = "El articulo y/o detalle ya no se encuentra en la base de datos";
        }
        return $obj;
    }

    public function detallesInventario($data)
    {
        $this->db->select('*');
        $this->db->from('inventario');
        $this->db->where("inventario.id_articulo", $data["id_articulo"]);
        $rs = $this->db->get();

        $obj["resultado"] = $rs->num_rows() > 0;

        if ($obj["resultado"]) {
            $obj["detalle"] = $rs->result();
            $obj["mensaje"] = "Consulta exitosa";
        } else {
            $obj["mensaje"] = "No se encuentran articulo en la base de datos";
        }

        return $obj;
    }
}
