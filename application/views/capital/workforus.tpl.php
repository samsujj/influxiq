<div class="body-content-sec">
    <div class="inner-conbg">
        <div class="inner-con">
            <h2>We're Always looking for  <span>great workers!</span></h2>
            <div class="inner-con-scoll" style="overflow: auto;">
                <p>We're always looking for great, talented workers to fill out positions. We're currently hiring phone girls and escorts both Male and Female. If you're interested in a career with the Las Vegas Escorts Agency please call us at (702) 252-6966 or via our form below.<br><br>
                    Material Girlz Escorts<br>3165 Industrial Rd. Ste 215<br>Material Girlz, MG, 89109<br>(702) 252-6966</p><br>
                <p><b>The fields marked with <span class="red-text">*</span> must be filled</b></p>
                <?php                
                    echo validation_errors(""); 
                ?>
                <?php
                    echo show_msg();
                ?>
                <form id='work' name="work" action="" method="post" enctype="multipart/form-data">
                    <div class="content-left">
                        <div class="form-div">
                            <p>Which position are you applying for?<span class="red-text">*</span></p>

                            <select class="combo" title="position" name="position" size="1">
                                <option value="Escort">Escort</option>
                                <option value="Escort">Phone Girl</option>
                                <option value="Escort">Driver</option>
                                <option value="Escort">Other</option>
                            </select>
                        </div>
                        <div class="form-div">

                            <p>Are you willing to relocate? </p>
                            <input type="radio" value="1" name="relocate"> Yes &nbsp;&nbsp;<input type="radio" value="0" name="relocate"> &nbsp;No 
                        </div>
                        <div class="form-div">
                            <p>When can you start? <span class="red-text">*</span></p>
                            <!-- <input type="text" value="" class="textbox" id="date" name="date"> -->
                            <input class="input-small flexy_datepicker_input" type="text" value="__ / __ / ____" name="flexy_datepicker" id="date1" />
                        </div>
                        <div class="form-div">
                            <p>Attach a Copy of Your Resume </p>
                            <input type="file" id="post_resume" name="post_resume">
                        </div>

                    </div>
                    <div class="content-right">
                        <p><b>Your Contact Information</b></p>
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


                    </div>
                </form>
            </div>

        </div>
    </div>
</div>        