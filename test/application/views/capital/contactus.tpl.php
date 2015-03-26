<div class="body-content-sec">
    <div class="inner-conbg">
        <div class="inner-con">
            <h2>Need to get in <span>touch?</span></h2>
            <div class="inner-con-scoll" style="overflow: auto;">

                <div class="content-left">
                    <p>You can reach our staff by calling (702) 252-6966 or by filling out the form.<br><br> If you're looking to book one of the escorts that are listed on this site please browse to the escorts profile page and call her number located on the bottom of the page or press the vCard icon which will display her email address, phone number and a downloadable vCard!</p><br>
                    <p><b>The fields marked with <span class="red-text">*</span> must be filled</b></p>
                    <?php                
                        echo validation_errors(""); 
                    ?>
                    <?php
                        echo show_msg();
                    ?>
                    <form id="contact" name="contatct" method="post" action="">
                        <div class="form-div">
                            <label>Name: <span class="red-text">*</span></label>
                            <input type="text" value="" class="textbox" id="name" name="name">
                        </div>
                        <div class="form-div">
                            <label>Email ID: <span class="red-text">*</span></label>
                            <input type="text" value="" class="textbox" id="email" name="email">
                        </div>
                        <div class="form-div">
                            <label>Phone No.: <span class="red-text">*</span></label>
                            <input type="text" value="" class="textbox" id="phone" name="phone">
                        </div>
                        <div class="form-div">
                            <label>Comments:</label>
                            <textarea class="textarea1" id="Comments" cols="" title="Comments" rows="3" name="Comments"></textarea>
                        </div>

                        <div class="form-div">
                            <label>&nbsp;</label>
                            <input type="submit" title="Submit" class="submit_button" value="Submit">

                            <input type="reset" value="Reset" class="submit_button" title="Reset">
                        </div>
                    </form> 

                </div>
                <!--<div class="content-right">
                <p><b>The fields marked with <span class="red-text">*</span> must be filled</b></p>
                <div class="form-div">
                <label>Name: <span class="red-text">*</span></label>
                <input name="fname" id="fname" class="textbox" value="" type="text" />
                </div>
                <div class="form-div">
                <label>Email ID: <span class="red-text">*</span></label>
                <input name="email" id="email" class="textbox" value="" type="text" />
                </div>
                <div class="form-div">
                <label>Phone No.: <span class="red-text">*</span></label>
                <input name="phone" id="phone" class="textbox" value="" type="text" />
                </div>
                <div class="form-div">
                <label>Comments:</label>
                <textarea name="Comments" rows="3"  title="Comments" cols="" id="Comments" class="textarea1"></textarea>
                </div>

                <div class="form-div">
                <label>&nbsp;</label>
                <input type="submit" value="Submit" class="submit_button"  title="Submit" />

                <input type="reset" title="Reset" class="submit_button" value="Reset" />
                </div>


                </div> -->
            </div>
        </div>
    </div>
</div>        