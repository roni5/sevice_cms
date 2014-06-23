<?php

class Node extends Service
{
  // data stored in this object
  protected $node;
  
  public function __construct($options){
    parent::__construct($options);
    $this->connect();
  }
  public function node_load($nid) {
    return (object)$this->requestSend($this->_methods->NODE_GET, array($nid));
  }
  public function node_create($node) {
    if(is_array($node)){
      $node = (object)$node;
    }
    return $this->requestSend($this->_methods->NODE_CREATE, array($node));
  }

  public function node_save($nid, $node) {
    if(is_object($node)){
      $node = (array)$node;
    }
    return $this->requestSend($this->_methods->NODE_SAVE, array($nid, $node));
  }
  public function node_delete($nid) {
   if (!is_array($nid)) {
      $nid = (array)$nid;
    } 
    $return = array();
    foreach ($$nid as $id) {
      $return[] = $this->requestSend($this->_methods->NODE_DELETE, array($nid));
    }
    return $return;
  }
  
  public function node_list(){
      return $this->requestSend($this->_methods->NODE_LIST);
  }
}
