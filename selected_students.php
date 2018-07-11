    <?php 
    include 'header.php';
                            
    ?>

    <div class="container-fluid">
        <div class="block-header">
            <h2>Selected Students</h2>
        </div>
        <!-- Widgets -->
        <div class="row clearfix">
            <div class="container-fluid">
                <div class="table table-responsive" style="margin-top:0;">
                    <table class="table-striped  table-hover table-condensed table-bordered" id="example1">
                        <thead class="header" style="color:navy;  background-color:aliceblue;">

                            <tr>
                                <th>company name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result=mysqli_query($con,"SELECT * from company_list ");
                            $i=1;
                            $count=mysqli_num_rows($result);
                            for($j=0;$j<$count;$j++){
                                $fetch_List = mysqli_fetch_array($result);
                                ?>

                                    <td><a href="student_info.php?id=<?php echo $fetch_List['id'] ?>" title="Edit"><?php if($fetch_List['name']!=''){
                                        echo $fetch_List['name'];
                                    }
                                    else{
                                        echo "-";

                                    } ?></td>

                                    <td>
                                        <a href="upload.php?id=<?php echo $fetch_List['id'] ?>" title="Edit"><i class="fa fa-edit"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></a>
                                        <a href="delete.php?id=<?php echo $fetch_List['id'] ?>" title="Delete"> <i class="fa fa-trash"></i></a>
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

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

