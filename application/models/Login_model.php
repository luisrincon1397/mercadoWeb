<?PHP

class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inicio_sesion($usuario, $contrasenia)
    {
        $sql = $this->db->query("SELECT *from login where usuario = ? and password = md5(?)", array($usuario, $contrasenia) );

        if($sql->num_rows()>0){
            $obj["mensaje"] = true;
        }else{
            $obj["mensaje"] = false;
        }

        return $obj;
    }

}