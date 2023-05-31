<?php
  class MembersView{
    public function render($data,$dataRole){
      $no = 1;
      $dataMembers = null;
      foreach($data as $val){
        list($id, $name, $email, $phone, $join_date, $id_role) = $val;
        $nama_role='';
        foreach($dataRole as $role){
            list($idr, $nameRole) = $role;
            if ($idr == $id_role) {
                $nama_role = $nameRole;
                break;
            }
        }
        $dataMembers .= "<tr>
        <td>" . $no++ . "</td>
        <td>" . $name . "</td>
        <td>" . $email . "</td>
        <td>" . $phone . "</td>
        <td>" . $join_date . "</td>
        <td>" . $nama_role . "</td>
        <td>
        <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
        <a href='index.php?editForm=" . $id ."' class='btn btn-success''>Edit</a>
        </td>
        </tr>";
      }

      $tpl = new Template("template/index.html");
      $tpl->replace("DATA_TABEL", $dataMembers);
      $tpl->write();
    }

    public function listRole($dataRole)
    {
        $listRole = null;
        foreach ($dataRole as $val) {
            list($id, $nama) = $val;
            $listRole .= "<option value='" . $id . "'>" . $nama . "</option>";
        }

        $tpl = new Template("template/create.html");
        $tpl->replace("OPTION", $listRole);
        $tpl->write();
    }

    public function editMember($idMember, $data, $dataClub)
    {
        $dataMember = null;
        $roleMember = 0;
        foreach($data as $val)
        {
            list($id, $name, $email, $phone, $join_date, $id_role) = $val;
            if($idMember == $id)
            {
                $dataMember .= 
                "<input type='hidden' name='id_edit' value='$id' class='form-control'> <br>

                <label> NAME: </label>
                <input type='text' name='tname' value='$name' class='form-control'> <br>
                <label> EMAIL: </label>
                <input type='text' name='temail' value='$email' class='form-control'> <br>
                <label> PHONE: </label>
                <input type='text' name='tphone' value='$phone' class='form-control'> <br>
                <label> DATE: </label>
                <input type='date' name='tdate' value='$join_date'class='form-control'> <br>
            ";
            $roleMember = $id_role;
            break;
            }
        }
        
        $listRole = null;
        foreach ($dataClub as $val) {
            list($id, $nama) = $val;
            if($id == $roleMember)
            {
                $listRole .= "<option selected value='" . $id . "'>" . $nama . "</option>";
            }
            else
            {
                $listRole .= "<option value='" . $id . "'>" . $nama . "</option>";
            }
        }

        $tpl = new Template("template/edit.html");  
        $tpl->replace("FORM_MEMBER", $dataMember);
        $tpl->replace("OPTION_ROLE", $listRole);
        $tpl->write();
    }


  }