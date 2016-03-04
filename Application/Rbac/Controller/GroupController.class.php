<?php

class GroupController extends CommonController {
	function _filter(&$map){
        if(!empty($_POST['name'])) {
        $map['name'] = array('like',"%".$_POST['name']."%");
        }
    }
    
    public function index() {
        $name = 'Group' ;
        $this->_index($name); 
    }
        
    public function insert() {
        $name = 'Group' ;
        $this->_insert($name); 
    }
    
    public function edit() { 
        $name = 'Group' ;
        $this->_edit($name); 
    }
    
    public function update() { 
        $name = 'Group' ;
        $this->_update($name); 
    }
    
    public function delete() { 
        $name = 'Group' ;
        $this->_delete($name); 
    }  
    
    public function foreverdelete() { 
        $name = 'Group' ;
        $this->_foreverdelete($name); 
    }  
    
    public function clear() { 
        $name = 'Group' ;
        $this->_clear($name); 
    }  
    
    public function forbid() { 
        $name = 'Group' ;
        $this->_forbid($name); 
    }  
    
    public function checkPass() { 
        $name = 'Group' ;
        $this->_checkPass($name); 
    } 
    
    public function recycle() { 
        $name = 'Group' ;
        $this->_recycle($name); 
    }  
    
    public function recycleBin() { 
        $name = 'Group' ;
        $this->_recycleBin($name); 
    } 
    
    public function resume() { 
        $name = 'Group' ;
        $this->_resume($name); 
    } 
    
    public function saveSort() { 
        $name = 'Group' ;
        $this->_saveSort($name); 
    } 
    /**
     +----------------------------------------------------------
     * 默认排序操作
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @return void
     +----------------------------------------------------------
     * @throws FcsException
     +----------------------------------------------------------
     */
    public function sort()
    {
		$node = M('Group');
        if(!empty($_GET['sortId'])) {
            $map = array();
            $map['status'] = 1;
            $map['id']   = array('in',$_GET['sortId']);
            $sortList   =   $node->where($map)->order('sort asc')->select();
        }else{
            $sortList   =   $node->where('status=1')->order('sort asc')->select();
        }
        $this->assign("sortList",$sortList);
        $this->display();
        return ;
    }

}
?>