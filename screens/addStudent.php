<?php include "include/header.php" ?>


<?php 

    $studentId = "220000" ; 

    for($i = 0 ; $i < 4 ; $i++){
        $studentId = $studentId . rand(0,9) ; 
    }


    if(isset($_POST["submit"])){


        $fName = filter_input(INPUT_POST , "fName" , FILTER_SANITIZE_SPECIAL_CHARS) ;         
        $sName = filter_input(INPUT_POST , "sName" , FILTER_SANITIZE_SPECIAL_CHARS) ;         
        $lName = filter_input(INPUT_POST , "lName" , FILTER_SANITIZE_SPECIAL_CHARS) ;         
        $phoneNumber = filter_input(INPUT_POST , "phoneNumber" , FILTER_SANITIZE_SPECIAL_CHARS) ;  

        $sql = "INSERT INTO Students VALUES( '$studentId' , '$fName' , '$sName' , '$lName' , '$phoneNumber');" ; 

        // INSERT INTO Students VALUES("Id" , "First Name" , "Second Name" , "Last Name" , "Phone Number") ; 
        if(mysqli_query($connection, $sql)){
            echo '<div class="alert alert-success" role="alert">Added Student Successfully</div>' ; 
        }







    }


?>


<div>
    <div class="card login align-items-center w-75 h-50 justify-content-center">

        <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mt-4 w-75" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fName" name="fName" placeholder="Enter Student's First Name">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Second Name</label>
                <input type="text" class="form-control" id="sName" name="sName" placeholder="Enter Student's Second Name">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lName" name="lName" placeholder="Enter Student's Last Name">
            </div>

            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter Student's Phone Number">
            </div>
            <div class="mb-3 justify-content-center">
                <input type="submit" name="submit" value="Add Student" class="btn btn-dark w-100 btn-primary">
            </div>
        </form>


    </div>
</div>



<?php include "include/footer.php" ?>