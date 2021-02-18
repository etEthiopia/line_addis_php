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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

    <title>Agent</title>
    <?php require APPROOT . '/views/inc/c_header.php'; ?>
    <section class="mbr-section content6 cid-snLawv60QW" id="content6-4s">
        <div class="container">
            <div class="media-container-row">
                <div class="col-12 col-md-12">
                    <div class="media-container-row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class=" media-container-row">
                                <div class="mbr-figure" style="padding-right: 1rem; width: 75%;">
                                    <?php if (empty($data->picture)) :?>
                                    <img src="<?php echo URLROOT; ?>/assets/images/contactgirl-250x307.png"
                                        alt="Profile Picture">
                                    <?php else : ?>
                                    <img src="<?php echo URLROOT; ?>/uploads/agents/<?php echo $data->picture; ?>"
                                        alt="Profile Picture">
                                    <?php endif?>
                                </div>
                            </div>
                        </div>
                        <div class="media-content col-12 col-md-6 col-lg-5">
                            <div class="mbr-section-text">
                                <p class="mbr-text mb-0 mbr-fonts-style display-5">
                                    <strong>
                                        <?php echo $data->name?>
                                    </strong> <br />
                                    <?php echo $data->email?> <br />
                                    <?php echo $data->phone?> <br />
                                    <span class="mbr-text mb-0 mbr-fonts-style display-7">Affiliate Link</span>
                                <p style="display:inline;" class="mbr-text mb-0 mbr-fonts-style display-7"
                                    id="affiliate_profile">https://lineaddis.com/students/register/<?php echo $data->id?>
                                </p>&nbsp;

                                <a onclick="return copyaffiliateFromProfile()"><img style="height: 1rem;"
                                        src="<?php echo URLROOT; ?>/assets/images/copy.png" alt="Copy"></a>
                                <p class="mbr-text mb-0 mbr-fonts-style display-7">Promo Code
                                    <strong id="affiliate_promocode" class="mbr-text mb-0 mbr-fonts-style display-7">
                                        <?php echo $data->promo_code?>
                                    </strong>
                                    &nbsp;
                                    <a onclick="return copyPromoCodeFromProfile()"><img style="height: 1rem;"
                                            src="<?php echo URLROOT; ?>/assets/images/copy_white.png" alt="Copy"></a>
                                </p>
                                </p>
                            </div>
                        </div>
                        <div class="media-content col-12 col-md-6 col-lg-4">
                            <div class="mbr-section-text">
                                <p class="mbr-text mb-0 mbr-fonts-style display-5">

                                    <?php echo $data->processing." Proccessing Students"?> <br />
                                    <?php echo $data->granted." Successful Students"?> <br />


                                <p class="mbr-text mb-0 mbr-fonts-style display-5">
                                    <strong class="mbr-text mb-0 mbr-fonts-style display-5">
                                        <?php echo $data->unpaid." ETB "?>
                                    </strong> UnPaid Money
                                </p>
                                <p class="mbr-text mb-0 mbr-fonts-style display-5">
                                    <strong class="mbr-text mb-0 mbr-fonts-style display-5">
                                        <?php echo $data->totalmoney." ETB "?>
                                    </strong> Total Money Made
                                </p>
                                <span class="mbr-text mb-0 mbr-fonts-style display-7">Bank Account</span>
                                <p style="display:inline;" class="mbr-text mb-0 mbr-fonts-style display-5">
                                    <?php echo $data->bank_account?>
                                </p>
                                <p class="mbr-text mb-0 mbr-fonts-style display-5">
                                    <?php echo $data->bank_name?>
                                </p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="section-table cid-snya0qf97J" id="table1-4l">



        <div class="container container-table">
            <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-5">
                Students</h2>
            <div class="table-wrapper">
                <div class="container">

                </div>

                <div class="container scroll">
                    <table class="table table-striped table-bordered" id="students_table" cellspacing="0"
                        data-empty="No matching records found">
                        <thead>
                            <tr class="table-heads ">
                                <th class="head-item mbr-fonts-style display-7">
                                    NAME</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    RECRUIT TYPE</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    STATUS</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    ADV. COMMISSION</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    FINAL COMMISSION</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    &nbsp;REGISTRY</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($data->students as $student) : ?>
                            <tr>
                                <td class="body-item mbr-fonts-style display-7">
                                <a class="link display-7 normal-link" href="<?php echo URLROOT; ?>/controls/openstudent/<?php echo $student->id ?>">
                                <?php if(strlen($student->name) > 20) : ?>
                                    <?php echo substr($student->name, 0, 20).'...'?>
                                <?php else : ?>
                                    <?php echo $student->name; ?>
                                <?php endif?>
                                </a>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php if($student->recruit_type == 3) : ?>
                                    PromoCode
                                    <?php elseif($student->recruit_type == 2) : ?>
                                    Affiliate
                                    <?php elseif($student->recruit_type == 4) : ?>
                                    Mention
                                    <?php elseif($student->recruit_type == 5) : ?>
                                    Manual
                                    <?php endif?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">

                                    <?php if($student->status == 1) : ?>
                                    Registered
                                    <?php elseif($student->status == 2) : ?>
                                    Proccessing
                                    <?php elseif($student->status == 3) : ?>
                                    Visa Granted
                                    <?php elseif($student->status == 0) : ?>
                                    -
                                    <?php else : ?>
                                    Failed
                                    <?php endif?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php if($student->adv_commission < 0) : ?>
                                    <?php echo abs($student->adv_commission); ?>
                                    UnPaid
                                    <a class="payagent link text-primary display-7" 
                                       target="_blank" href="<?php echo URLROOT; ?>/controls/payagent/<?php echo $student->id ?>/1/<?php echo abs($student->adv_commission); ?>/<?php echo $student->agent; ?>"><strong>Pay</strong></a>
                                    <?php elseif($student->adv_commission > 0) : ?>
                                    <?php echo abs($student->adv_commission); ?>
                                    Paid
                                    <?php else : ?>
                                    -
                                    <?php endif?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php if($student->final_commission < 0) : ?>
                                    <?php echo abs($student->final_commission); ?>
                                    UnPaid
                                    <a class="payagent link text-primary display-7" 
                                       target="_blank" href="<?php echo URLROOT; ?>/controls/payagent/<?php echo $student->id ?>/2/<?php echo abs($student->final_commission); ?>/<?php echo $student->agent; ?>"><strong>Pay</strong></a>
                                    <?php elseif($student->final_commission > 0) : ?>
                                    <?php echo abs($student->final_commission); ?>
                                    Paid
                                    <?php else : ?>
                                    -
                                    <?php endif?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo substr($student->created_at, 0, 10);?>
                                </td>

                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </section>
    
    <section class="mbr-section form1 cid-slUv0J7UU2" id="form1-40">


        <div class="container">
            <div class="row justify-content-center">
                <div class="title col-12 col-lg-8">
                <div class="col-md-12 input-group-btn align-center mbr-section-btn"><a id="reset_password_btn" onclick="return resetpassword();"
                    class="btn btn-md btn-secondary display-4" href="">Reset Password</a>
                    <h2 style="color: red;" class="mbr-section-title align-center pb-3 mbr-fonts-style display-5">
                        <?php echo ($data->agent_err)?>
                    </h2>
                </div>
                </div>
            </div>
        </div>

        
        <div class="container" id="reset_password_container" style="display:none">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                    <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Edit Password</h2>
                    
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="media-container-column col-lg-8" data-form-type="formoid">

                    <form name="subagentsfrom" method="POST" enctype="multipart/form-data"
                        class="mbr-form form-with-styler" action="<?php echo URLROOT; ?>/controls/openagent/<?php echo $data->id ?>"
                        data-form-title="Mobirise Form"><input type="hidden" name="email" data-form-email="true"
                            value="itqHswTGJnR4vxsbSj9Q00FS4RNWSJ1hJ83/W9MbsIrqg8RuQJ0VZnMmN3/Qk2MiCAg1can/Nc1uCaqESFEzZmNyNwfF/QoC7+lrKHiOIPZYcryWvWw8TFIZTL90/xDz">
                        <div class="row">
                            <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Reset Password
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
    <script>
        jQuery(function($) {
        $('.payagent').click(function() {
            return false;
        }).dblclick(function() {
            var r = confirm("Are You Sure?");
            if (r == true) {
                window.location = this.href;
            } else {
              txt = "You pressed Cancel!";
            }
        
        return false;
        });
});
    </script>
    <?php require APPROOT . '/views/inc/c_footer.php'; ?>