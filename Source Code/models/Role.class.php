<?php

class Role extends DB
{
    function getRole()
    {
        $query = "SELECT * FROM role";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['tname'];

        $query = "insert into role values ('', '$name')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM role WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($data)
    {

        $name = $data["tname"];
        $id = $data["id_edit"];
        
        $query = "update role set nama='$name' where id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
