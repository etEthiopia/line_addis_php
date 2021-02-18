<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.10.3, mobirise.com">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image:src" content="<?php echo URLROOT; ?>/assets/images/index-meta.jpg">
    <meta property="og:image" content="<?php echo URLROOT; ?>/assets/images/index-meta.jpg">
    <meta name="twitter:title" content="LineAddis-Login">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/images/line-addis-logo-122x54.png"
        type="image/x-icon">

    <meta name="description" content="Login to Follow Your Status." />

    <meta name="keyword" content="Poland Scholarship, 
    Consultancy,
    Poland Universities, 
    Visa Application, 
    Line Addis, 
    LineAddis, 
    China Scholarship,
    China Universities, 
    SupEd,
    Suport Education, 
    Ethiopian Scholarship
    " />

    <title>Profile</title>
    <?php require APPROOT . '/views/inc/emp_header.php'; ?>
    <section class="mbr-section content6 cid-snLawv60QW" id="content6-4s">



        <div class="container">
            <div class="media-container-row">
                <div class="col-12 col-md-8">
                    <div class="media-container-row">

                        <div class="media-content">
                            <div class="mbr-section-text">
                                <p class="mbr-text mb-0 mbr-fonts-style display-2">
                                    <strong>
                                        <?php echo $_SESSION['user_name']?>
                                    </strong> <br />
                                <p style="display:inline;" class="mbr-text mb-0 mbr-fonts-style display-7"
                                    id="profile_emp_id">Employee Id: </p>&nbsp;

                                <strong style="color:white;">
                                    <?php echo $_SESSION['user_email']?>
                                </strong> <br />
                                <strong style="color:white;">
                                    <?php echo $data['tasks']?> Tasks Submitted In Total
                                </strong> <br />
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mbr-section form1 cid-slUv0J7UU2" id="form1-40">




        <div class="container">
            <div class="row justify-content-center">
                <div class="title col-12 col-lg-8">
                    <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Edit Password</h2>
                    <h2 style="color: red;" class="mbr-section-title align-center pb-3 mbr-fonts-style display-5">
                        <?php echo ($data['emp_err'])?>
                    </h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="media-container-column col-lg-8" data-form-type="formoid">

                    <form name="subagentsfrom" method="POST" enctype="multipart/form-data"
                        class="mbr-form form-with-styler" action="<?php echo URLROOT; ?>/employees/profile"
                        data-form-title="Mobirise Form"><input type="hidden" name="email" data-form-email="true"
                            value="itqHswTGJnR4vxsbSj9Q00FS4RNWSJ1hJ83/W9MbsIrqg8RuQJ0VZnMmN3/Qk2MiCAg1can/Nc1uCaqESFEzZmNyNwfF/QoC7+lrKHiOIPZYcryWvWw8TFIZTL90/xDz">
                        <div class="row">
                            <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Edit Password
                            </div>
                            <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                            </div>
                        </div>
                        <div class="dragArea row">


                            <div data-for="password" class="col-md-6 passwordfield form-group">
                                <label for="passwordfield"
                                    class="form-control-label mbr-fonts-style display-7">Passwrod</label>

                                <input type="password" name="password" data-password data-required
                                    data-form-field="Password" id="passwordfield" class="form-control display-7">
                                <small class="errorReq"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Password is
                                        requred</p>
                                </small>
                                <small class="errorPass"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Password must be more than 8 Characters</p>
                                </small>

                            </div>

                            <div data-for="cpassword" class="col-md-6 cpasswordfield form-group">
                                <label for="cpasswordfield" class="form-control-label mbr-fonts-style display-7">Confirm
                                    Passwrod</label>

                                <input type="password" name="cpassword" data-cpassword 
                                    data-form-field="Password" id="cpasswordfield" class="form-control display-7">
                                
                                <small class="errorCpass"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Passwords Doesn't Match</p>

                                </small>

                            </div>




                            <div class="col-md-12 input-group-btn align-center">
                                <button type="submit" id="submit" class="btn btn-primary btn-form display-4">
                                    SUBMIT</button>
                            </div>


                            <!-- <div class="col-md-12 input-group-btn align-center"><button type="button" onclick="toTermsandConditions()" id="to_terms_and_conditions"
                        class="btn btn-primary btn-form display-4">NEXT</button></div> -->

                        </div>



                    </form>
                </div>
                <!---Formbuilder Form--->
            </div>
        </div>


    </section>


    <?php require APPROOT . '/views/inc/footer.php'; ?>