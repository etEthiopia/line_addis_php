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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

    <title>Agent</title>
    <?php require APPROOT . '/views/inc/emp_header.php'; ?>
    <section class="mbr-section content6 cid-snLawv60QW" id="content6-4s">
        <div class="container">
            <div class="media-container-row">
                <div class="col-12 col-md-12">
                    <div class="media-container-row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class=" media-container-row">
                                <div class="mbr-figure" style="padding-right: 1rem; width: 75%;">
                                    <?php if (empty($data->picture)) :?>
                                    <img src="<?php echo URLROOT; ?>/assets/images/contactgirl-250x307.png"
                                        alt="Profile Picture">
                                    <?php else : ?>
                                    <img src="<?php echo URLROOT; ?>/uploads/agents/<?php echo $data->picture; ?>"
                                        alt="Profile Picture">
                                    <?php endif?>
                                </div>
                            </div>
                        </div>
                        <div class="media-content col-12 col-md-6 col-lg-5">
                            <div class="mbr-section-text">
                                <p class="mbr-text mb-0 mbr-fonts-style display-5">
                                    <strong>
                                        <?php echo $data->name?>
                                    </strong> <br />
                                    <?php echo $data->email?> <br />
                                    <?php echo $data->phone?> <br />
                                    <span class="mbr-text mb-0 mbr-fonts-style display-7">Affiliate Link</span>
                                <p style="display:inline;" class="mbr-text mb-0 mbr-fonts-style display-7"
                                    id="affiliate_profile">https://lineaddis.com/students/register/<?php echo $data->id?>
                                </p>&nbsp;

                                <a onclick="return copyaffiliateFromProfile()"><img style="height: 1rem;"
                                        src="<?php echo URLROOT; ?>/assets/images/copy.png" alt="Copy"></a>
                                <p class="mbr-text mb-0 mbr-fonts-style display-7">Promo Code
                                    <strong id="affiliate_promocode" class="mbr-text mb-0 mbr-fonts-style display-7"><?php echo $data->promo_code?></strong>
                                    &nbsp;
                                    <a onclick="return copyPromoCodeFromProfile()"><img style="height: 1rem;"
                                            src="<?php echo URLROOT; ?>/assets/images/copy_white.png" alt="Copy"></a>
                                </p>
                                </p>
                            </div>
                        </div>
                        <div class="media-content col-12 col-md-6 col-lg-4">
                            <div class="mbr-section-text">
                                <p class="mbr-text mb-0 mbr-fonts-style display-5">

                                    <?php echo $data->processing." Proccessing Students"?> <br />
                                    <?php echo $data->granted." Successful Students"?> <br />


                                <p class="mbr-text mb-0 mbr-fonts-style display-5">
                                    <strong class="mbr-text mb-0 mbr-fonts-style display-5">
                                        <?php echo $data->unpaid." ETB "?>
                                    </strong> UnPaid Money
                                </p>
                                <p class="mbr-text mb-0 mbr-fonts-style display-5">
                                    <strong class="mbr-text mb-0 mbr-fonts-style display-5">
                                        <?php echo $data->totalmoney." ETB "?>
                                    </strong> Total Money Made
                                </p>
                                <span class="mbr-text mb-0 mbr-fonts-style display-7">Bank Account</span>
                                <p style="display:inline;" class="mbr-text mb-0 mbr-fonts-style display-5">
                                    <?php echo $data->bank_account?>
                                </p>
                                <p class="mbr-text mb-0 mbr-fonts-style display-5">
                                    <?php echo $data->bank_name?>
                                </p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="section-table cid-snya0qf97J" id="table1-4l">



        <div class="container container-table">
            <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-5">
                Students</h2>
            <div class="table-wrapper">
                <div class="container">

                </div>

                <div class="container scroll">
                    <table class="table table-striped table-bordered" id="students_table" cellspacing="0"
                        data-empty="No matching records found">
                        <thead>
                            <tr class="table-heads ">
                                <th class="head-item mbr-fonts-style display-7">
                                    NAME</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    RECRUIT TYPE</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    STATUS</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    ADV. COMMISSION</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    FINAL COMMISSION</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    &nbsp;REGISTRY</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($data->students as $student) : ?>
                            <tr>
                                <td class="body-item mbr-fonts-style display-7">
                                <a class="link display-7 normal-link" href="<?php echo URLROOT; ?>/employees/openstudent/<?php echo $student->id ?>">
                                <?php if(strlen($student->name) > 20) : ?>
                                    <?php echo substr($student->name, 0, 20).'...'?>
                                <?php else : ?>
                                    <?php echo $student->name; ?>
                                <?php endif?>
                                </a>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php if($student->recruit_type == 3) : ?>
                                    PromoCode
                                    <?php elseif($student->recruit_type == 2) : ?>
                                    Affiliate
                                    <?php elseif($student->recruit_type == 4) : ?>
                                    Mention
                                    <?php elseif($student->recruit_type == 5) : ?>
                                    Manual
                                    <?php endif?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">

                                    <?php if($student->status == 1) : ?>
                                    Registered
                                    <?php elseif($student->status == 2) : ?>
                                    Proccessing
                                    <?php elseif($student->status == 3) : ?>
                                    Visa Granted
                                    <?php elseif($student->status == 0) : ?>
                                    -
                                    <?php else : ?>
                                    Failed
                                    <?php endif?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php if($student->adv_commission < 0) : ?>
                                    <?php echo abs($student->adv_commission); ?>
                                    UnPaid
                                    <?php elseif($student->adv_commission > 0) : ?>
                                    <?php echo abs($student->adv_commission); ?>
                                    Paid
                                    <?php else : ?>
                                    -
                                    <?php endif?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php if($student->final_commission < 0) : ?>
                                    <?php echo abs($student->final_commission); ?>
                                    UnPaid
                                    <?php elseif($student->final_commission > 0) : ?>
                                    <?php echo abs($student->final_commission); ?>
                                    Paid
                                    <?php else : ?>
                                    -
                                    <?php endif?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo substr($student->created_at, 0, 10);?>
                                </td>

                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </section>

    <?php if(!empty($data->bonuses)) : ?>
    <section class="section-table cid-snya0qf97J" id="table1-4l">



        <div class="container container-table">
            <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-5">
                Bonus List</h2>
            <div class="table-wrapper">
                

                <div class="container scroll">
                    <table class="table table-striped table-bordered" id="bonuses_table" cellspacing="0"
                        data-empty="No matching records found">
                        <thead>
                            <tr class="table-heads ">
                                <th class="head-item mbr-fonts-style display-7">
                                    MONTH</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    STUDENTS</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    PRIZE</th>
                               
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($data->bonuses as $bonus) : ?>
                            <tr>
                                
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo $bonus['month']; ?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo $bonus['students']; ?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo $bonus['prize'] ; ?> ETB
                                    <?php if(substr($bonus['month'], 0, 4)  == date("Y") && substr($bonus['month'], 5, 7) == date("m")): ?>
                                    Pending
                                    <?php elseif($bonus['status'] ) : ?>
                                    Paid
                                    <?php elseif(!$bonus['status']) : ?>
                                    UnPaid
                                    <?php endif?>
                                </td>
                                
                                
                                
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>
                
               
            </div>
        </div>
    </section>
    <?php endif?>
    
   
   
    <?php require APPROOT . '/views/inc/emp_footer.php'; ?>