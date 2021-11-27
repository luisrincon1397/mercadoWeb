<?php
class Pedido_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function consultaPedidos()
    {
        $this->db->select('*');
        $this->db->from('pedido');
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

    public function borrarPedido($data)
    {
        $rs = $this->db->where("id_pedido", $data["id_pedido"]);
        $rs = $this->db->get("pedido_detalle");

        $obj["resultado"] = $rs->num_rows() > 0;

        if ($obj["resultado"]) {
            $rs2 = $this->db->where("id_pedido", $data["id_pedido"]);
            $rs2 = $this->db->delete("pedido_detalle");
            $obj["resultado"] = $this->db->affected_rows() > 0;
            if ($obj["resultado"]) {
                $rs3 = $this->db->where("id_pedido", $data["id_pedido"]);
                $rs3 = $this->db->delete("pedido");
                $obj["resultado"] = $this->db->affected_rows() > 0;
                if ($obj["resultado"]) {
                    $obj["mensaje"] = "El pedido se ha eliminado exitosamente";
                } else {
                    $obj["mensaje"] = "Surgio un problema al borrar el pedido";
                }
            } else {
                $obj["mensaje"] = "Surgio un problema al borrar el detalle de pedido";
            }
        } else {
            $obj["mensaje"] = "El pedido y/o detalle ya no se encuentra en la base de datos";
        }

        return $obj;
    }

    public function detallesPedido($data)
    {
        $this->db->select('*');
        $this->db->from('pedido_detalle');
        $this->db->join('inventario', 'pedido_detalle.id_articulo = inventario.id_articulo', 'inner');
        $this->db->where("pedido_detalle.id_pedido", $data["id_pedido"]);
        $rs = $this->db->get();

        $obj["resultado"] = $rs->num_rows() > 0;

        if ($obj["resultado"]) {
            $obj["detalle"] = $rs->result();
            $obj["mensaje"] = "Consulta exitosa";
        } else {
            $obj["mensaje"] = "No se encuentran pedido en la base de datos";
        }

        return $obj;
    }

    public function consultarPedido($id)
    {
        $this->db->from('pedido');
        $this->db->where("pedido.id_pedido", $id);
        $rs = $this->db->get();

        $obj["resultado"] = $rs->num_rows() > 0;

        if ($obj["resultado"]) {
            $obj["detalle"] = $rs->result();
            $obj["mensaje"] = "Consulta exitosa";
        } else {
            $obj["mensaje"] = "No se encuentran pedido en la base de datos";
        }

        return $obj;
    }

    public function crearPedido($data)
    {
        $this->db->insert('pedido', $data);
        $obj["resultado"] = $this->db->affected_rows() > 0;
        if ($obj["resultado"]) {
            $obj["id_pedido"] = $this->db->insert_id();
            $obj["mensaje"] = "Pedido realizado correctamente.";
        } else {
            $obj["mensaje"] = "Error al realizar pedido";
        }
        return $obj;
    }

    public function insertarDetalle($data)
    {
        $this->db->insert('pedido_detalle', $data);
        $obj["resultado"] = $this->db->affected_rows() > 0;
        if ($obj["resultado"]) {
            $obj["mensaje"] = "Detalle insertado correctamente.";
        } else {
            $obj["mensaje"] = "Error al insertar detalle";
        }
        return $obj;
    }
}
