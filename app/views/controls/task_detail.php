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
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

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

    <title>Task</title>
    <?php require APPROOT . '/views/inc/c_header.php'; ?>

    <section class="mbr-section content4 cid-soTCotA6X9" id="content4-50">



        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-8">
                    <h2 class="align-center pb-3 mbr-fonts-style display-5">
                        <?php echo $data['data']->title?>
                    </h2>
                    <h3 class="mbr-section-subtitle align-center mbr-light mbr-fonts-style display-5">
                        <?php echo $data['data']->emp_name?>
                    </h3>
                    <h3 class="mbr-section-subtitle align-center mbr-light mbr-fonts-style display-5">
                        <?php echo $data['data']->date?>
                    </h3>

                </div>
            </div>
        </div>
    </section>

    <section class="mbr-section article content9 cid-soTD2NjwYV" id="content9-53">



        <div class="container">
            <div class="inner-container" style="width: 100%;">
                <hr class="line" style="width: 25%;">
                <div class="section-text align-center mbr-fonts-style display-5">
                    <?php echo $data['data']->description?>
                    </h3>
                </div>
                <hr class="line" style="width: 25%;">
            </div>
        </div>
    </section>



    <?php if($data['data']->file == 1) : ?>
    <section class="features4 cid-soYJHp8j7B" id="gallery5-56">
        <div class="container">
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
                        <a target="_blank" href="<?php echo URLROOT; ?>/uploads/task_files/<?php echo $file->dir; ?>">
                        <img style="object-fit: cover;
                            width: auto;
                            height: 100px;"  
                            src="<?php echo URLROOT; ?>/uploads/task_files/<?php echo $file->dir; ?>" alt="Image"
                            >
                        <br/>
                        <p class="mbr-text mbr-fonts-style display-7">
                        <?php echo substr($file->dir,19);?>
                        </p>
                        </a>
                    <?php elseif($file->type == 2) : ?>
                        <a target="_blank" href="<?php echo URLROOT; ?>/uploads/task_files/<?php echo $file->dir; ?>">
                        <img style=" object-fit: cover;
                            width: auto;
                            height: 100px;" src="<?php echo URLROOT; ?>/assets/images/file_icons/document.png" alt="Document"
                            >
                        <br/>   
                        <p class="mbr-text mbr-fonts-style display-7">
                        <?php echo substr($file->dir,19);?>
                        </p>
                        </a>
                    <?php elseif($file->type == 3) : ?>
                        <a target="_blank" href="<?php echo URLROOT; ?>/uploads/task_files/<?php echo $file->dir; ?>">
                        <img style=" object-fit: cover;
                            width: auto;
                            height: 100px;" src="<?php echo URLROOT; ?>/assets/images/file_icons/audio.png" alt="Audio"
                            >
                        <br/>   
                        <p class="mbr-text mbr-fonts-style display-7">
                        <?php echo substr($file->dir,19);?>
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