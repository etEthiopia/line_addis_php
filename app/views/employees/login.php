<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.10.3, mobirise.com">
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:image:src" content="<?php echo URLROOT; ?>/assets/images/index-meta.jpg">
    <meta property="og:image" content="<?php echo URLROOT; ?>/assets/images/index-meta.jpg">
    <meta name="twitter:title" content="LineAddis-Login">  
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/images/line-addis-logo-122x54.png" type="image/x-icon">

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

    <title>Employee - Login</title>
<?php require APPROOT . '/views/inc/header.php'; ?>
<section class="header15 cid-sm2PmvGcof mbr-fullscreen mbr-parallax-background" id="header15-4f">



<div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(35, 35, 35);"></div>

<div class="container align-right">
    <div class="row">

        <div class="col-lg-4 col-md-5">
            <div class="form-container">
                <div class="media-container-column" data-form-type="formoid">
                    <!---Formbuilder Form--->
                    <form action="<?php echo URLROOT; ?>/employees/login" method="POST" class="mbr-form form-with-styler"
                        data-form-title="Mobirise Form"><input type="hidden" name="email" data-form-email="true"
                            value="PbiWxZ2FUtXxkc5JnbKyEs8wQdvjgreL+u2eHBtQ+IchG9fJwmi4SknaZdNryNt+aLDo/kN/J98hn1MJjAeLxKkwUaAfCftimTIued3RI6h+YBI9v92Lqbm3v6xOnn9N">
                        <div class="row">
                            <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks
                                for filling out the form!</div>
                            <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                            </div>
                        </div>
                        <div class="dragArea row">

                            <div class="col-md-12 form-group align-center" >
                            <img src="<?php echo URLROOT; ?>/assets/images/line_addis_full.png" alt="LINE ADDIS" title=""
                                style="height: 4.8rem;">
                            </div>

                            <div class="col-md-12 form-group " data-for="emp_id">
                                <input type="text" maxlength="9" name="emp_id" placeholder="Emp Id" data-form-field="Emp Id"
                                    required="required" class="form-control px-3 display-7" 
                                    id="email-header15-4f">
                            </div>
                            <div data-for="password" class="col-md-12 form-group ">
                                <input type="password" name="password" placeholder="Password" data-form-field="Password"
                                    class="form-control px-3 display-7" id="phone-header15-4f">


                            </div>
                            <div class= "col-md-12 form-group">
                            <p style="color: red; font-size: large;">
                                    <?php echo ($data['password_err'])?>
                                </p>
                            </div>


                            <div class="col-md-12 input-group-btn">
                                <button type="submit" class="btn btn-secondary btn-form display-4">LOGIN</button>
                            </div>
                            
                        </div>
                    </form>
                    <!---Formbuilder Form--->
                </div>
            </div>
        </div>

        <div class="mbr-white col-lg-8 col-md-7 content-container align-left">
            <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1"><span
                    style="font-weight: normal;">
                    LINE ADDIS</span></h1>
            <p class="mbr-text pb-3 mbr-fonts-style display-5">Line Addis is a privately-owned international
                network enterprise formed by independent educational, financial and IT companies in order to
                provide a comprehensive educational and financial solutions for Ethiopian
                students.<br><br><strong>Login To Follow Up Your Status.</strong></p>
        </div>
        
    </div>
</div>

</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>