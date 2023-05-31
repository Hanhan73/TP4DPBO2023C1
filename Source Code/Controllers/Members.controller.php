<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("models/Role.class.php");
include_once("views/Members.view.php");

class MembersController {
  private $members;
  private $role;

  function __construct(){
    $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->role = new Role(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->members->open();
    $this->role->open();
    $this->members->getMembers();
    $this->role->getRole();
    
    $data = array();
    while($row = $this->members->getResult()){
      array_push($data, $row);
    }
    
    $dataRole = array();
    while($row = $this->role->getResult()){
      array_push($dataRole, $row);
    }

    $this->members->close();
    $this->role->close();

    $view = new MembersView();
    $view->render($data,$dataRole);
  }

  
  public function addForm()
  {
    $this->role->open();
    $this->role->getRole();

    $datarole = array();
    while($row = $this->role->getResult()){
      array_push($datarole, $row);
    }

    $this->role->close();

    $view = new MembersView();
    $view->listrole($datarole);
  }

  public function editForm($id) {
    $this->members->open();
    $this->role->open();
    $this->members->getMembers();
    $this->role->getRole();
    $data = array();
    while($row = $this->members->getResult()){
      array_push($data, $row);
    }

    $datarole = array();
    while($row = $this->role->getResult()){
      array_push($datarole, $row);
    }

    $this->members->close();
    $this->role->close();

    $view = new MembersView();
    $view->editMember($id, $data, $datarole);
  }

  function add($data){
    $this->members->open();
    $this->members->add($data);
    $this->members->close();
    
    header("location:index.php");
  }

  function edit($id){
    $this->members->open();
    $this->members->edit($id);
    $this->members->close();
    
    header("location:index.php");
  }

  function delete($id){
    $this->members->open();
    $this->members->delete($id);
    $this->members->close();
    
    header("location:index.php");
  }


}