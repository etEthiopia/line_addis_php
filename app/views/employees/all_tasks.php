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

    <title>All Tasks</title>
    <?php require APPROOT . '/views/inc/emp_header.php'; ?>
    <section class="mbr-section content6 cid-snLawv60QW" id="content6-4s">



        <div class="container">
            <div class="media-container-row">
                <div class="col-12 col-md-8">
                    <div class="media-container-row">

                        <div class="media-content">
                            <div class="mbr-section-text">
                                <p class="mbr-text mb-0 mbr-fonts-style display-2">
                                    <strong>
                                        <?php echo $_SESSION['user_name']?>
                                    </strong> <br />
                                <p style="display:inline;" class="mbr-text mb-0 mbr-fonts-style display-7"
                                    id="profile_emp_id">Employee Id: </p>&nbsp;

                                <strong style="color:white;">
                                    <?php echo $_SESSION['user_email']?>
                                </strong> <br />
                                <strong style="color:white;">
                                    <?php echo count($data['tasks'])?> Tasks Submitted In Total
                                </strong> <br />
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
            <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-5">
                All Tasks</h2>
            <div class="table-wrapper">
                <div class="container">
                    <!-- <div class="row search">
                        <div class="col-md-6">
                            <div class="dataTables_filter">
                                <label class="searchInfo mbr-fonts-style display-7">Search:</label>
                                <input class="form-control input-sm" disabled="">
                            </div>
                        </div>
                    </div> -->
                </div>

                <div class="container scroll">
                    <table class="table table-striped table-bordered" id="my_tasks_table" cellspacing="0"
                        data-empty="No matching records found">
                        <thead>
                            <tr class="table-heads ">
                                <th class="head-item mbr-fonts-style display-7">
                                    TITLE</th>
                                <th class="head-item mbr-fonts-style display-7">
                                   DESCRIPTION</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    DATE & TIME</th>
                                    <th class="head-item mbr-fonts-style display-7"></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($data['tasks'] as $task) : ?>
                            <tr>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo $task->title; ?>
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
                                <td>
                              <a class=" link text-primary display-7" href="<?php echo URLROOT; ?>/employees/openmytask/<?php echo $task->id ?>">More</a>
            
                                </td>
                               
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>
                
                
            </div>
        </div>
    </section>

    <?php require APPROOT . '/views/inc/emp_footer.php'; ?>