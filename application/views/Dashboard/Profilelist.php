<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<table border="2" align="center">
      <tr>
         <th>First Name</th>
         <th>Last Name</th>
         <th>Email Address</th>
         <th>Action</th>
        
      </tr>
      <?php
                                $i=1;
                                if($adminData){                             
                                foreach($adminData as $admin)
                                {
                            ?>
                            <tr>
                            
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $admin->FirstName; ?></td>
                                    <td><?php echo $admin->LastName; ?></td>
                                    <td><?php echo $admin->EmailAddress; ?></td>
                                 
                                    <td>
                                        <?php echo anchor('Dashboard/Profileedit/'.$admin->UserId,'<i class="ficon icon-pencil2"></i>'); ?>
                                       
                                    </td>  
                                </tr>      
                                <?php
                                $i++;
                                    } }
                                ?>


</table>