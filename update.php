<?php
    include 'connect.php';
    $id=$_GET['id'];
    $qry="select * from register where id=$id";
    $res=mysqli_query($con,$qry);
    $row=mysqli_fetch_assoc($res);

    if(isset($_POST['submit'])){
        $uname=$_POST['uname'];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $mobile=$_POST["mobile"];
        if($_FILES['pimg']['name']){
            $filename=$_FILES['pimg']['name'];
            $tempname=$_FILES['pimg']['tmp_name'];
            $folder='images/'.$filename;
            move_uploaded_file($tempname,$folder);
            $sql="update register set name='$uname',email='$email',password='$password',mobile='$mobile',image='$folder' where id=$id";
        }else{
            $sql="update register set name='$uname',email='$email',password='$password',mobile='$mobile' where id=$id";
        }

        $data=mysqli_query($con,$sql);
        if($data){
            header('location:display.php');
        }
    }
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" >

    <title>Update</title>
  </head>
  <body>
    <form method="post"  enctype="multipart/form-data">
        <div class="container">
            <h4 class="text-primary text-center my-3">Update</h4>

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" value="<?php echo $row['name']?>" name="uname" placeholder="Enter Name"  autocomplete="off">
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" value="<?php echo $row['email']?>" name="email" placeholder="Enter Email" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="">Mobile Number</label>
                <input type="text" class="form-control" value="<?php echo $row['mobile']?>" name="mobile" placeholder="Enter Mobile Number" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control"  name="password" value="<?php echo $row['password']?>"  placeholder="Enter Password" autocomplete="off">
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Profile Image</label>
                        <input type="file" class="form-control"  name="pimg"  placeholder="Choose Image"  >
                    </div>
                </div>
                <div class="col-6">
                    <img src="<?php echo $row['image'];?>" id="imgPreview" style="width:80px; height:80px;">
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </div>
    </form>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
    <script>
            $(document).ready(() => {
                $('[name="pimg"]').change(function () {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $("#imgPreview")
                              .attr("src", event.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            });
        </script>

</body>
</html>