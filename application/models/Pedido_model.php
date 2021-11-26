<?php
class Pedido_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function consulta_pedidos()
    {
        $this->db->select('pedido.id_pedido, pedido.fecha, pedido.id_usuario, usuario.nombre_usuario, pedido.estatus_envio, pedido.total, pedido.estatus_pago, pedido.direccion');
        $this->db->from('pedido');
        $this->db->join('usuario', 'usuario.id_usuario = pedido.id_usuario', 'inner');
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

    public function consultaPedido($data)
    {
        //$this->db->select('pedido.id_pedido, pedido.fecha, pedido.id_usuario, CONCAT(usuario.nombre, " ", usuario.apellido1) AS cliente, pedido.estado,');
        $this->db->from('pedido');
        $this->db->join('pedido_detalle', 'pedido.id_pedido = pedido_detalle.id_pedido', 'inner');
        $this->db->join('inventario', 'pedido_detalle.id_articulo = inventario.id_articulo', 'inner');
        $this->db->where("pedido.id_pedido", $data["id_pedido"]);
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

    public function editarEstatusEnvio($data)
    {
        $this->db->where("id_pedido", $data["id_pedido"]);
        $rs = $this->db->get("pedido");

        $obj["resultado"] = $rs->num_rows() > 0;

        if ($obj["resultado"]) {
            $this->db->set("estatus_envio",  $data["estado"]);
            $this->db->where("id_pedido",   $data["id_pedido"]);
            $this->db->update("pedido");
            $obj["resultado"] = $this->db->affected_rows() == 1;
            if ($obj["resultado"]) {
                $obj["mensaje"] = "El pedido se actualizó correctamente con los mismos datos";
            } else {
                $obj["mensaje"]   = "Surgió un error al intentar actualizar el pedido en la base de datos";
            }
        } else {
            $obj["mensaje"] = "No se encontró el pedido " . $data["id_pedido"] . " en la base de datos";
        }
        return $obj;
    }

    public function editarEstatusPago($data)
    {
        $this->db->where("id_pedido", $data["id_pedido"]);
        $rs = $this->db->get("pedido");

        $obj["resultado"] = $rs->num_rows() > 0;

        if ($obj["resultado"]) {
            $this->db->set("estatus_pago",  $data["estado"]);
            $this->db->where("id_pedido",   $data["id_pedido"]);
            $this->db->update("pedido");
            $obj["resultado"] = $this->db->affected_rows() == 1;
            if ($obj["resultado"]) {
                $obj["mensaje"] = "El pedido se actualizó correctamente con los mismos datos";
            } else {
                $obj["mensaje"]   = "Surgió un error al intentar actualizar el pedido en la base de datos";
            }
        } else {
            $obj["mensaje"] = "No se encontró el pedido " . $data["id_pedido"] . " en la base de datos";
        }
        return $obj;
    }

    public function consulta_mispedidos($id)
    {
        $this->db->from('pedido');
        $this->db->where("pedido.id_usuario", $id);
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

    public function consultar_pedido($id)
    {
        $this->db->from('pedido');
        $this->db->join('pedido_detalle', 'pedido.id_pedido = pedido_detalle.id_pedido', 'inner');
        $this->db->join('inventario', 'pedido_detalle.id_articulo = inventario.id_articulo', 'inner');
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
}
