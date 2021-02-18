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

    <meta name="description" content="Work With Us, Be Our Sub Agent" />

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

    <title>Line Addis - Agents</title>
    <?php require APPROOT . '/views/inc/header.php'; ?>
    <section class="header1 cid-slUtLZoXqb mbr-parallax-background" id="header1-3z">



        <div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(51, 51, 51);">
        </div>

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="mbr-white col-md-10">
                    <h3 class="mbr-section-subtitle align-center mbr-bold pb-3 mbr-fonts-style display-2"><span
                            style="font-weight: normal;">Work With Us, Get your Cut!</span></h3>
                    <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">
                        Line Addis is
                        offering you the chance to recruit students.</p>
                    <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">
                        Get your own affiliate link and promocode, and Start recruiting today!</p>
                    <div mbr-buttons mbr-theme-style="display-4" class="mbr-section-btn mt-3 align-center" mbr-if="showButtons">
                    <a class="btn btn-md btn-success display-4" href="<?php echo URLROOT; ?>/agents/login" data-app-placeholder="Type Text">LOGIN</a>
                    <a class="btn btn-md btn-secondary display-4" href="subagents.html#form1-40" data-app-placeholder="Type Text">REGISTER</a></div>

                </div>
            </div>
        </div>

    </section>

    <section class="mbr-section form1 cid-slUv0J7UU2" style="padding-bottom:0px;" id="form1-40">




        <div class="container">
            <div class="row justify-content-center">
                <div class="title col-12 col-lg-8">
                    <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Become An Agent</h2>
                    <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Get your own
                        affiliate link and promocode. Start recruiting today!
                        <div>You can easily be our sub-agent by filling your personal information and going through the
                            terms and conditions section of this page.</div>
                    </h3>
                </div>
            </div>
        </div>
    </section>
    <section class="mbr-section form1 cid-slUv0J7UU2" style="padding-top:20px;" id="agentregistrationform">
        <div class="container">
            <div class="row justify-content-center">
                <div class="media-container-column col-lg-8" data-form-type="formoid">

                    <form name="subagentsfrom" method="POST" class="mbr-form form-with-styler"
                        action="<?php echo URLROOT; ?>/agents/acceptandregister" data-form-title="Mobirise Form"><input
                            type="hidden" name="email" data-form-email="true"
                            value="itqHswTGJnR4vxsbSj9Q00FS4RNWSJ1hJ83/W9MbsIrqg8RuQJ0VZnMmN3/Qk2MiCAg1can/Nc1uCaqESFEzZmNyNwfF/QoC7+lrKHiOIPZYcryWvWw8TFIZTL90/xDz">
                        <div class="row">
                            <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for
                                filling out the form!</div>
                            <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                            </div>
                        </div>
                        <div  class="dragArea row">
                            <div class="col-md-12 form-group namefield" data-for="name">
                                <label for="namefield" class="form-control-label mbr-fonts-style display-7">Full Name *</label>
                                <input type="text" name="name" maxlength="40" id="namefield" data-form-field="Name" data-name
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
                            <div class="col-md-12 form-group emailfield" data-for="email">
                                <label for="emailfield"
                                    class="form-control-label mbr-fonts-style display-7">Email *</label>
                                <input type="email" name="email" maxlength="40" data-form-field="Email" data-email data-required
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
                            <div data-for="phone" class="col-md-12 phonefield form-group">
                                <label for="phonefield"
                                    class="form-control-label mbr-fonts-style display-7">Phone *</label>

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

                            <div class="title col-12 col-lg-12">
                                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                                    
                                 </h3>
                            </div>
                            
                           
                            <div style="margin-bottom: 0px; padding-bottom: 0px;" class="title col-12 col-lg-12">
                                <h3  class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                                    Bank Details
                                 </h3>
                            </div>

                            <div data-for="bankname" class="col-md-12 banknamefield form-group">
                                <div class="dragArea row banks-radio-row justify-content-center">
                                    <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                    <label class="bank_radio">
                                        <input type="radio" id="cbe" onclick="handleOtherBank(this);" name="bankname" value="Commercial Bank of Ethiopia" checked>
                                        <img src ="<?php echo URLROOT; ?>/assets/images/banks/cbe.jpg"/>
                                    <label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                    <label class="bank_radio">
                                        <input type="radio" id="dashen" onclick="handleOtherBank(this);" name="bankname" value="Dashen Bank">
                                        <img src ="<?php echo URLROOT; ?>/assets/images/banks/dashen.jpg"/>
                                    <label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                    <label class="bank_radio">
                                        <input type="radio" id="awash" onclick="handleOtherBank(this);" name="bankname" value="Awash Bank">
                                        <img src ="<?php echo URLROOT; ?>/assets/images/banks/awash.jpg"/>
                                    <label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                    <label class="bank_radio">
                                        <input type="radio" id="oromia" onclick="handleOtherBank(this);" name="bankname" value="Oromia International Bank">
                                        <img src ="<?php echo URLROOT; ?>/assets/images/banks/oromia.jpg"/>
                                    <label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                    <label class="bank_radio">
                                        <input type="radio" id="nib" onclick="handleOtherBank(this);" name="bankname" value="Nib International Bank">
                                        <img src ="<?php echo URLROOT; ?>/assets/images/banks/nib.jpg"/>
                                    <label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                    <label class="bank_radio">
                                        <input type="radio" id="zemen" onclick="handleOtherBank(this);" name="bankname" value="Zemen Bank">
                                        <img src ="<?php echo URLROOT; ?>/assets/images/banks/zemen.jpg"/>
                                    <label>
                                    <label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                    <label class="bank_radio">
                                        <input type="radio" id="united" onclick="handleOtherBank(this);" name="bankname" value="United Bank">
                                        <img src ="<?php echo URLROOT; ?>/assets/images/banks/united.jpg"/>
                                    <label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                    <label class="bank_radio">
                                        <input type="radio" id="abyssinia" onclick="handleOtherBank(this);" name="bankname" value="Abyssinia Bank">
                                        <img src ="<?php echo URLROOT; ?>/assets/images/banks/abyssinia.jpg"/>
                                    <label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                    <label class="bank_radio">
                                        <input type="radio" id="lion" onclick="handleOtherBank(this);" name="bankname" value="Lion Bank">
                                        <img src ="<?php echo URLROOT; ?>/assets/images/banks/lion.jpg"/>
                                    <label>
                                    <label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                    <label class="bank_radio">
                                        <input type="radio" id="debubglobal" onclick="handleOtherBank(this);" name="bankname" value="Debub Global Bank">
                                        <img src ="<?php echo URLROOT; ?>/assets/images/banks/debubglobal.jpg"/>
                                    <label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                    <label class="bank_radio">
                                        <input type="radio" id="abay" onclick="handleOtherBank(this);" name="bankname" value="Abay Bank">
                                        <img src ="<?php echo URLROOT; ?>/assets/images/banks/abay.jpg"/>
                                    <label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 align-center">
                                    <label class="bank_radio">
                                        <input type="radio" id="other" onclick="handleOtherBank(this);" name="bankname" value="Other Bank">
                                        <img src ="<?php echo URLROOT; ?>/assets/images/banks/other.jpg"/>
                                    <label>
                                    </div>
                                </div>

                                
                                    

                                
                               

                            </div>

                            <div class="col-md-12 form-group otherbankfield" data-for="otherbank" id="otherbanksection"
                                style="display:none">
                                <label for="otherbankfield" class="form-control-label mbr-fonts-style display-7">Please
                                    Provide the Name of the Bank</label>
                                <input type="name" name="otherbank" maxlength="15" id="otherbankfield" data-form-field="OtherBank" data-otherbank
                                    class="form-control display-7">
                            </div>

                            <div data-for="bankaccount" class="col-md-12 bankaccountfield form-group">
                                <label for="bankaccountfield"
                                    class="form-control-label mbr-fonts-style display-7">Account Number *</label>

                                <input type="text" name="bankaccount" data-form-field="AccountField" id="bankaccountfield" data-number
                                    data-required maxlength="15" class="form-control display-7" value="<?php echo $data['bankaccount']?>"
                                    >
                                <small class="errorReq"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Bank Account Number is required</p>

                                </small>

                            </div>
            
                            <div class="col-md-12 input-group-btn align-center"><a
                                    class="btn btn-md btn-secondary display-4" onclick="return toTermsandConditions();"
                                    href="#step1-43">NEXT</a></div>

                            <!-- <div class="col-md-12 input-group-btn align-center"><button type="button" onclick="toTermsandConditions()" id="to_terms_and_conditions"
                                class="btn btn-primary btn-form display-4">NEXT</button></div> -->

                        </div>
                        <div class="row">
                            <section class="step1 cid-slX8tBUjmm" id="step1-43" style="display:none">





                                <div class="container">
                                    <h2 class="mbr-section-title pb-3 mbr-fonts-style align-center display-2">Sales
                                        Commission Agreement</h2>

                                    <div class="step-container">
                                        <div class="card separline pb-4">
                                            <div class="step-element d-flex">
                                                <div class="step-wrapper pr-3">
                                                    <h3 class="step d-flex align-items-center justify-content-center">
                                                        1
                                                    </h3>
                                                </div>
                                                <div class="step-text-content">
                                                    <h4 class="mbr-step-title pb-3 mbr-fonts-style display-5">Overview
                                                    </h4>
                                                    <p class="mbr-step-text mbr-fonts-style display-7">This sales
                                                        commission agreement is
                                                        entered into by and between Line Addis Travel Agency “Employer”,
                                                        and
                                                        …
                                                        <?php echo ($data['name'])?>…ISR(independent sales
                                                        representatives). The purpose of this agreement is to
                                                        establish a formal contract between a company and an individual
                                                        whereby that individual
                                                        is authorized to promote the company services and recruit
                                                        customers, and agrees to be
                                                        compensated according to the company’s sales commission policy.
                                                        <br><br>Terms
                                                        <br>Recruited customers:- customers who are recommended by
                                                        employee and sign agreements
                                                        with line Addis consultancy and make advance payments
                                                        <br>Working day: Monday - Friday
                                                        <br>Sales: Let clients go to line addis travel agency, sign
                                                        agreement and make advance
                                                        payment.&nbsp;<br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card separline pb-4">
                                            <div class="step-element d-flex">
                                                <div class="step-wrapper pr-3">
                                                    <h3 class="step d-flex align-items-center justify-content-center">
                                                        2
                                                    </h3>
                                                </div>
                                                <div class="step-text-content">
                                                    <h4 class="mbr-step-title pb-3 mbr-fonts-style display-5">
                                                        Authorization and prohibitions
                                                    </h4>
                                                    <p class="mbr-step-text mbr-fonts-style display-7">This sales
                                                        commission agreement serves as
                                                        authorization for the ISR to sale the services on behalf of the
                                                        Employer. These rights
                                                        are non-transferrable and non-exclusive.
                                                        <br>The ISR agrees to recommend clients for the services under
                                                        the Employer’s brand.
                                                        <br>The ISR will use its best efforts to sell the services of
                                                        the employer and recruit
                                                        customers
                                                        <br>The ISR shall not provide false information or make any
                                                        promises on behalf of the
                                                        employer
                                                        <br>The ISR agrees to abide by the Employer’s pricing policies.
                                                        <br>The ISR shall not promise discounts without the Employer’s
                                                        approval.
                                                        <br>The ISR is not authorized to collect any money on behalf of
                                                        the employer.
                                                        <br>The ISR shall not have any right, power or authority to
                                                        enter into any agreement
                                                        for, or on behalf of the employer.&nbsp;<br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card separline pb-4">
                                            <div class="step-element d-flex">
                                                <div class="step-wrapper pr-3">
                                                    <h3 class="step d-flex align-items-center justify-content-center">
                                                        3
                                                    </h3>
                                                </div>
                                                <div class="step-text-content">
                                                    <h4 class="mbr-step-title pb-3 mbr-fonts-style display-5">
                                                        Documentation
                                                    </h4>
                                                    <p class="mbr-step-text mbr-fonts-style display-7">The ISR agrees to
                                                        use company-provided
                                                        and approved documentations and tools for promotion services and
                                                        make sales.
                                                        <br>
                                                        <br><strong>Non-Compete
                                                        </strong><br>The ISR shall not offer or represent brands which
                                                        compete with the Employer
                                                        while acting as a representative of the Employer, and for a
                                                        period of one month
                                                        thereafter.
                                                        <br>
                                                        <br><strong>Sales reports
                                                        </strong><br>On the last working day of each week, the ISR shall
                                                        complete and submit to
                                                        the employer a written report, on a form provided by the
                                                        employer.
                                                        <br>
                                                        <br><strong>Termination of agreement
                                                        </strong><br>Satisfactory performance:-
                                                        <br>The ISR employment shall continue only as long as the
                                                        services performed by the
                                                        employee are satisfactory to the employer.
                                                        <br>
                                                        <br><strong>Minimum Target
                                                        </strong><br>ISR must make 1 sales in a period of 60 days from
                                                        the day this document is
                                                        signed. Failure to meet the minimum target by the ISR will
                                                        result in termination of the
                                                        employment&nbsp;<br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card separline pb-4">
                                            <div class="step-element d-flex">
                                                <div class="step-wrapper pr-3">
                                                    <h3 class="step d-flex align-items-center justify-content-center">
                                                        4
                                                    </h3>
                                                </div>
                                                <div class="step-text-content">
                                                    <h4 class="mbr-step-title pb-3 mbr-fonts-style display-5">
                                                        Non-Disclosure
                                                    </h4>
                                                    <p class="mbr-step-text mbr-fonts-style display-7"></p>
                                                    <p><span style="font-size: 1rem; background-color: transparent;">The
                                                            Representative shall
                                                            act in the best interests of the Employer in regards to
                                                            confidential information and
                                                            intellectual property at all times. This includes refraining
                                                            from disclosing any
                                                            information deemed proprietary, sensitive, or confidential
                                                            to any third
                                                            party.&nbsp;</span></p>
                                                    <br><strong> Coupon codes</strong>
                                                    <br>Each representative will receive a unique promo codes and he/she
                                                    can promote the Promo
                                                    codes on their platforms. If clients write down the promo code on
                                                    the application form the
                                                    ISR will receive a commission and the customer shall receive a 3000
                                                    ETB discount from the
                                                    final service charges.&nbsp;<br>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="step-element d-flex">
                                                <div class="step-wrapper pr-3">
                                                    <h3 class="step d-flex align-items-center justify-content-center">
                                                        5
                                                    </h3>
                                                </div>
                                                <div class="step-text-content">
                                                    <h4 class="mbr-step-title pb-3 mbr-fonts-style display-5">Commission
                                                        Structure</h4>
                                                    <p class="mbr-step-text mbr-fonts-style display-7">The Employer
                                                        agrees to compensate the ISR
                                                        for sales of the Employer’s services as follows:
                                                        <br>The employer pay the ISR___________________ETB, for each
                                                        sales.
                                                        <br>
                                                        <br><strong>Effects of compensation.</strong>
                                                        <br>The employee will be entitled to the commission earned prior
                                                        to the date of
                                                        termination. The employee will be entitled to no commission
                                                        beyond the date of
                                                        termination.
                                                        <br>
                                                        <br><strong>Requirements for compensation
                                                        </strong><br>One of the following conditions should be fulfilled
                                                        to make commission
                                                        payments to the ISR
                                                        <br>Alternative A. The client write the ISR name on the
                                                        application form
                                                        <br>Alternative B. The client write the promo code on the
                                                        application form.
                                                        <br>Alternative C. The client is on a recommendations list
                                                        exclusively by the ISR.
                                                        <br>
                                                        <br><strong>Bonuses</strong>
                                                        <br>the employer agrees to give bonus payments to the ISR as
                                                        follows
                                                        <br>1-2 successfully recommended clients per month no bonus will
                                                        be rewarded
                                                        <br>3-6 successfully recommended clients per month 5000 ETB will
                                                        be rewarded
                                                        <br>7-10 successfully recommended clients per month 15,000 ETB
                                                        will be rewarded
                                                        <br>11+ successful, 25,000 ETB will be rewarded
                                                        <br>
                                                        <br><strong>Bill period
                                                        </strong><br>Commissions will be paid in 2 installments every
                                                        month, which is mid of the
                                                        month and the last working day of the month
                                                        <br>Bonuses will be paid on the last working day of the month
                                                        <br>
                                                        <br><strong>Means of payment</strong>
                                                        <br>Commissions and bonuses will be made directly to the
                                                        representative Bank account.
                                                        <br>
                                                        <br>By signing below, the Employer and Representative agree to
                                                        enter into this sales
                                                        commission agreement with one another, and agree to the terms
                                                        described
                                                        herein.&nbsp;<br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="media-container-column title col-12">



                                                    <div class="input-group-btn align-right py-4"><a
                                                            class="btn btn-primary-outline display-4" href="#form1-40"
                                                            onclick="backtoform();">CANCEL</a>
                                                        <a class="display-4">&nbsp;&nbsp;&nbsp;</a>
                                                        <button type="submit" id="acceptandregister"
                                                            class="btn btn-primary btn-form display-4">ACCEPT AND
                                                            SUBMIT</button>

                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </div>
                            </section>


                        </div>


                </div>
                </form>
                <!---Formbuilder Form--->
            </div>
        </div>
        </div>
    </section>
    <?php require APPROOT . '/views/inc/footer.php'; ?>