<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.10.3, mobirise.com">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image:src" content="<?php echo URLROOT; ?>/assets/images/index-meta.jpg">
    <meta property="og:image" content="<?php echo URLROOT; ?>/assets/images/index-meta.jpg">
    <meta name="twitter:title" content="LineAddis-Register">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/images/line-addis-logo-122x54.png"
        type="image/x-icon">

    <meta name="description"
        content="Start Your Process Today And Follow Up Your Status At Home Through Your Profile." />

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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <title>Add Student</title>
    <?php require APPROOT . '/views/inc/c_header.php'; ?>
    <section class="header1 cid-slUtLZoXqc mbr-parallax-background" id="header1-3z">



        <div class="mbr-overlay" style="opacity: 1.0; background-color: rgb(84, 104, 43);">
        </div>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="mbr-white col-md-10">
                    <h3 class="mbr-section-subtitle align-center mbr-bold pb-3 mbr-fonts-style display-2"><span
                            style="font-weight: normal;">Add Student</span></h3>
                </div>
            </div>
        </div>

    </section>

    <section class="mbr-section form1 cid-slUv0J7UU2" id="form1-40">
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="media-container-column col-lg-12" data-form-type="formoid">
                    
                    <form name="usersregistration" method="POST" enctype="multipart/form-data"
                        class="mbr-form" action="<?php echo URLROOT; ?>/controls/addStudent" data-form-title="Mobirise Form"><input type="hidden"
                            name="email" data-form-email="true"
                            value="itqHswTGJnR4vxsbSj9Q00FS4RNWSJ1hJ83/W9MbsIrqg8RuQJ0VZnMmN3/Qk2MiCAg1can/Nc1uCaqESFEzZmNyNwfF/QoC7+lrKHiOIPZYcryWvWw8TFIZTL90/xDz">
                        <div class="row">
                            <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for
                                filling out the form!</div>
                            <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                            </div>
                        </div>
                        <input style="display:none;" type="text" name="affiliate" id="affiliatefield" data-form-field="Affiliate" data-affiliate
                                   class="form-control display-7" value="<?php echo ($data['affiliate'])?>">
                        <div class="dragArea row">
                            <div class="col-md-4 form-group namefield" data-for="name">
                                <label for="namefield" class="form-control-label mbr-fonts-style display-7">Full Name</label>
                                <input type="text" name="name" id="namefield" data-form-field="Name" data-name
                                    data-required class="form-control display-7" value="<?php echo ($data['name'])?>">
                                <small class="errorReq"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Name is
                                        required</p>
                                </small>
                                <small class="errorName"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Name is
                                        not valid</p>
                                </small>
                            </div>
                            <div class="col-md-4 form-group emailfield" data-for="email">
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
                            <div data-for="phone" class="col-md-4 phonefield form-group">
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
                            <div class="col-md-6 form-group reasonfield" data-for="reason">
                                <label for="reasonfield"
                                    class="form-control-label mbr-fonts-style display-7">Application Reason. (Example:
                                    Bachelor in Accounting )</label>
                                <input type="text" name="reason" id="reasonfield" data-form-field="Name" data-reason 
                                data-required
                                    class="form-control display-7" value="<?php echo ($data['reason'])?>">
                                <small class="errorReq"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Reason is
                                        requred</p>
                                </small>
                                <small class="errorReason"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Reason is
                                        not valid</p>
                                </small>
                            </div>
                            <div class="col-md-6 form-group countriesfield" data-for="countries">
                                <label for="countriesfield"
                                    class="form-control-label mbr-fonts-style display-7">Countries Interesed In.
                                    (Example: Poland, Turkey, Hungary)</label>
                                <input type="text" name="countries" id="countriesfield" data-form-field="Name"
                                    data-countries data-required class="form-control display-7"
                                    value="<?php echo ($data['countries'])?>">
                                <small class="errorReq"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Country is Required</p>
                                </small>
                                <small class="errorCountries"><i class="formerror fa fa-asterisk"
                                        aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Country is
                                        not valid</p>
                                </small>
                            </div>

                            <div class="col-md-4 form-group statusfield" data-for="status">
                                <label for="statusfield" class="form-control-label mbr-fonts-style display-7">Status</label>
                                <select id="infofield" name="status" class="form-control display-7">
                                    <option value=1>Registered</option>
                                    <option value=2 selected>Proccessing</option>
                                    <option value=3>Visa Granted</option>
                                    <option value=4>Failed</option>
                                </select>
                                
                            </div>

                            <div class="col-md-12 form-group filesfield" data-for="files[]">
                                <label for="filesfield" class="form-control-label mbr-fonts-style display-7">Documents.
                                    (Example: Scanned Passport, National Examinations, Degree Certificates ...) Maximum
                                    Combined Size Must Be Less Than 10MB</label>
                                <input type="file" name="files[]" id="filesfield" multiple="" data-form-field="Docs"
                                    data-files class="form-control display-7">
                                <p style="color: red; font-size: large;">
                                    <?php echo ($data['files_err'])?>
                                </p>
                                <small class="errorDocs"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Documents are
                                        not valid</p>
                                </small>
                            </div>
                            <div class="col-md-12 input-group-btn align-center">
                            <button type="submit" id="submit" class="btn btn-primary btn-form display-4">SUBMIT</button>
                            </div>
                            <!-- <div class="input-group-btn align-center py-4">
                            <button type="submit" id="submit" class="btn btn-primary btn-form display-4">SUBMIT</button>
                                    </div> -->

                            <!-- <div class="col-md-12 input-group-btn align-center"><button type="button" onclick="toTermsandConditions()" id="to_terms_and_conditions"
                                class="btn btn-primary btn-form display-4">NEXT</button></div> -->

                        </div>



                </div>
                </form>
                <!---Formbuilder Form--->
            </div>
        </div>
        </div>
    </section>
    <?php require APPROOT . '/views/inc/c_footer.php'; ?>