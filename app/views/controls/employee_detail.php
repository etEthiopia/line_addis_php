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
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

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
    
    <title>Employee</title>
    <?php require APPROOT . '/views/inc/c_header.php'; ?>
    <section class="mbr-section content6 cid-snLawv60QW" id="content6-4s">

        <div class="container">
            <div class="media-container-row">
                <div class="col-12 col-md-8">
                    <div class="media-container-row">

                        <div class="media-content">
                            <div class="mbr-section-text mb-0 mbr-fonts-style display-1 align-center">
                                <p class="mbr-text mb-0 mbr-fonts-style display-2"
                                   ><?php echo $data->name?>
                                </p>
                                <p class="mbr-text mb-0 mbr-fonts-style display-4"
                                    ><?php echo $data->emp_id?>
                                </p>
                                <h2 class="mbr-text mb-0 mbr-fonts-style display-5"
                                    ><?php echo $data->todayTasks?> Tasks Reported Today
                                </h2>
                                <h2 class="mbr-text mb-0 mbr-fonts-style display-5"
                                    ><?php echo count($data->tasks)?> Total Tasks Reported
                                </h2>
                                
                                <p class="mbr-text mb-0 mbr-fonts-style display-7">Registry
                                    <strong id="affiliate_promocode" class="mbr-text mb-0 mbr-fonts-style display-7">
                                        <?php echo $data->created_at?>
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section-table cid-snya0qf97J" id="table1-4l">



        <div class="container container-table">
            
            <div class="table-wrapper">
                <div class="container">
                <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-5">
                Tasks</h2>
                </div>

                <div class="container scroll">
                    <table class="table table-striped table-bordered" id="students_table" cellspacing="0"
                        data-empty="No matching records found">
                        <thead>
                            <tr class="table-heads ">
                                <th class="head-item mbr-fonts-style display-7">
                                    TITLE</th>
                                <th class="head-item mbr-fonts-style display-7">
                                   DESCRIPTION</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    DATE & TIME</th>
                                    
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data->tasks as $task) : ?>
                            <tr>
                                <td class="body-item mbr-fonts-style display-7">
                                <a class="link display-7 normal-link" href="<?php echo URLROOT; ?>/controls/opentask/<?php echo $task->id ?>">
                                <?php echo $task->title; ?>
                                </a>
                                    
                                </td>
                                
                                <td class="body-item mbr-fonts-style display-7">
                                <?php if(strlen($task->description) > 47) : ?>
                                    <?php echo substr($task->description, 0, 47).'...'?>
                                <?php else : ?>
                                    <?php echo $task->description?>
                                <?php endif?>
                                </td>
                               
                                
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo $task->created_at;?>
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
                        <?php echo ($data->emp_err)?>
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
                        class="mbr-form form-with-styler" action="<?php echo URLROOT; ?>/controls/openemployee/<?php echo $data->id ?>"
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

    <?php require APPROOT . '/views/inc/c_footer.php'; ?>