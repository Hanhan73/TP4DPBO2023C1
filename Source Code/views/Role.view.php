<?php
class RoleView{
    public function render($data){
    $no = 1;
    $dataRole = null;
    foreach($data as $val){
        list($id, $nama) = $val;
        $dataRole .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $nama . "</td>

                <td>
                <a href='role.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                <a href='role.php?editForm=" . $id ."' class='btn btn-success''>Edit</a>
                </td>
                </tr>";
        }
        $tpl = new Template("template/role.html");
        $tpl->replace("DATA_TABEL", $dataRole);
        $tpl->write();
    }

    public function editRole($idRole, $data)
    {
        $dataRole= null;
        foreach($data as $val)
        {
            list($id, $name) = $val;
            if($idRole == $id)
            {
                $dataRole.= 
                "<input type='hidden' name='id_edit' value='$id' class='form-control'> <br>

                <label> NAME: </label>
                <input type='text' name='tname' value='$name' class='form-control'> <br>
            ";
            break;
            }
        }
        

        $tpl = new Template("template/editRole.html");  
        $tpl->replace("FORM_MEMBER", $dataRole);
        $tpl->write();
    }
}