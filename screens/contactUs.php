<?php include "include/header.php" ?>

<?php
    
    $senderEmail = $sendMessage = "" ; 

    if(isset($_POST["submit"])){

        $senderEmail = filter_input(INPUT_POST , "email" , FILTER_SANITIZE_EMAIL);
        $sendMessage = filter_input(INPUT_POST , "message" , FILTER_SANITIZE_SPECIAL_CHARS) ;         

        $sql = "INSERT INTO Messages(email , body) VALUES ('$senderEmail' , '$sendMessage') ; " ; 

        if(mysqli_query($connection, $sql)){
            echo '<div class="alert alert-success" role="alert">Your Message Has Been Sent Successfully</div>' ; 
        }

    }
    
?>


<body class = "bg-light" >
    


    <section class=" bg-light contactUs" >
        <h1>Contact Us</h1>
        <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="p-5" method="POST" >

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="By Who ? ">
            </div>

            <div class="mb-3">
                <label for="pass" class="form-label">Message</label>
                <textarea name="message" id="message" cols="30" rows="10" class = "form-control"  placeholder="Enter Your Message"></textarea>
            </div>

            <div class="mb-3 justify-content-center">
                <input type="submit" name="submit" value="Send" class="btn btn-dark text-light w-100 btn-primary">
            </div>
        </form>
    </section>



<?php include "include/footer.php" ?>
