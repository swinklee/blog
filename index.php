<?php
session_start();
include("conn.php");
//得到博客信息
$sql_about="select * from boke_info where boke_id=1";
$q_about=mysql_query($sql_about);
$rs_about=mysql_fetch_assoc($q_about);
$boke_title=$rs_about["title"];
$boke_content=$rs_about["content"];
$boke_dj=$rs_about["dj"];
$boke_fwl=$rs_about["fwl"];
$boke_tx=$rs_about["tx"];
mysql_free_result($q_about);
//
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $boke_title;?></title>
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.STYLE1 {font-family: "新宋体"}
body {
	background-color: #CACACA;
	background-image: url(images/bj.jpg);
}

-->
</style></head>

<body>

<?php
include("top.php");
?>
<table width="950" height="6" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="6"></td>
  </tr>
</table>
<table width="950" height="118" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15" height="15"><img src="images/lanmu_bk_01.gif" width="15" height="15" /></td>
    <td width="921" background="images/lanmu_bk_02.gif"></td>
    <td width="14"><img src="images/lanmu_bk_03.gif" width="14" height="15" /></td>
  </tr>
  <tr>
    <td height="500" background="images/lanmu_bk_04.gif"></td>
    <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="575" height="956" align="left" valign="top">
		<?php
		$sql="select * from arc where category=2 order by arc_id desc limit 4";
		$query=mysql_query($sql);
		while($rs=mysql_fetch_array($query))
		{
		?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
         
          <tr>
            <td height="29" align="left" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="15" align="left" valign="middle" class="lvext14">&nbsp;</td>
              </tr>
              <tr>
                <td height="31" align="left" valign="middle"><a href="show_arc.php?id=<?php echo $rs["arc_id"]?>" class="lvext14"><?=$rs["title"]?></a></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="hui14"><?=date("Y-m-d",strtotime($rs["arc_rq"]))?> </td>
              </tr>
              <tr>
                <td height="60" align="center" valign="top"><img src="<?=$rs["pic"]?>" width="570" height="188" /></td>
              </tr>
              <tr>
                <td height="20" align="left" valign="middle"></td>
              </tr>
              <tr>
                <td><span class="linetext"><?=$rs["des"]?></span></td>
              </tr>
              
              <tr>
                <td height="30" valign="top"><table width="55%" height="23" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="33%" height="23" align="left" valign="middle" class="lvext14">阅读（<?=$rs["hits"]?>次）</td>
                      <td width="37%" align="left" valign="middle" class="lvext14">评论（<?
			$cx=mysql_query("select * from pl where arc_id='".$rs["arc_id"]."'");
			$num=mysql_num_rows($cx);
			echo $num;
			mysql_free_result($cx);
			?>次）</td>
                      <td width="30%"><a href="show_arc.php?id=<?php echo $rs["arc_id"]?>" class="lvext14">阅读全文</a></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td height="1" valign="top" background="images/dot.gif"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="15">&nbsp;</td>
          </tr>
        </table>
		<?
		}
		?>
		</td>
        <td width="18">&nbsp;</td>
        <td width="267" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="162" align="left" valign="top" ><?php include("inc_about.php");?></td>
          </tr>
         
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          
        </table></td>
      </tr>
    </table></td>
    <td background="images/lanmu_bk_06.gif"></td>
  </tr>
  <tr>
    <td height="15"><img src="images/lanmu_bk_07.gif" width="15" height="15" /></td>
    <td height="15" background="images/lanmu_bk_08.gif"></td>
    <td><img src="images/lanmu_bk_09.gif" width="14" height="15" /></td>
  </tr>
</table>
<?php
include("copy.php");
?>
</body>
</html>
