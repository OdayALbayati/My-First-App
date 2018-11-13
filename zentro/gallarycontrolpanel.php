<?php
include './DataBaeseConn/myconn.php';
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: Education Time
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>Gallary control panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<!-- liteAccordion is Homepage Only -->
<link rel="stylesheet" href="layout/scripts/liteaccordion-v2.2/css/liteaccordion.css" type="text/css" />
</head>
<body id="top">
  
 
<div class="wrapper row4">
  <div id="container" class="clear"> 
    <!-- ####################################################################################################### -->
    <div id="homepage" class="clear">
      <div class="fl_left">
          <li>  <a href="index.php" class="smoothScroll">Logout</a></li>
           
                    

        <h2 class="title"> gallary control panel    </h2>  

        
    <!-- ####################################################################################################### --> 
  </div>
</div>
    <form method="post" action="gallarycontrolpanel.php" style="background-color: rgb(255, 255, 255); width: 100%; min-height: 640px; padding-top: 8px;">
        <div>

            <table style="width: 70%; text-align: center;" border="1">
                <tr style="background-color: #03122e; color: white;">
                    <td colspan="4" style="padding: 15px;">
                        Database connection test
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="height: 5px; background-color: #000000;">
                                            <hr style="font-size: 18px; border: 9px solid black;" />
                    </td>
                </tr>
                <tr>
                    <td colspan="1" style="width: 25%; background-color: #03122e; color: white; padding: 8px;">

                      Search
                    </td>
                    <td colspan="2">
                      
                        <input type="text" name="idsearch"  BorderColor="#003366" Font-Size="20px"/>
                    </td>
                    <td>
                        <input type="submit" name="search" value="search"class="btnNew" Width="99%" BorderColor="#003366" Font-Size="20px"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="height: 5px; background-color: #000000;">
                        <hr style="font-size: 18px; border: 9px solid black;" />
                    </td>
                </tr>
                <tr>
                    <td style="width: 25%; background-color: #03122e; color: white; padding: 8px;">
                      
                      Id
                    </td>
                    <td style="width: 25%;">
                       
                       <input name="id" type="text" Font-Size="20px" Width="99%" BorderColor="#003366"/>
                    </td>
                    <td style="width: 25%; background-color: #03122e; color: white;">
                      
                       image source
                    </td>
                    <td style="width: 25%;">
                    
                            <input name="img" type="text" Font-Size="20px" Width="99%" BorderColor="#003366"/>
                    </td>
                </tr>


                <tr>
                    <td style="width: 25%; background-color: #03122e; color: white; padding: 8px;">
                      
                      name
                    </td>
                    <td style="width: 25%;">
                      
                      <input name="name" type="text" Font-Size="20px" Width="99%" BorderColor="#003366"/>
                    </td>
                    <td style="width: 25%; background-color: #03122e; color: white;">
                    
                     details
                    </td>
                    <td style="width: 25%;">
                     
                     <input name="details" type="text" Font-Size="20px" Width="99%" BorderColor="#003366"/>

                    </td>
                </tr>

                <tr style="background-color: #bababa;">
                    <td style="padding: 2px;">
   
                        <input type="submit" value="Add"  Class="btnNew" name="Add" />
                    </td>
                    <td>
                        <input type="submit" value="New" Class="btnNew" name="New" />
                    </td>
                    <td>
                        <input type="submit" value="Edit" Class="btnNew" name="Edit" />
                    </td>
                    <td  >
                        <input type="submit" value="Delete" Class="btnNew" name="Delete" />
                    </td>

                </tr>
                
            </table> 
            <table border="1" width="50%">
                <h4>food gallary grid</h4>
                <tr>
                    <td>id</td>
                    <td>img</td>
                    <td>name</td>
                    <td>details</td>
                </tr>
                             <?php
              //search about record
    if(isset($_REQUEST['search']))
    {$idsearch=$_REQUEST['idsearch'];
        if ($idsearch=='') {
            //show the table
    $sql = "SELECT * FROM food_gallary";
       $result = mysqli_query($link, $sql);
                if (mysqli_num_rows($result))//3
                 {
                    while ($row = mysqli_fetch_array($result)) {
                        
                        echo '<tr>';
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['img']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['details']."</td>";
                        echo '</tr>';
                        
                    }
                }
                else {
                    echo '0 Result';
                }
        
       } 
       
      
      
       else{
           $sql = "SELECT * FROM food_gallary where id='$idsearch'";
       $result = mysqli_query($link, $sql);
                if (mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_array($result)) {
                        
                        echo '<tr>';
                        echo '<td>'.$row['id'].'</td>';
                        echo "<td>".$row['img']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['details']."</td>";
                        echo '</tr>';
 
                    }
                }
                else {
                    echo '0 Result';
                }
           
        
    }
    
     }    
       ?>    
               
            </table>
             <?php
    
    //insert record
    if(isset($_REQUEST['Add']))
    {
        $id=$_REQUEST['id'];
        $img=$_REQUEST['img'];
        $name=$_REQUEST['name'];
        $details=$_REQUEST['details'];
        
        $sql = "INSERT INTO food_gallary (id,img,name,details) VALUES "
            . "('$id','$img','$name','$details')";
        if (mysqli_query($link, $sql)) {
        
            echo 'New record created successfully';
         
    } else {
        echo "Error saving record: " . mysqli_error($link);
    }
    }
    //new record
     if(isset($_REQUEST['New'])){}
     //delete records
      if(isset($_REQUEST['Delete']))
      {
          $id=$_REQUEST['id'];  
     $sql = "DELETE FROM food_gallary WHERE id='$id'";   
      if (mysqli_query($link, $sql)) {
        echo 'record Delete successfuly';
         
    } else {
        echo "Error Deleting record: " . mysqli_error($link);
           }  
      }
    ?>
   </form>
  
<!-- liteAccordion is Homepage Only --> 
<script type="text/javascript" src="layout/scripts/liteaccordion-v2.2/js/liteaccordion.jquery.min.js"></script> 
<script type="text/javascript">
$("#featured_slide").liteAccordion({
    theme: "os-tpl",
    containerWidth: 960, // fixed (px)
    containerHeight: 360, // fixed (px) - overall height of the slider
    headerWidth: 48, // fixed (px) - slide spine title
    firstSlide: 1, // displays slide (n) on page load
	activateOn: "click", // click or mouseover
    autoPlay: false, // automatically cycle through slides
    pauseOnHover: true, // pause slides on hover
    rounded: false, // square or rounded corners
    enumerateSlides: true, // put numbers on slides
    slideSpeed: 800, // slide animation speed
    cycleSpeed: 6000, // time between slide cycles
});
</script>
</body>
</html>