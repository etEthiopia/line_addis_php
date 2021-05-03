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

    <style>
        .selectBox {
            position: relative;
        }

        .selectBox select {
            width: 100%;
        }

        .overSelect {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }

        #checkboxes {
            display: none;
            border: 1px #dadada solid;
        }

        #checkboxes label {
            display: block;
            padding: 0.3em 0.5em;
        }

        #checkboxes label:hover {
            font-weight: bold;
        }
    </style>

    <title>Line Addis - Programs</title>
    <?php require APPROOT . '/views/inc/header.php'; ?>
    <section class="header1 cid-svRByMwpwz" id="header16-6h">





        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10 align-center">
                    <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-2">
                        What interests you?
                    </h1>
                    <p class="mbr-text pb-3 mbr-fonts-style display-5">
                        Browse our rich course catalog consisting various programs from 6 countries.
                    </p>


                </div>
            </div>
        </div>

    </section>

    <section class="features17 cid-svRCfMdmoy" id="features17-6i">
        <div class="container">

            <form action="<?php echo URLROOT; ?>/courses/filtercourseCatalogs" method="POST" class="mbr-form form-with-styler"
                data-form-title="Mobirise Form">
                <div class="row">
                    <div class="col-lg-10 col-md-9">
                        <div class="media-container-column row">
                            <div class="container-fluid row" style="padding-left:0px !important; padding-right:0px !important;">
                                <div class="col-lg-8 col-md-8 form-group " data-for="program">
                                    <input type="text" name="program" placeholder="Search By Program Title"
                                        data-form-field="Program" class="form-control px-3 display-7"
                                        value="<?php echo $data['program']; ?>" id="email-header15-4f">
                                </div>
                                <div class="multiselect col-md-4 col-lg-4 form-group areafield">
                                    <div class="selectBox" onclick="showCheckboxes()">
                                        <select name="area" class="form-control display-7">
                                            <option>Select Area</option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes">
                                        <label for="non_specified">
                                            <input type="checkbox" onclick="clearcheck()" name="non_specified"
                                                id="non_specified" />&nbsp;Non-Specified
                                        </label>

                                        <?php foreach ($data['areas'] as $area) :?>
                                            <label for="<?php echo $area?>">
                                                <?php if(array_key_exists($area, $data) == true) : ?>
                                                <input type="checkbox" class="areachoices" onclick="cancelspecification(this.id)" name="<?php echo $area?>" id="<?php echo $area?>"
                                                    checked />&nbsp;<?php echo $area?>
                                                <?php else :?>
                                                <input type="checkbox" class="areachoices" onclick="cancelspecification(this.id)" name="<?php echo $area?>" id="<?php echo $area?>" />&nbsp;<?php echo $area?>
                                                <?php endif?>

                                            </label>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 form-group " data-for="level">
                                    <select id="levelfield" name="level" class="form-control display-7">
                                        <option style="display: none;" value="">Level</option>
                                        <option <?php if($data['level']==1) : ?> selected
                                            <?php endif?> value=1>Bachelor
                                        </option>
                                        <option <?php if($data['level']==2) : ?> selected
                                            <?php endif?>value=2>Masters
                                        </option>
                                        <option value='Non-Specified'>Non-Specified</option>
                                    </select>
                                </div>
                                <div data-for="lang" class="col-lg-3 col-md-3 form-group ">
                                    <select id="langfield" name="lang" class="form-control display-7">
                                        <option style="display: none;" value="">Language</option>
                                        <option <?php if($data['lang']=='English' ) : ?> selected
                                            <?php endif?> value="English">English
                                        </option>
                                        <option <?php if($data['lang']=='Polish' ) : ?> selected
                                            <?php endif?> value="Polish">Polish
                                        </option>
                                        <option <?php if($data['lang']=='Turkish' ) : ?> selected
                                            <?php endif?> value="Turkish">Turkish
                                        </option>
                                        <option <?php if($data['lang']=='Russian' ) : ?> selected
                                            <?php endif?> value="Russian">Russian
                                        </option>
                                        <option <?php if($data['lang']=='Arabic' ) : ?> selected
                                            <?php endif?> value="Arabic">Arabic
                                        </option>
                                        <option <?php if($data['lang']=='Hungarian' ) : ?> selected
                                            <?php endif?> value="Hungarian">Hungarian
                                        </option>
                                        <option <?php if($data['lang']=='Mandarin' ) : ?> selected
                                            <?php endif?> value="Mandarin">Mandarin (China)
                                        </option>
                                        <option <?php if($data['lang']=='Cantonese' ) : ?> selected
                                            <?php endif?> value="Cantonese">Cantonese (China)
                                        </option>
                                        <option value='Non-Specified'>Non-Specified</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-3 form-group " data-for="country">
                                    <select id="countryfield" name="country" class="form-control display-7">
                                        <option style="display: none;" value="">Country</option>
                                        <option <?php if($data['country']=='Poland' ) : ?> selected
                                            <?php endif?> value="Poland">Poland
                                        </option>
                                        <option <?php if($data['country']=='Turkey' ) : ?> selected
                                            <?php endif?> value="Turkey">Turkey
                                        </option>
                                        <option <?php if($data['country']=='Russia' ) : ?> selected
                                            <?php endif?> value="Russia">Russia
                                        </option>
                                        <option <?php if($data['country']=='UAE (Dubai)' ) : ?> selected
                                            <?php endif?> value="UAE (Dubai)">UAE (Dubai)
                                        </option>
                                        <option <?php if($data['country']=='Hungary' ) : ?> selected
                                            <?php endif?> value="Hungary">Hungary
                                        </option>
                                        <option <?php if($data['country']=='China' ) : ?> selected
                                            <?php endif?> value="China">China
                                        </option>
                                        <option value='Non-Specified'>Non-Specified</option>
                                    </select>
                                </div>
                                <div data-for="sort" class="col-lg-3 col-md-3 form-group ">
                                    <select id="sortfield" name="sort" class="form-control display-7">
                                        <option style="display: none;" value="">Sort</option>
                                        <option <?php if($data['sort']=='level ASC' ) : ?> selected
                                            <?php endif?> value="level ASC">Sort By Level (Asc)
                                        </option>
                                        <option <?php if($data['sort']=='level DESC' ) : ?> selected
                                            <?php endif?> value="level DESC">Sort By Level (Desc)
                                        </option>
                                        <option <?php if($data['sort']=='fee ASC' ) : ?> selected
                                            <?php endif?> value="fee ASC">Sort By Money (Asc)
                                        </option>
                                        <option <?php if($data['sort']=='fee DESC' ) : ?> selected
                                            <?php endif?> value="fee DESC">Sort By Money (Desc)
                                        </option>
                                        <option value='Non-Specified'>Non-Specified</option>
                                    </select>
                                </div>


                            </div>

                            <!---Formbuilder Form--->
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2" style="padding: 0px;">
                    <div class="container">
                    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-6 input-group-btn" style="padding-bottom: 10px; padding-left: 0px;  padding-right: 0px;">
                        <button style="margin: 0px; float:right;" type="submit"
                            class="btn btn-secondary btn-form display-7">FILTER</button>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6 input-group-btn" style="padding-bottom: 10px; padding-left: 0px;  padding-right: 0px;">
                        <a style="margin: 0px; float:right;" href="<?php echo URLROOT; ?>/courses/courseCatalogs"
                            class="btn btn-warning btn-form display-7">CLEAR</a>
                        </div>
                    </div>
                    </div>
                    </div>





                </div>
            </form>

            <div class="row">
                <?php foreach($data['courses'] as $program) : ?>
                <div class="card p-3 col-12 col-md-6 col-lg-4">
                    <div class="card-wrapper">
                        <div class="card-img" style="background-color: rgb(84, 104, 44);">
                            <img src="<?php echo URLROOT; ?>/assets/images/countries/<?php echo $program->country; ?>.jpg"
                                alt="Mobirise" style="height: 6.0rem; opacity: 0.5;  object-fit: cover;">
                        </div>
                        <div class="card-box" style="padding-top: 1rem;">
                            <h4 class="card-title pb-3 mbr-fonts-style display-5" style="color: #d99a3c;">
                                <?php echo $program->title; ?>
                            </h4>
                            <p class="mbr-text mbr-fonts-style display-5">
                            <div> <span style="font-size: 1.0rem; color: #54682b;"
                                    class="mbr-iconfont material-location-on material"></span>
                                <span class="display-7">&nbsp;
                                    <?php echo $program->city; ?>,
                                    <?php echo $program->country; ?>
                                </span>
                                <?php if($program->country == "Hungary"): ?>
                                <span class="mbr-iconfont flag-icon-hu flag-icon"></span>
                                <?php elseif($program->country == "Poland"): ?>
                                <span class="mbr-iconfont flag-icon-pl flag-icon"></span>
                                <?php elseif($program->country == "Russia"): ?>
                                <span class="mbr-iconfont flag-icon-ru flag-icon"></span>
                                <?php elseif($program->country == "UAE"): ?>
                                <span class="mbr-iconfont flag-icon-ae flag-icon"></span>
                                <?php elseif($program->country == "Turkey"): ?>
                                <span class="mbr-iconfont flag-icon-tr flag-icon"></span>
                                <?php elseif($program->country == "China"): ?>
                                <span class="mbr-iconfont flag-icon-cn flag-icon"></span>
                                <?php endif; ?>

                            </div>
                            <div> <span class="mbr-iconfont material-translate material"
                                    style="font-size: 1.0rem; color: #54682b;"></span><span class="display-7">&nbsp;
                                    Instructed in
                                    <?php echo $program->language; ?>
                                </span>
                            </div>
                            <div> <span class="mbr-iconfont material-access-time material"
                                    style="font-size: 1.0rem; color: #54682b;"></span><span class="display-7">&nbsp;
                                    <?php echo $program->duration; ?> Years
                                </span>
                            </div>
                            <div> <span class="mbr-iconfont material-school material"
                                    style="font-size: 1.0rem; color: #54682b;"></span><span class="display-7">&nbsp;
                                    <?php if($program->level == 1): ?>
                                    Bachelor
                                    <?php elseif($program->level == 2): ?>
                                    Masters
                                    <?php endif; ?>
                                </span>
                            </div>
                            <div> <span class="mbr-iconfont material-attach-money material"
                                    style="font-size: 1.0rem; color: #54682b;"></span><span class="display-7">&nbsp;
                                    <?php echo $program->fee; ?><i>
                                        per semester
                                    </i>
                                </span>
                            </div>
                            <a href="<?php echo URLROOT;?>/students/registerForACourse/<?php echo $program->id?>" target="blank">
                                <h4 class="card-title pb-3 mbr-fonts-style display-5 text-primary"
                                    style="text-decoration: underline; float: right;">
                                    Apply
                                </h4>
                            </a>

                            </p>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>

            </div>
        </div>
    </section>


    <section class="mbr-section form4 cid-rYSD2zr3C7" id="form4-i">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="google-map"><iframe frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15762.836137733033!2d38.7861828!3d8.9988985!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe9d15789139a5315!2sLine%20Addis%20Consultancy!5e0!3m2!1sen!2set!4v1613653814770!5m2!1sen!2set"
                            allowfullscreen=""></iframe></div>
                </div>
                <div class="col-md-6">
                    <h2 class="pb-3 align-left mbr-fonts-style display-2">
                        Contact Us</h2>
                    <div>
                        <div class="icon-block pb-3 align-left">
                            <span class="icon-block__icon">
                                <a href="https://t.me/lineaddisconsultancy"><span
                                        class="mbr-iconfont socicon-telegram socicon"
                                        style="color: rgb(20, 157, 204); fill: rgb(20, 157, 204);"></span></a>
                            </span>
                            <h4 class="icon-block__title align-left mbr-fonts-style display-5">
                                Don't hesitate to reach us
                            </h4>
                        </div>
                        <div class="icon-contacts pb-3">
                            <h5 class="align-left mbr-fonts-style display-7">Your link to the World!</h5>
                            <p class="mbr-text align-left mbr-fonts-style display-7"></p>
                            <p><em>
                                    General Manager</em>: +251 (0) 919 15 26 02
                            <p><span style="font-size: 1rem;"><em>Office Landline </em>: +251 (0) 115 58 07 94, +251 (0)
                                    115 58 09 51</span></p>
                            <p><span style="font-size: 1rem;"><em>Customer Service</em>: +251 (0) 942 12 96 11, +251
                                    (0) 942 13 44 57</span></p>
                            <p><span style="font-size: 1rem;"><em>Email</em>: hello@lineaddis.com /
                                    yosef@lineaddis.com</span></p>
                            <p><span style="font-size: 1rem;"><em>Telegram</em>: t.me/lineaddisconsultancy</span>
                            </p>
                            <p><em>Office Address</em>:&nbsp;Bole In Front of Medhanialem Mall, Raksim Plaza 5th Floor
                                Bole In Front of Dembel, Mobil Plaza First Floor,
                                &nbsp;<span style="font-size: 1rem;">Addis Ababa &nbsp;Ethiopia.</span></p>
                            <p></p>
                        </div>
                    </div>

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