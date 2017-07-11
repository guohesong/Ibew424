<?php
class database
{
  private $hostname;
  private $user;
  private $pass;
  private $dbname;
  private $linkflag;
  private $charset;

  function __construct()
  {
    $this->hostname="localhost";
    $this->user="root";
    $this->pass="root";
    $this->dbname="ibew424";
    $this->charset="utf8";  //gb2312 GBK utf8
    $this->linkflag=mysqli_connect($this->hostname,$this->user,$this->pass);
    mysqli_select_db($this->linkflag,$this->dbname) or die($this->error());
    mysqli_query($this->linkflag,"set names ".$this->charset);
  }

  function __set($property_name,$value)
  {
    return $this->$property_name=$value;
  }

  function __get($property_name)
  {
    if(isset($this->$property_name))
    {
      return $this->$property_name;
    }
    else return null;
  }

  function __call($function_name, $args)
  {
    echo "<br><font color=#ff0000>你所调用的方法 $function_name 不存在</font><br>\n";
  }

  function query($sql)
  {
    $res=mysqli_query($this->linkflag,$sql) or die($this->error());
    return $res;
  }

  function fetch_array($res)
  {
    return mysqli_fetch_array($res);
  }

  function fetch_object($res)
  {
    return mysqli_fetch_object($res);
  }

  function fetch_obj_arr($sql)
  {
    $obj_arr=array();
    $res=$this->query($sql);
    while($row=mysqli_fetch_object($res))
    {
      $obj_arr[]=$row;
    }
    return $obj_arr;
  }

  function error()
  {
    if($this->linkflag)
    {
      return mysqli_error($this->linkflag);
    }
    else    return mysqli_error();
  }

  function errno()
  {
    if($this->linkflag)
    {
      return mysqli_errno($this->linkflag);
    }
    else    return mysqli_errno();
  }

  function affected_rows()
  {
    return mysqli_affected_rows($this->linkflag);
  }

  function num_rows($sql)
  {
    $res=$this->execute($sql);
    return mysqli_num_rows($res);
  }

  function num_fields($res)
  {
    return mysqli_num_fields($res);
  }

  function insert_id()
  {
    $previous_id=mysqli_insert_id($this->linkflag);
    return $previous_id;
  }

  function result($res,$row,$field=null)
  {
    if($field===null)
    {
      $res=mysqli_result($res,$row);
    }
    else    $res=mysqli_result($res,$row,$field);
    return $res;
  }

  function version()
  {
    return mysqli_get_server_info($this->linkflag);
  }

  function data_seek($res,$rowNum)
  {
    return mysqli_data_seek($res,$rowNum);
  }

  function __destruct()
  {
    mysqli_close($this->linkflag);
  }

}

?>