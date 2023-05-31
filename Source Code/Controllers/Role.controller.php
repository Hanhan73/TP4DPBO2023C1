<?php
include_once("conf.php");
include_once("models/Role.class.php");
include_once("views/Role.view.php");

class RoleController {
  private $role;

  function __construct(){
    $this->role = new Role(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->role->open();
    $this->role->getRole();
    $data = array();
    while($row = $this->role->getResult()){
      array_push($data, $row);
    }

    $this->role->close();

    $view = new RoleView();
    $view->render($data);
  }

  function add($data){
    $this->role->open();
    $this->role->add($data);
    $this->role->close();
    
    header("location:role.php");
  }

  function edit($id){
    $this->role->open();
    $this->role->edit($id);
    $this->role->close();
    
    header("location:role.php");
  }

  function delete($id){
    $this->role->open();
    $this->role->delete($id);
    $this->role->close();
    
    header("location:role.php");
  }

  public function editFormRole($id) {
    $this->role->open();
    $this->role->getRole();
    $datarole = array();
    while($row = $this->role->getResult()){
      array_push($datarole, $row);
    }


    $this->role->close();

    $view = new RoleView();
    $view->editRole($id, $datarole);
  }

}