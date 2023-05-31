<?php

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['tname'];
        $email = $data['temail'];
        $phone = $data['tphone'];
        $date = $data['tdate'];
        $id_role = $data['tid_role'];

        $query = "insert into members values ('', '$name', '$email', '$phone', '$date', '$id_role')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM members WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($data)
    {

        $name = $data["tname"];
        $email = $data["temail"];
        $phone = $data["tphone"];
        $date = $data["tdate"];
        $id_role = $data['tid_role'];
        $id = $data["id_edit"];
        
        $query = "update members set name='$name', email='$email', phone='$phone', join_date = '$date', id_role='$id_role' where id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
