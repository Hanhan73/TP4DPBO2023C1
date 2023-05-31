<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Role.controller.php");

$role = new RoleController();

if (isset($_POST['add'])) {
    //memanggil add
    $role->add($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $role->delete($id);
}else if (!empty($_GET['editForm'])) {
    $role->editFormRole($_GET['editForm']);
}else if (isset($_POST['edit'])) {
    $role->edit($_POST);
}
else{
    $role->index();
}