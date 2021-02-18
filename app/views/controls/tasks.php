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

    <title>Tasks</title>
    <?php require APPROOT . '/views/inc/c_header.php'; ?>

    <section class="features3 cid-sovs9AugAr" id="features3-4v">

    

    
    <div class="container">
    <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
               <h2 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-4">
               <?php  $td =  new DateTime('NOW');
               echo count($data['todays']).' Reported Tasks For '. $td->format('Y-m-d');
               ?>  
                </h2>
                <?php if(count($data) == 0 ) : ?>
                    <h2 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2">
                        0 Tasks Submitted
                </h2>
                <?php endif?>
            </div>
        </div>
        <div class="container">
        <div class="row">
        <?php foreach($data['todays'] as $task) : ?>
            <div class="card p-3 col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-7">
                            <?php echo $task->title?>
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7 text-right">
                        <a class="link" href="<?php echo URLROOT; ?>/controls/openemployee/<?php echo $task->emp_id?>">
                                        <?php echo $task->emp_name?>
                        </a>
                        </p>
                        <p class="mbr-text mbr-fonts-style display-7">
                        <?php if(strlen($task->description) > 47) : ?>
                            <?php echo substr($task->description, 0, 47).'...'?>
                        <?php else : ?>
                            <?php echo $task->description.str_repeat(' ', (50 - strlen($task->description)))?>
                        <?php endif?>
                        </p>
                        <p class="card-subtitle mbr-fonts-style display-7" style="text-align:right;">
                            <?php echo substr($task->created_at, 10)?>
                        </p>
                        
                    </div>
                    <div class="mbr-section-btn text-center"><a href="<?php echo URLROOT; ?>/controls/opentask/<?php echo $task->id ?>" class="btn btn-primary display-4">MORE</a></div>
                </div>
            </div>             
        <?php endforeach; ?>
                        </div>
        </div>
       
    </div>
</section>

<section class="section-table cid-snya0qf97J" id="table1-4l">



        <div class="container container-table">
            <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">
                All Tasks</h2>
            <div class="table-wrapper">
                

                <div class="container scroll">
                    <table class="table table-striped table-bordered" id="my_tasks_table" cellspacing="0"
                        data-empty="No matching records found">
                        <thead>
                            <tr class="table-heads ">
                                <th class="head-item mbr-fonts-style display-7">
                                    TITLE</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    NAME</th>
                                <th class="head-item mbr-fonts-style display-7">
                                   DESCRIPTION</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    DATE & TIME</th>
                                    
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data['alltasks'] as $task) : ?>
                            <tr>
                                <td class="body-item mbr-fonts-style display-7">
                                <a class="link display-7 normal-link" href="<?php echo URLROOT; ?>/controls/opentask/<?php echo $task->id ?>">
                                <?php echo $task->title; ?>
                                </a>
                                    
                                </td>

                                <td class="body-item mbr-fonts-style display-7">
                                <?php if(strlen($task->emp_name) > 47) : ?>
                                    <?php echo substr($task->emp_name, 0, 47).'...'?>
                                <?php else : ?>
                                    <a class="link" href="<?php echo URLROOT; ?>/controls/openemployee/<?php echo $task->emp_id?>">
                                        <?php echo $task->emp_name?>
                                    </a>
                                <?php endif?>
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

    <?php require APPROOT . '/views/inc/c_footer.php'; ?>