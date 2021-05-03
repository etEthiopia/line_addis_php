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

    <title>Applicant</title>
    <?php require APPROOT . '/views/inc/c_header.php'; ?>

    <section class="mbr-section content4 cid-soYIgb9e4i" id="content4-5g">

    

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-12">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong><?php echo $data['data']->name?></strong></h2>
                
                
            </div>
        </div>
    </div>
</section>

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
                        <?php echo $data['data']->email?></strong><br><strong>
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
                        <?php echo $data['data']->phone?>
                        </strong></p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            Members</h4>
                        <p class="mbr-text mbr-fonts-style display-7"><strong>
                        <?php echo $data['data']->members?>
                        </strong></p>
                    </div>
                </div>
            </div>
            

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            City</h4>
                        <p class="mbr-text mbr-fonts-style display-7"><strong>
                        <?php echo $data['data']->city?>
                        </strong></p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                        University</h4>
                        <p class="mbr-text mbr-fonts-style display-7"><strong>
                        <?php echo $data['data']->university?>
                        </strong></p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                        Registry Date</h4>
                        <p class="mbr-text mbr-fonts-style display-7"><strong>
                        <?php echo substr($data['data']->created_at, 0, 10);?>
                        </strong></p>
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
                        <a target="_blank" href="<?php echo URLROOT; ?>/uploads/contest_files/<?php echo $file->dir; ?>">
                        <img style="object-fit: cover;
                            width: auto;
                            height: 100px;"  
                            src="<?php echo URLROOT; ?>/uploads/contest_files/<?php echo $file->dir; ?>" alt="Image"
                            >
                        <br/>
                        <p class="mbr-text mbr-fonts-style display-7">
                        <?php $filename = explode('_____' , $file->dir)[0];?>
                        <?php $fext = explode('.' , $file->dir);?>
                        <?php $extension = end($fext);?>
                        <?php echo $filename.".".$extension;?>
                        </p>
                        </a>
                    
                    </div>
                </div>
                </div>
               
            <?php endforeach; ?>
                
            </div>

        </div>
        
    </section>
<?php endif?>


    <?php require APPROOT . '/views/inc/c_footer.php'; ?>