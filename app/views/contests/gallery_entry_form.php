<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.10.3, mobirise.com">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image:src" content="<?php echo URLROOT; ?>/assets/images/index-meta.jpg">
    <meta property="og:image" content="<?php echo URLROOT; ?>/assets/images/index-meta.jpg">
    <meta name="twitter:title" content="LineAddis-Home">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/images/line-addis-logo-122x54.png"
        type="image/x-icon">
    <!-- <link href="http://fonts.cdnfonts.com/css/adobe-garamond-pro-2" rel="stylesheet"> -->


    <meta name="description" content="We are Punctual, 
    Fair service charges, 
    Long term experience, 
    We are Authorized and accredited, 
    " />

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

    <title>Line Addis - Contest</title>
    <?php require APPROOT . '/views/inc/contest_header.php'; ?>

    <section class="header1 cid-slUtLZoXqz mbr-parallax-background" id="header1-3z">



        <div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(51, 51, 51);">
        </div>

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="mbr-white col-md-10">
                    <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-2">
                        Photo &amp; Video Contest</h1>



                </div>
            </div>
        </div>

    </section>



    <section class="mbr-section form1 cid-stNs9SRgfF" id="form1-66">




        <div class="container">
            <div class="row justify-content-center">
                <div class="title col-12 col-lg-8">
                    <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                        Starter Information</h2>
                    <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Enter Your
                        Basic Information to Start.</h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="media-container-column col-lg-10" data-form-type="formoid">
                    <!---Formbuilder Form--->
                    <form action="<?php echo URLROOT; ?>/contests/galleryentryform" method="POST"
                        class="mbr-form form-with-styler" data-form-title="Mobirise Form" enctype="multipart/form-data">
                        <div class="dragArea row">
                            <div class="col-md-6  form-group" data-for="name">
                                <label for="name-form1-66" class="form-control-label mbr-fonts-style display-7">Team
                                    Name *</label>
                                <input type="text" name="name" data-form-field="Name" required="required"
                                    class="form-control display-7" value="<?php echo $data['name']; ?>" required
                                    id="name-form1-66">
                                <!-- <p style="color: red; font-size: large;">
                                <?php echo ($data['team_name_err'])?>
                            </p>     -->
                                <small class="errorReq"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Team Name is
                                        required</p>
                                </small>
                            </div>
                            <div data-for="phone" class="col-md-6 form-group">
                                <label for="phonefield" class="form-control-label mbr-fonts-style display-7">Phone
                                    *</label>

                                <input type="tel" name="phone" data-form-field="Phone"
                                    value="<?php echo $data['phone']; ?>" required id="phonefield" data-phonenum
                                    data-required maxlength="14" class="form-control display-7">
                                <p style="color: red; font-size: large;">
                                    <?php echo ($data['phone_err'])?>
                                </p>
                                <small class="errorReq"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Phone is required</p>

                                </small>
                            </div>
                            <div data-for="members" class="col-md-12 form-group">
                                <label for="members-form1-4w" class="form-control-label mbr-fonts-style display-7">Team
                                    Members Name * (At Least 3 Members Are Required, Both Genders Must Be Included)
                                </label>
                                <input type="text" name="members" data-form-field="Member"
                                    value="<?php echo $data['members']; ?>" required id="membersfield" data-required
                                    minlength="10" aria-multiline="true" class="form-control display-7">

                                <small class="errorReq"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Members is
                                        required</p>
                                </small>
                                <small class="errorMembers"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Members
                                        is not valid</p>
                                </small>
                            </div>
                            <div class="col-md-6  form-group" data-for="email">
                                <label for="email-form1-66" class="form-control-label mbr-fonts-style display-7">Email
                                    *</label>
                                <input type="email" name="email" data-form-field="Email" required="required"
                                    class="form-control display-7" id="email-form1-66"
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
                            <div data-for="city" class="col-md-6  form-group">
                                <label for="city-form1-66" class="form-control-label mbr-fonts-style display-7">Living
                                    City *</label>
                                <input type="text" name="city" data-form-field="City" required
                                    class="form-control display-7" id="city-form1-66"
                                    value="<?php echo $data['city']; ?>">
                                <small class="errorReq"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">City is
                                        required</p>
                                </small>
                            </div>
                            <div class="col-md-6  form-group" data-for="university">
                                <label for="university-form1-66"
                                    class="form-control-label mbr-fonts-style display-7">University *</label>
                                <input type="text" name="university" data-form-field="University" required="required"
                                    class="form-control display-7" id="university-form1-66"
                                    value="<?php echo $data['university']; ?>">
                                <small class="errorReq"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">University is
                                        required</p>
                                </small>
                            </div>
                            <div class="col-md-6 form-group filesfield" data-for="files[]">
                                <label for="filesfield" class="form-control-label mbr-fonts-style display-7">
                                    Group Picture or Individual Members' Picture, Max(10MB) *</label>
                                <input type="file" name="files[]" id="filesfield" required multiple=""
                                    data-form-field="Docs" data-files class="form-control display-7">
                                <p style="color: red; font-size: large;">
                                    <?php echo ($data['files_err'])?>
                                </p>
                                <small class="errorDocs"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Files are
                                        not valid</p>
                                </small>
                            </div>

                            <div class="col-sm-3 col-md-1 col-lg-1 form-group agreefield" data-for="agree">
                                <input type="checkbox" name="agree" style="min-height: 1rem;" id="agreefield" required
                                    data-form-field="agree" data-files class="form-control display-7">

                            </div>
                            <div class="col-sm-9 col-md-11 col-lg-11 form-group agreefield" data-for="agree">
                                <label for="agreefield" class="form-control-label mbr-fonts-style display-7">
                                    Line Addis has every right to use the winning teams pictures on its promotional
                                    materials. The team members can not share the pictures/ videos to third party
                                    without LIne Addis consultancy consent. *</label>
                            </div>


                            <div class="col-md-12 input-group-btn align-center"><button type="submit"
                                    class="btn btn-primary btn-form display-4">SUBMIT</button></div>
                        </div>
                    </form>
                    <!---Formbuilder Form--->
                </div>
            </div>
        </div>
    </section>


    <section class="cid-rsK3TOodTO" id="social-buttons3-e">
        <div class="container">
            <div class="media-container-row">
                <div class="col-md-10 align-center">
                    <h2 class="pb-3 mbr-section-title mbr-fonts-style display-2">
                        Our Socials
                    </h2>
                    <div>
                        <ul id="socials">
                            <li>
                                <div class="telegram">
                                    <a href="https://t.me/lineaddisconsultancy" target="_blank">
                                        <i class="socicon socicon-telegram" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <span>Telegram</span>
                            </li>
                            <li>
                                <div class="facebook">
                                    <a href="https://www.facebook.com/lineaddisconsultancy/" target="_blank">
                                        <i class="socicon socicon-facebook" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <span>Facebook</span>
                            </li>
                            <li>
                                <div class="instagram">
                                    <a href="https://www.instagram.com/lineaddisconsultancy/" target="_blank">
                                        <i class="socicon socicon-instagram" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <span>Instagram</span>
                            </li>
                            <li>
                                <div class="email">
                                    <a href="mailto:hello@lineaddis.com">
                                        <i class="socicon socicon-mail" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <span>Email</span>
                            </li>
                            <li>
                                <div class="linkedin">
                                    <a href="https://www.linkedin.com/company/line-addis/" target="_blank">
                                        <i class="socicon socicon-linkedin" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <span>LinkedIn</span>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require APPROOT . '/views/inc/footer.php'; ?>