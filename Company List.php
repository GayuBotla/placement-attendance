    <?php 
    include 'header.php';
                            
    ?>

    <div class="container-fluid">
        <div class="block-header">
            <h2>Company List</h2>
        </div>
        <!-- Widgets -->
        <div class="row clearfix">
            <div class="container-fluid">
                <div class="table table-responsive" style="margin-top:0;">
                    <table class="table-striped  table-hover table-condensed table-bordered" id="example1">
                        <thead class="header" style="color:navy;  background-color:aliceblue;">

                            <tr>
                                <th>id</th>
                                <th>Company_Name</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result=mysqli_query($con,"SELECT * from Company_list ");
                            $i=1;
                            $count=mysqli_num_rows($result);
                            for($j=0;$j<$count;$j++){
                                $fetch_List = mysqli_fetch_array($result);
                                ?>

                                <tr>
                                    <td><?php echo $i++; ?></td>

                                    <td><a href="update.php?id=<?php echo $fetch_List['id'] ?>" title="Edit"><?php if($fetch_List['name']!=''){
                                        echo $fetch_List['name'];

                                    }
                                    else{
                                        echo "-";

                                    } ?></a></td>
                                    <td><?php if($fetch_List['date']!=''){
                                        echo $fetch_List['date'];
                                    }
                                    else{
                                        echo "-";

                                    } ?></td>
                                    


                                    <td>
                                        <a href="gform.php?id=<?php echo $fetch_List['id'] ?>" title="Edit"><i class="fa fa-edit"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></a>
                                        <a href="delete.php?id=<?php echo $fetch_List['id']  ?>" title="Delete"> <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php

                            }

                            ?>
                        </tbody>

                    </table>
            </div>   
        </div>
    </div>        
        </div>
    <?php include 'footer.html'; ?>
    

<script>
    $(document).ready(function() {
        $('#example1').DataTable( {
            dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>


<!--   -->

