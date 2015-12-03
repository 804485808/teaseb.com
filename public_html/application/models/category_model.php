<?php
class Category_model extends MY_Model {
    function __construct()
    {
        parent::__construct();
    }
    static  $table = 'category';
    public $mainTable = 'wl_category';

    public function creatData($data)
    {
        return $this->createDateCommon($data, $this->mainTable);
    }

    /**
     * 获取当前类别信息
     */
    public function getCategory($catid){
        $catid = intval($catid);
        if(!is_int($catid) or empty($catid)){
            throw new Exception("param catid is not Int");
        }
        return $this->find(self::$table,array("catid"=>$catid));
    }

    /**
     * 获取所有顶级的类别
     */
    public function getTopCategory(){
        $rs = $this->findAll(self::$table,"parentid = 0 ","hits desc,letter asc");
        return $rs;
    }

    /**
     * 获取当前类别的所有父类
     */
    public function getAllParentCategory($catid){
        $thisCategory = $this->getCategory($catid);
        if(!$thisCategory){
            return false;
        }else{
            if($thisCategory['parentid']){
                $parents = $this->findAll(self::$table,"catid in({$thisCategory['arrparentid']})","FIND_IN_SET(catid,'{$thisCategory['arrparentid']}')");
            }else{
                $parents = array($thisCategory);
            }

            return $parents;
        }
    }

    /**
     * 获取当前类别的子类
     */
    public function getSubCategory($catid){
        $thisCategory = $this->getCategory($catid);
        if(!$thisCategory){
            return false;
        }else{
            $subs = $this->findAll(self::$table,"parentid = {$thisCategory['catid']} and item <> 0","listorder asc");
            return $subs;
        }
    }

    /**
     * 获取当前类别的顶级父类
     */

    public function getTopParentCategory($catid){
        $parents = $this->getAllParentCategory($catid);
        return $parents[0];
    }

//数据入库
    public function category($data,$temp=0,$parentid=0,$arrparentid=0){
        $tempData['catname'] = $data[$temp];
        $inData = $this->category->creatData($tempData);

        if(!$data[$temp]){
//            die('处理完毕');
            return 1;
        }
        //topCategory
        if($temp === 0) {
            $re = $this->comm->find('category', array('catname' => "{$data[$temp]}", 'parentid' => $parentid));
            if($re){
                $this->category($data,$temp+1,$re['catid'],$re['arrparentid']);
//                    echo 1;die;
            }else{
                //插入
                $inData['parentid']=0;
                $inData['arrparentid'] = $arrparentid;
                $inData['arrchildid'] = '';
                $ire = $this->db->insert('category',$inData);
                $new_parentid = mysql_insert_id();
                if($ire){
                    $tempArrprentid = $arrparentid.",".$new_parentid;
                    $this->db->update('category',array('arrparentid'=>$tempArrprentid,'arrchildid'=>''),array('catid'=>$new_parentid));
                    $this->category($data,$temp+1,$new_parentid,$tempArrprentid);
                }else{
                    echo 'no';die;
                }
            }
        }else{
            $re = $this->comm->find('category', array('catname' => "{$data[$temp]}", 'parentid' => $parentid));
            if($re){
                $this->category($data,$temp+1,$re['catid'],$re['arrparentid']);
            }else{
//                    echo $temp."<br>";
//                    echo $parentid."<br>";
//                    echo $arrparentid;die;
                //插入
                $inData['parentid']=$parentid;
                $inData['arrparentid'] = $arrparentid;
                $ire = $this->db->insert('category',$inData);
                $new_parentid = mysql_insert_id();
                if($ire){
                    //arrchildid
                    $allParent = $this->category_child1($new_parentid);
                    $ChildidStr = substr($allParent,0,-1);
                    $arrChildid = explode(',',$ChildidStr);
                    sort($arrChildid);

                    $this->category_child3($arrChildid);

                    $tempArrprentid = $arrparentid.",".$new_parentid;
                    $this->db->update('category',array('arrparentid'=>$tempArrprentid),array('catid'=>$new_parentid));
                    $re = $this->category($data,$temp+1,$new_parentid,$tempArrprentid);
                }else{
                    echo 'no';die;
                }
            }
        }

        return $re;
    }

    public function category_child1($selfId,$str = ''){
        $str .= $selfId.",";

        $thisCat = $this->comm->find('category',array('catid'=>$selfId));
        $parentId = $thisCat['parentid'];

        $prarentRe = $this->comm->find('category',array('catid'=>$parentId));

        if($prarentRe){
            $str = $this->category_child1($parentId,$str);
        }
        return $str;

    }

    public function category_child2($Parentid,$arrChildS='',$TopCatid){
        $thisCat = $this->comm->find('category',array('catid'=>$Parentid));
        $childRe = $this->comm->findAll('category',array('parentid'=>$Parentid));
        if($childRe){
            foreach($childRe as $k=>$v){
                $arrChildS .= $v['catid'].",";
                $this->category_child2($v['catid'],$arrChildS,$TopCatid);
            }
        }else{
            $arrChildS = substr($arrChildS,0,-1);
            $this->db->update('category',array('arrchildid'=>$arrChildS),array('catid'=>$TopCatid));
        }

    }

    public function category_child3($all){
        $num = count($all);
        foreach($all as $k=>$v){


            for($i=$k;$i<$num;$i++){
                $temp = $i+1;
                if(!$all[$temp]){
                    continue;
                }
                $temp = $all[$temp];

                $sql = "select * from wl_category where find_in_set($temp,arrchildid) and catid='{$v}' ";
                $query = $this->db->query($sql);

                if($query->num_rows>0){
                }else{
                    $re = $this->find('category',array('catid'=>$v));
                    if($re['arrchildid']) {
                        $arrChildS = $re['arrchildid'] . "," . $temp;
                    }else{
                        $arrChildS = $temp;
                    }
                    $this->db->update('category',array('arrchildid'=>$arrChildS),array('catid'=>$v));

                }


            }



        }
    }

}