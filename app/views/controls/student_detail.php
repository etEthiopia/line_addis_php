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

    <title>Student</title>
    <?php require APPROOT . '/views/inc/c_header.php'; ?>

    <section class="mbr-section content4 cid-soYIgb9e4i" id="content4-5g">

    

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-12">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong><?php echo $data['student']->name?></strong></h2>
                <h3 class="mbr-section-subtitle align-center mbr-light mbr-fonts-style display-5">
                    Status: &nbsp;
                    <strong>
                        <?php if($data['student']->status == 1) : ?>
                            Registered
                            <?php elseif($data['student']->status == 2) : ?>
                            Proccessing
                            <?php elseif($data['student']->status == 3) : ?>
                            Visa Granted
                            <?php elseif($data['student']->status == 0) : ?>
                            -
                            <?php else : ?>
                            Failed
                        <?php endif?>
                    </strong>
                    &nbsp; &nbsp;
                    <a class=" link text-primary display-5"  onclick="togglestatusform();" id="enable_change_status">Change</a>
                </h3>
                <form id="change_status" style="display:none;" name="statuschange" method="POST"
                        class="mbr-form" action="<?php echo URLROOT; ?>/controls/openstudent/<?php echo $data['student']->id; ?>" data-form-title="Mobirise Form">
                    <div class="row">
                    <div class="col-md-6 col-lg-4 form-group infofield" data-for="info">
                            <input style="display:none" type="text" name="current_status" value="<?php echo ($data['student']-> status); ?>">
                            <select id="infofield" name="status" class="form-control display-7">
                                <option style="display:none" value=""></option>
                                <option <?php if($data['student']->status == 1) : ?> selected <?php endif?> value=1>Registered</option>
                                <option <?php if($data['student']->status == 2) : ?> selected <?php endif?> value=2>Proccessing</option>
                                <option <?php if($data['student']->status == 3) : ?> selected <?php endif?> value=3>Visa Granted</option>
                                <option <?php if($data['student']->status == 4) : ?> selected <?php endif?> value=4>Failed</option>
                            </select>
                            <p style="color: red; font-size: large;">
                                    <?php echo ($data['status_err'])?>
                            </p>
                    </div>
                    <div class="col-md-6 col-lg-4 input-group-btn">
                        <button style="margin:0px;" type="submit" id="submit" class="btn btn-primary btn-form display-4">SUBMIT</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php if(!empty($data['student']->agent)) : ?>
<section class="features4 cid-soYLSXFaxQ" id="features4-5k">    
    <div class="container">
        <div class="row align-left">
            <div class="card p-3 col-12 col-md-6">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">Agent</h4>
                        <p class="mbr-text mbr-fonts-style display-2"><a class=" link text-primary" href="<?php echo URLROOT; ?>/controls/agent_detail/<?php echo $data['student']->agent; ?>" ><?php echo $data['student']->agent_name?></a>
                    </p>
                    </div>
                </div>
            </div>
            <?php if($data['student']->status != 1) : ?>
            <div class="card p-3 col-12 col-md-6 col-12 col-md-6">
                <div class="card-wrapper media-container-row">
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            Status</h4>
                        <p class="mbr-text mbr-fonts-style display-5">
                        <?php if($data['student']->adv_commission == 0) : ?>
                            <?php elseif($data['student']->adv_commission < 0) : ?>
                            <?php echo "Unpaid ". abs($data['student']->adv_commission). " ETB Adv. Commission"?>
                            <?php elseif($data['student']->adv_commission > 0) : ?>
                            <?php echo "Paid ". $data['student']->adv_commission. " ETB Adv. Commission"?>
                            <?php else : ?>
                        <?php endif?>
                        
                        <?php if($data['student']->final_commission == 0) : ?>
                            <?php elseif($data['student']->final_commission < 0) : ?>
                            <br/>
                            <?php echo "Unpaid ". abs($data['student']->final_commission). " ETB Final Commission"?>
                            <?php elseif($data['student']->final_commission > 0) : ?>
                            <br/>
                            <?php echo "Paid ". $data['student']->final_commission. " ETB Final Commission"?>
                            <?php else : ?>
                        <?php endif?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endif?>

            

            
        </div>
    </div>
</section>
<?php endif?>

<section class="features4 cid-soYJHp8j7B" id="features4-5i">
    
         

    
    <div class="container">
        <div class="row" style="padding-left: 15px;">
            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            Email
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7"><strong>
                        <?php echo $data['student']->email?></strong><br><strong>
                        </strong></p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper media-container-row">
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            Phone</h4>
                        <p class="mbr-text mbr-fonts-style display-7"><strong>
                        <?php echo $data['student']->phone?>
                        </strong></p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper media-container-row">
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">Recruit Type</h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                        <strong>
                        <td class="body-item mbr-fonts-style display-7">
                                    <?php if($data['student']->recruit_type == 3) : ?>
                                    PromoCode
                                    <?php elseif($data['student']->recruit_type == 2) : ?>
                                    Affiliate
                                    <?php elseif($data['student']->recruit_type == 4) : ?>
                                    Mention
                                    <?php elseif($data['student']->recruit_type == 5) : ?>
                                    Manual
                                    <?php else : ?>
                                    Self
                                    <?php endif?>
                        </td>
                        </strong><br></p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            Reason</h4>
                        <p class="mbr-text mbr-fonts-style display-7"><strong>
                        <?php echo $data['student']->reason?>
                        </strong></p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper media-container-row">
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            Info Place</h4>
                        <p class="mbr-text mbr-fonts-style display-7"><strong>
                        <?php echo $data['student']->info_place?>
                        <?php if($data['student']->info_place == 'A Person') : ?>
                            &nbsp; <?php echo "(".$data['student']->person_name.")"?>
                                    <?php else : ?>
                                    -
                                    <?php endif?>
                        </strong></p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper media-container-row">
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            Countries</h4>
                        <p class="mbr-text mbr-fonts-style display-7"><strong>
                        <?php echo $data['student']->countries?>
                        </strong></p>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</section>


<section class="features4 cid-soYNRRq4ED" id="features4-5m">
    
         

    
    <div class="container">
        <div class="row" style="padding-left: 15px;">
            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">Updated Date</h4>
                        <p class="mbr-text mbr-fonts-style display-5">
                        <?php echo substr($data['student']->updated_at, 0, 10);?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper media-container-row">
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">Registered Date</h4>
                        <p class="mbr-text mbr-fonts-style display-5">
                        <?php echo substr($data['student']->created_at, 0, 10);?>
                        </p>
                    </div>
                </div>
            </div>

            

            
        </div>
    </div>
</section>


<?php if(!empty($data['files'])) : ?>
    <section class="features4 cid-soYJHp8j7B" id="gallery5-56">
        <div class="container align-center">
            <br/>
            <br/>
            <br/>
            <h3 class="mbr-section-title align-center mbr-fonts-style display-5">
                Files</h3>
            <br/>
            <div class="row justify-content-center">
            
            <?php foreach($data['files'] as $file) : ?>
                <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box align-center" 
                    style="">
                    <?php if($file->type == 1) : ?>
                        <a target="_blank" href="<?php echo URLROOT; ?>/uploads/files/<?php echo $file->dir; ?>">
                        <img style="object-fit: cover;
                            width: auto;
                            height: 100px;"  
                            src="<?php echo URLROOT; ?>/uploads/files/<?php echo $file->dir; ?>" alt="Image"
                            >
                        <br/>
                        <p class="mbr-text mbr-fonts-style display-7">
                        <?php $filename = explode('_____' , $file->dir)[0];?>
                        <?php $fext = explode('.' , $file->dir);?>
                        <?php $extension = end($fext);?>
                        <?php echo $filename.".".$extension;?>
                        </p>
                        </a>
                    <?php elseif($file->type == 2) : ?>
                        <a target="_blank" href="<?php echo URLROOT; ?>/uploads/files/<?php echo $file->dir; ?>">
                        <img style=" object-fit: cover;
                            width: auto;
                            height: 100px;" src="<?php echo URLROOT; ?>/assets/images/file_icons/document.png" alt="Document"
                            >
                        <br/>   
                        <p class="mbr-text mbr-fonts-style display-7">
                        <?php $filename = explode('_____' , $file->dir)[0];?>
                        <?php $fext = explode('.' , $file->dir);?>
                        <?php $extension = end($fext);?>
                        <?php echo $filename.".".$extension;?>
                        </p>
                        </a>
                   
                    <?php endif?>
                    </div>
                </div>
                </div>
               
            <?php endforeach; ?>
                
            </div>

        </div>
        
    </section>
<?php endif?>


    <?php require APPROOT . '/views/inc/c_footer.php'; ?>