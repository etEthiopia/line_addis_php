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
   
    <script src="<?php echo URLROOT; ?>/assets/web/assets/jquery/jquery.min.js"></script>
    

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

    <title>Employees</title>
    <?php require APPROOT . '/views/inc/c_header.php'; ?>

    <section class="features3 cid-sovs9AugAr" id="features3-4v">




        <div class="container">
            <div class="row justify-content-center" style="padding-bottom:2rem;">
                <div class="title col-12 col-lg-8">
                    <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2">
                        <?php  $td =  new DateTime('NOW');
               echo count($data).' Employees ';
               ?>
                    </h3>
                    <?php if(count($data) == 0 ) : ?>
                    <h2 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2">
                        0 Employees
                    </h2>

                    <?php endif?>
                    <div class="col-md-12 input-group-btn align-center mbr-section-btn"><a
                            class="btn btn-md btn-secondary display-4" id="enable_add_employee"
                            onclick="addEmployee();">ADD</a>

                    </div>
                    <form id="add_employee" style="display:none;" name="addemployee" method="POST" class="mbr-form"
                        action="<?php echo URLROOT; ?>/controls/employees" data-form-title="Mobirise Form">
                        <div class="dragArea row">


                            <div class="col-md-4 form-group " data-for="name">
                                <input type="text" name="name" placeholder="Name" data-form-field="Email"
                                    class="form-control px-3 display-7" id="email-header15-4f">
                            </div>
                            <div data-for="password" class="col-md-4 form-group ">
                                <input type="password" name="password" placeholder="Password" data-form-field="Password"
                                    class="form-control px-3 display-7" id="phone-header15-4f">
                            </div>
                            <div class="col-md-4 input-group-btn">
                                <button type="submit" style="margin:0px;"
                                    class="btn btn-secondary btn-form display-4">REGISTER</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <?php foreach($data as $employee) : ?>
                    
                        <div class="card p-3 col-12 col-md-6 col-lg-4">

                            <div class="card-wrapper">
                                <div class="card-box">
                                    
                                    <h4 class="card-title mbr-fonts-style display-5 text-center" style="color:#54682b;">
                                    <a href="<?php echo URLROOT; ?>/controls/openemployee/<?php echo $employee->id?>"><?php echo $employee->name?></a>
                                    </h4>
                                    
                                    <p class="mbr-text mbr-fonts-style display-5 text-center">
                                        <?php echo $employee->emp_id?>
                                    </p>

                                </div>
                                

                            </div>
                        </div>
                    
                    <?php endforeach; ?>

                </div>

            </div>
    </section>


    <?php require APPROOT . '/views/inc/c_footer.php'; ?>