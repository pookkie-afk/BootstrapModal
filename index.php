<?php

require 'connectDB.php';

$query = "select * from tablestudent";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BootstrapModal PHPMySQL AJAX</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script></script>

</head>


<body>
    <header></header>
    <section>
        <div class="container" style="width:700px; padding-top: 50px;">
            <h3 align="center">BootstrapModal - PHPMySQL : AJAX</h3>
            <br><br>
            <div align="right">
                <button name="add" id="add" data-toggle="modal" data-target="#addModal" class="btn btn-success">Add</button>
                <button name="reload" id="reload" class="btn btn-dark">Reload</button>

            </div>
            <div class="table-responsive">
                <br>
                <table class="table table-bordered">
                    <tr>
                        <th width="35%">Name</th>
                        <th width="35%">Lastname</th>
                        <th width="10%">View</th>
                        <th width="10%">Edit</th>
                        <th width="10%">Delete</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $row['fname'] ?></td>
                            <td><?php echo $row['lname'] ?></td>
                            <td><input type="button" name="view" value="view" class="btn btn-info btn-xs view-data" id="<?php echo $row['id'] ?>"></td>
                            <td><input type="button" name="edit" value="edit" class="btn btn-warning btn-xs edit_data" id="<?php echo $row['id'] ?>"></td>
                            <td><input type="button" name="delete" value="delete" class="btn btn-danger btn-xs delete_data" id="<?php echo $row['id'] ?>"></td>
                        </tr>

                    <?php } ?>
                </table>
            </div>

        </div>
        <?php require 'viewModal.php' ?>
        <?php require 'insertModal.php' ?>

    </section>


    <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js " integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI " crossorigin="anonymous "></script>

    <!-- <command> -->
    <script>
        $(document).ready(function() {

            $('#reload').on('click', function() {
                location.reload();
            });

            $('#insert-form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: $('#insert-form').serialize(),
                    beforeSend: function() {
                        $('#insert').val("Inserting...");
                    },
                    success: function(data) {
                        $('#insert-form')[0].reset();
                        $('#addModal').modal('hide');
                        // alert("Insert Success !");
                        location.reload();
                    }
                })
            });

            $('.view-data').on("click", function() {
                var user_id = $(this).attr("id");
                $.ajax({
                    url: "select.php",
                    method: "POST",
                    data: {
                        id: user_id
                    },
                    success: function(data) {
                        $('#detail').html(data);
                        $('#dataModal').modal('show');
                    }
                });
            });

            $('.delete_data').click(function() {
                var user_id = $(this).attr("id");
                var status = confirm("Are you sure to delete !");
                if (status) {
                    $.ajax({
                        url: "delete.php",
                        method: "POST",
                        data: {
                            id: user_id
                        },
                        success: function(data) {
                            alert("Delete Success !");
                            location.reload();
                        }
                    });
                }
            });

            $('.edit_data').click(function() {
                var user_id = $(this).attr("id");
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: {
                        id: user_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#id').val(data.id);
                        $('#fname').val(data.fname);
                        $('#lname').val(data.lname);
                        $('#email').val(data.email);
                        $('#web').val(data.web);
                        $('#insert').val("Update");
                        $('#modal-title').val("Edit Detail");
                        $('#addModal').modal('show');
                    }
                })
            });

        });
    </script>
</body>

</html>