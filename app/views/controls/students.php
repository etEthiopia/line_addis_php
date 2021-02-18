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
    
    <title>Students</title>
    <?php require APPROOT . '/views/inc/c_header.php'; ?>
    <section class="mbr-section content6 cid-snLawv60QW" id="content6-4s">

        <div class="container">
            <div class="media-container-row">
                <div class="col-12 col-md-8">
                    <div class="media-container-row">

                        <div class="media-content">
                            <div class="mbr-section-text mb-0 mbr-fonts-style display-1 align-center">
                                <strong style="color:white;">
                                    <?php echo count($data)?>
                                </strong> 
                                <p style="display:inline;" class="mbr-text mb-0 mbr-fonts-style display-2"
                                    id="profile_emp_id">Students In Total</p>&nbsp;
                                </p>
                                <div class="col-md-12 input-group-btn align-center mbr-section-btn"><a
                                    class="btn btn-md btn-secondary display-4" href="<?php echo URLROOT; ?>/controls/addStudent">ADD</a>
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
            
            <div class="table-wrapper">
                <div class="container">
                    
                </div>

                <div class="container scroll">
                    <table class="table table-striped table-bordered" id="c_students_table" cellspacing="0"
                        data-empty="No matching records found">
                        <thead>
                            <tr class="table-heads ">
                                <th class="head-item mbr-fonts-style display-7">
                                    NAME</th>
                                <th class="head-item mbr-fonts-style display-7">
                                   PHONE</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    COUNTRY</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    STATUS</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    REGISTRY</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($data as $student) : ?>
                            <tr>
                                <td class="body-item mbr-fonts-style display-7">
                                <a class="link display-7 normal-link" href="<?php echo URLROOT; ?>/controls/openstudent/<?php echo $student->id ?>">
                                <?php if(strlen($student->name) > 20) : ?>
                                    <?php echo substr($student->name, 0, 20).'...'?>
                                <?php else : ?>
                                    <?php echo $student->name; ?>
                                <?php endif?>
                                </a>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo $student->phone; ?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                <?php if(strlen($student->countries) > 20) : ?>
                                    <?php echo substr($student->countries, 0, 20).'...'?>
                                <?php else : ?>
                                    <?php echo $student->countries; ?>
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

    <?php require APPROOT . '/views/inc/c_footer.php'; ?>