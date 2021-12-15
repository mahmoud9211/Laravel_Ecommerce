<?php
namespace App\Http\Traits;

trait toastermsgs_trait {

  public function insertmsg()
  {
     $msg = array('message' => 'Data inserted successfully', 'alert-type' => 'success');

     return $msg;
  }

  public function updatemsg()
  {
    $msg = array('message' => 'Data updated successfully', 'alert-type' => 'success');

    return $msg;

  }

  public function deletemsg()
  {
    $msg = array('message' => 'Data deleted successfully', 'alert-type' => 'warning');

    return $msg;


  }

  
  public function activatemsg()
  {
    $msg = array('message' => 'Product activated successfully', 'alert-type' => 'success');

    return $msg;


  }

  public function deactivatemsg()
  {
    $msg = array('message' => 'Product deactivated successfully', 'alert-type' => 'error');

    return $msg;


  }

  public function userpasschanged()
  {
    $msg = array('message' => 'Password Changed successfully', 'alert-type' => 'success');

    return $msg;


  }

  public function userpasserror()
  {
    $msg = array('message' => 'Current password doesn t match with your saved one! ', 'alert-type' => 'error');

    return $msg;


  }

  public function signinfirst()
  {
    $msg = array('message' => 'Please Sign in first! ', 'alert-type' => 'info');

    return $msg;


  }




}
