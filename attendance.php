    <?php 
    include 'header.php';
    if (isset($_POST['Change'])) {
        $cmpny_id=mysqli_real_escape_string($con,$_GET['id']);
        $rollno=mysqli_real_escape_string($con,$_POST['Change']);
        $query="UPDATE student set attended_status='0' where cmpny_id='".$cmpny_id."' and rollno='".$rollno."'";
        $res=mysqli_query($con,$query);
        if ($res) {
            echo "<script>alert('Successfully Changed');location.href=''</script>";
        }
        else{
            echo "<script>alert('Something went wrong try again')</script>";
        }

    }
    ?>

    <div class="container-fluid">
        <div class="block-header">
            <h2>Presented Student List</h2>
        </div>
        <!-- Widgets -->
        <div class="row clearfix">
            <div class="container-fluid">
                <div class="table table-responsive" style="margin-top:0;">
                    <table class="table-striped  table-hover table-condensed table-bordered" id="example1">
                        <thead class="header" style="color:navy;  background-color:aliceblue;">

                            <tr>
                                <th>S.no </th>
                                <th>Rollno</th>
                                <th>Name</th>
                                <th>College</th>
                                <th>Branch</th>
                                <th>Percentage</th>
                                <th>Company Name</th>
                                <th>Conducted On</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            @$cmpny_id=mysqli_real_escape_string($con,$_GET['id']);
                            if(@$cmpny_id!=""){
                                $result=mysqli_query($con,"SELECT * from student where cmpny_id='".$cmpny_id."' and attended_status='1'  ");
                            }
                            else{
                                $result=mysqli_query($con,"SELECT * from student where attended_status='1' ");
                            }
                            $i=1;
                            $count=mysqli_num_rows($result);
                            for($j=0;$j<$count;$j++){
                                $fetch_List = mysqli_fetch_array($result);
                                $result2=mysqli_query($con,"SELECT * from company_list where id='".$fetch_List['cmpny_id']."' ");
                                $fetch_List2 = mysqli_fetch_array($result2);
                                ?>

                                <tr>
                                    <td><?php echo $i++; ?></td>

                                    <td><a href="update.php?id=<?php echo $fetch_List['id'] ?>" title="Edit"><?php if($fetch_List['rollno']!=''){
                                        echo $fetch_List['rollno'];

                                    }
                                    else{
                                        echo "-";

                                    } ?></a></td>
                                    <td><?php if($fetch_List['name']!=''){
                                        echo $fetch_List['name'];
                                    }
                                    else{
                                        echo "-";

                                    } ?></td>
                                    <td><?php if($fetch_List['college']!=''){
                                        echo $fetch_List['college'];
                                    }
                                    else{
                                        echo "-";

                                    } ?></td>
                                    <td><?php if($fetch_List['branch']!=''){
                                        echo $fetch_List['branch'];
                                    }
                                    else{
                                        echo "-";

                                    } ?></td>
                                    <td><?php if($fetch_List['percentage']!=''){
                                        echo $fetch_List['percentage'];
                                    }
                                    else{
                                        echo "-";

                                    } ?></td>
                                    <td><?php if($fetch_List['cmpny_name']!=''){
                                        echo $fetch_List['cmpny_name'];
                                    }
                                    else{
                                        echo "-";

                                    } ?></td>
                                    <td><?php if($fetch_List2['date']!=''){
                                        echo $fetch_List2['date'];
                                    }
                                    else{
                                        echo "-";

                                    } ?></td>
                                    <td>
                                        <form method="post">
                                            <button class="btn btn-info" name="Change" onclick="return (confirm('Are you sure to change'))" value="<?php echo $fetch_List['rollno'] ?>">Change</button>
                                        </form>
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