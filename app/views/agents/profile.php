<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.10.3, mobirise.com">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image:src" content="<?php echo URLROOT; ?>/assets/images/index-meta.jpg">
    <meta property="og:image" content="<?php echo URLROOT; ?>/assets/images/index-meta.jpg">
    <meta name="twitter:title" content="LineAddis-Sub Agents">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/images/line-addis-logo-122x54.png"
        type="image/x-icon">

    <meta name="description" content="Follow Up Your Status" />

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

    <title>Line Addis - Dashboard</title>
    <?php require APPROOT . '/views/inc/agent_header.php'; ?>



    <section class="mbr-section content6 cid-snLawv60QW" id="content6-4s">



        <div class="container">
            <div class="media-container-row">
                <div class="col-12 col-md-8">
                    <div class="media-container-row">
                        <div class="mbr-figure" style="width: 75%;">
                            <?php if (empty($data['profile']->picture)) :?>
                            <img src="<?php echo URLROOT; ?>/assets/images/contactgirl-250x307.png"
                                alt="Profile Picture">
                            <?php else : ?>
                            <img src="<?php echo URLROOT; ?>/uploads/agents/<?php echo $data['profile']->picture; ?>"
                                alt="Profile Picture">
                            <?php endif?>
                        </div>
                        <div class="media-content">
                            <div class="mbr-section-text">
                                <p class="mbr-text mb-0 mbr-fonts-style display-5">
                                    <strong>
                                        <?php echo $data['profile']->name?>
                                    </strong> <br />
                                    <?php echo $data['profile']->email?> <br />
                                    <?php echo $data['profile']->phone?> <br />
                                    <span class="mbr-text mb-0 mbr-fonts-style display-7">Affiliate Link</span>
                                <p style="display:inline;" class="mbr-text mb-0 mbr-fonts-style display-7" id="affiliate_profile">https://lineaddis.com/students/register/<?php echo $data['profile']->id?></p>&nbsp;
                                
                                <a onclick="return copyaffiliateFromProfile()"><img style="height: 1rem;" src="<?php echo URLROOT; ?>/assets/images/copy.png"
                                    alt="Copy"></a>
                                <p class="mbr-text mb-0 mbr-fonts-style display-7">Promo Code
                                    <strong id="affiliate_promocode" class="mbr-text mb-0 mbr-fonts-style display-7">
                                        <?php echo $data['profile']->promo_code?>
                                    </strong>
                                    &nbsp;
                                    <a onclick="return copyPromoCodeFromProfile()"><img style="height: 1rem;" src="<?php echo URLROOT; ?>/assets/images/copy_white.png"
                                    alt="Copy"></a>
                                </p>
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
                    <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Edit Profile</h2>
                    <h2 style="color: red;" class="mbr-section-title align-center pb-3 mbr-fonts-style display-5">
                        <?php echo ($data['student_err'])?>
                    </h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="media-container-column col-lg-8" data-form-type="formoid">

                    <form name="subagentsfrom" method="POST" enctype="multipart/form-data"
                        class="mbr-form form-with-styler" action="<?php echo URLROOT; ?>/agents/profile"
                        data-form-title="Mobirise Form"><input type="hidden" name="email" data-form-email="true"
                            value="itqHswTGJnR4vxsbSj9Q00FS4RNWSJ1hJ83/W9MbsIrqg8RuQJ0VZnMmN3/Qk2MiCAg1can/Nc1uCaqESFEzZmNyNwfF/QoC7+lrKHiOIPZYcryWvWw8TFIZTL90/xDz">
                        <div class="row">
                            <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Edit Profile
                            </div>
                            <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                            </div>
                        </div>
                        <div class="dragArea row">
                            <div class="col-md-6 form-group namefield" data-for="name">
                                <label for="namefield" class="form-control-label mbr-fonts-style display-7">Full
                                    Name</label>
                                <input type="text" name="name" id="namefield" data-form-field="Name" data-name
                                    data-required class="form-control display-7" value="<?php echo ($data['name']); ?>">
                                <small class="errorReq"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Name is
                                        requred</p>
                                </small>
                                <small class="errorName"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Name is
                                        not valid</p>
                                </small>
                            </div>
                            <div class="col-md-6 form-group emailfield" data-for="email">
                                <label for="emailfield"
                                    class="form-control-label mbr-fonts-style display-7">Email</label>
                                <input type="email" name="email" data-form-field="Email" data-email data-required
                                    class="form-control display-7" id="emailfield"
                                    value="<?php echo $data['email']; ?>">
                                <p style="color: red; font-size: large;">
                                    <?php echo ($data['email_err'])?>
                                </p>

                                <small class="errorReq"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Email is
                                        required</p>

                                </small>
                                <small class="errorEmail"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Email
                                        is not valid</p>

                                </small>
                            </div>
                            <div data-for="phone" class="col-md-6 phonefield form-group">
                                <label for="phonefield"
                                    class="form-control-label mbr-fonts-style display-7">Phone</label>

                                <input type="tel" name="phone" data-form-field="Phone" id="phonefield" data-number
                                    data-required maxlength="10" class="form-control display-7"
                                    value="<?php echo $data['phone']; ?>">
                                <p style="color: red; font-size: large;">
                                    <?php echo ($data['phone_err'])?>
                                </p>
                                <small class="errorReq"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Phone is required</p>

                                </small>
                                <small class="errorNum"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Phone is
                                        not valid, Use the '09xxxxxxxx' format</p>
                                </small>

                            </div>

                            <div class="col-md-6 form-group picturefield" data-for="picture[]">
                                <label for="picturefield" class="form-control-label mbr-fonts-style display-7">Profile
                                    Picture, Size Must Be Less Than 1MB</label>
                                <input type="file" name="picture" id="picturefield" data-form-field="Docs" data-picture
                                    class="form-control display-7">
                                <p style="color: red; font-size: large;">
                                    <?php echo ($data['picture_err'])?>
                                </p>
                                <small class="errorDocs"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Documents are
                                        not valid</p>
                                </small>
                            </div>

                            <div data-for="password" class="col-md-6 passwordfield form-group">
                                <label for="passwordfield"
                                    class="form-control-label mbr-fonts-style display-7">Passwrod</label>

                                <input type="password" name="password" data-password data-form-field="Password"
                                    id="passwordfield" class="form-control display-7">
                                <small class="errorPass"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Password must be more than 8 Characters</p>
                                </small>

                            </div>

                            <div data-for="cpassword" class="col-md-6 cpasswordfield form-group">
                                <label for="cpasswordfield" class="form-control-label mbr-fonts-style display-7">Confirm
                                    Passwrod</label>

                                <input type="password" name="cpassword" data-cpassword data-form-field="Password"
                                    id="cpasswordfield" class="form-control display-7">
                                <small class="errorCpass"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Passwords Doesn't Match</p>

                                </small>

                            </div>



                            <div class="title col-md-6 align-left">

                                <h3 class="mbr-text pb-3 mbr-fonts-style display-4">
                                    Current Bank: <strong style="color:#767676;">
                                        <?php echo $data['profile']->bank_name;?>
                                    </strong>
                                </h3>
                            </div>

                            <div class="title col-md-6 align-right">

                                <h3 class="mbr-text pb-3 mbr-fonts-style display-4">
                                    <a style="color: #d99a3c !important;" id="editBankBtn"
                                        onclick="return toBankInformation();">
                                        Edit Bank Information</a>
                                </h3>
                            </div>
                            <div id="changebanks" style="display:none;">
                                <div style="margin-bottom: 0px; padding-bottom: 0px;" class="title col-12 col-lg-12">
                                    <h3
                                        class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                                        Bank Details
                                    </h3>
                                </div>

                                <div data-for="bankname" class="col-md-12 banknamefield form-group">
                                    <div class="dragArea row banks-radio-row justify-content-center">
                                        <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                            <label class="bank_radio">
                                                <input type="radio" id="cbe" onclick="handleOtherBank(this);"
                                                    name="bankname" value="Commercial Bank of Ethiopia" checked>
                                                <img src="<?php echo URLROOT; ?>/assets/images/banks/cbe.jpg" />
                                                <label>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                            <label class="bank_radio">
                                                <input type="radio" id="dashen" onclick="handleOtherBank(this);"
                                                    name="bankname" value="Dashen Bank">
                                                <img src="<?php echo URLROOT; ?>/assets/images/banks/dashen.jpg" />
                                                <label>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                            <label class="bank_radio">
                                                <input type="radio" id="awash" onclick="handleOtherBank(this);"
                                                    name="bankname" value="Awash Bank">
                                                <img src="<?php echo URLROOT; ?>/assets/images/banks/awash.jpg" />
                                                <label>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                            <label class="bank_radio">
                                                <input type="radio" id="oromia" onclick="handleOtherBank(this);"
                                                    name="bankname" value="Oromia International Bank">
                                                <img src="<?php echo URLROOT; ?>/assets/images/banks/oromia.jpg" />
                                                <label>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                            <label class="bank_radio">
                                                <input type="radio" id="nib" onclick="handleOtherBank(this);"
                                                    name="bankname" value="Nib International Bank">
                                                <img src="<?php echo URLROOT; ?>/assets/images/banks/nib.jpg" />
                                                <label>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                            <label class="bank_radio">
                                                <input type="radio" id="zemen" onclick="handleOtherBank(this);"
                                                    name="bankname" value="Zemen Bank">
                                                <img src="<?php echo URLROOT; ?>/assets/images/banks/zemen.jpg" />
                                                <label>
                                                    <label>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                            <label class="bank_radio">
                                                <input type="radio" id="united" onclick="handleOtherBank(this);"
                                                    name="bankname" value="United Bank">
                                                <img src="<?php echo URLROOT; ?>/assets/images/banks/united.jpg" />
                                                <label>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                            <label class="bank_radio">
                                                <input type="radio" id="abyssinia" onclick="handleOtherBank(this);"
                                                    name="bankname" value="Abyssinia Bank">
                                                <img src="<?php echo URLROOT; ?>/assets/images/banks/abyssinia.jpg" />
                                                <label>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                            <label class="bank_radio">
                                                <input type="radio" id="lion" onclick="handleOtherBank(this);"
                                                    name="bankname" value="Lion Bank">
                                                <img src="<?php echo URLROOT; ?>/assets/images/banks/lion.jpg" />
                                                <label>
                                                    <label>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                            <label class="bank_radio">
                                                <input type="radio" id="debubglobal" onclick="handleOtherBank(this);"
                                                    name="bankname" value="Debub Global Bank">
                                                <img src="<?php echo URLROOT; ?>/assets/images/banks/debubglobal.jpg" />
                                                <label>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                            <label class="bank_radio">
                                                <input type="radio" id="abay" onclick="handleOtherBank(this);"
                                                    name="bankname" value="Abay Bank">
                                                <img src="<?php echo URLROOT; ?>/assets/images/banks/abay.jpg" />
                                                <label>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                            <label class="bank_radio">
                                                <input type="radio" id="other" onclick="handleOtherBank(this);"
                                                    name="bankname" value="Other Bank">
                                                <img src="<?php echo URLROOT; ?>/assets/images/banks/other.jpg" />
                                                <label>
                                        </div>
                                    </div>







                                </div>

                                <div class="col-md-12 form-group otherbankfield" data-for="otherbank"
                                    id="otherbanksection" style="display:none">
                                    <label for="otherbankfield"
                                        class="form-control-label mbr-fonts-style display-7">Please
                                        Provide the Name of the Bank</label>
                                    <input type="name" name="otherbank" maxlength="15" id="otherbankfield"
                                        data-form-field="OtherBank" data-otherbank class="form-control display-7">
                                </div>

                                <div data-for="bankaccount" class="col-md-12 bankaccountfield form-group">
                                    <label for="bankaccountfield"
                                        class="form-control-label mbr-fonts-style display-7">Account Number</label>

                                    <input type="text" name="bankaccount" data-form-field="AccountField"
                                        id="bankaccountfield" data-number data-required maxlength="15"
                                        class="form-control display-7" value="<?php echo $data['bank_account']?>">
                                    <small class="errorReq"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                        <p style="color: red; font-size: large;">Bank Account Number is required</p>

                                    </small>

                                </div>

                            </div>
                            <div class="col-md-12 input-group-btn align-center">
                                <button type="submit" id="submit" class="btn btn-primary btn-form display-4">
                                    SUBMIT</button>
                            </div>


                            <!-- <div class="col-md-12 input-group-btn align-center"><button type="button" onclick="toTermsandConditions()" id="to_terms_and_conditions"
                        class="btn btn-primary btn-form display-4">NEXT</button></div> -->

                        </div>


                </div>
                </form>
                <!---Formbuilder Form--->
            </div>
        </div>
        </div>
        <script>
            function toBankInformation() {
                document.getElementById('changebanks').style.display = 'block';
                return false;
            }
            
            function copyaffiliateFromProfile(){
                var copyText = document.getElementById('affiliate_profile');
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val($(copyText).text()).select();
                document.execCommand("copy");
                $temp.remove();
                return false;
            }

            function copyPromoCodeFromProfile(){
                var copyText = document.getElementById('affiliate_promocode');
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val($(copyText).text()).select();
                document.execCommand("copy");
                $temp.remove();
                return false;
            }
        </script>
    </section>

    <?php require APPROOT . '/views/inc/footer.php'; ?>