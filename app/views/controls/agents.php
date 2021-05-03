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

    <title>Agents</title>
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
                                    id="profile_emp_id">Agents In Total</p>&nbsp;

                                
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
                    
                </div>

                <div class="container scroll">
                    <table class="table table-striped table-bordered" id="c_agents_table" cellspacing="0"
                        data-empty="No matching records found">
                        <thead>
                            <tr class="table-heads ">
                                <th class="head-item mbr-fonts-style display-7">
                                    NAME</th>
                                <th class="head-item mbr-fonts-style display-7">
                                   REGISTERED<br/>STUDENTS</th>
                                <th class="head-item mbr-fonts-style display-7">
                                   PROCCESSING<br/>STUDENTS</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    SUCCESSFUL<br/>STUDENTS</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    UNPAID AMOUNT</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    TOTAL MONEY</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    REGISTRY</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($data as $agent) : ?>
                            <tr>
                                <td class="body-item mbr-fonts-style display-7">
                                <a class="link display-7 normal-link" href="<?php echo URLROOT; ?>/controls/openagent/<?php echo $agent->id ?>">
                                <?php if(strlen($agent->name) > 20) : ?>
                                    <?php echo substr($agent->name, 0, 20).'...'?>
                                <?php else : ?>
                                    <?php echo $agent->name; ?>
                                <?php endif?>
                                </a>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo $agent->registered; ?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo $agent->processing; ?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo $agent->granted; ?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo $agent->unpaid; ?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo $agent->totalmoney; ?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo substr($agent->created_at, 0, 10);?>
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