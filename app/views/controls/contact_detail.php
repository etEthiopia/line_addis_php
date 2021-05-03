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

    <title>Contact</title>
    <?php require APPROOT . '/views/inc/c_header.php'; ?>

    <section class="mbr-section content4 cid-soTCotA6X9" id="content4-50">



        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-8">
                    <p class="align-center mbr-text mbr-fonts-style display-7">Name</p>
                    <h2 class="align-center pb-3 mbr-fonts-style display-5">
                        <?php echo $data->name?>
                    </h2>
                    <p class="align-center mbr-text mbr-fonts-style display-7">Address</p>
                    <h2 class="align-center pb-3 mbr-fonts-style display-5">
                        <?php echo $data->phone?>
                    </h2>
                    <p class="align-center mbr-text mbr-fonts-style display-7">Type</p>
                    <h2 class="align-center pb-3 mbr-fonts-style display-5">
                        <?php echo $data->type?>
                    </h2>
                    <p class="align-center mbr-text mbr-fonts-style display-7">Employee</p>
                    <a href="<?php echo URLROOT; ?>/controls/openemployee/<?php echo $data->emp_id?>">
                    <h2 class="align-center pb-3 mbr-fonts-style display-5">
                        <?php echo $data->emp_name?>
                    </h2>
                    </a>
                    <p class="align-center mbr-text mbr-fonts-style display-7">Date</p>
                    <h3 class="mbr-section-subtitle align-center mbr-light mbr-fonts-style display-5">
                        <?php echo $data->created_at?>
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
                    <?php echo $data->reason?>
                    </h3>
                </div>
                <hr class="line" style="width: 25%;">
            </div>
        </div>
    </section>



    <?php require APPROOT . '/views/inc/footer.php'; ?>