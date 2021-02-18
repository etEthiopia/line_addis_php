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
    <script src="<?php echo URLROOT; ?>/assets/web/assets/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
          <?php echo "['Registered', ".$data -> registeredStudents."],";?>
          <?php echo "['Proccessing', ".$data -> processingStudents."],";?>
          <?php echo "['Visa Granted', ".$data -> visaStudents."],";?>
          <?php echo "['Failed', ".$data -> failedStudents."]";?>
        ]);


            var options = {
                title: 'Students',
                width: '400',
                height: '100%',
                chartArea: {
                    left: "3%",
                    top: "3%",
                    height: "94%",
                    width: "94%"
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
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

    <title>Dashboard</title>
    <?php require APPROOT . '/views/inc/c_header.php'; ?>
    <section class="features4 cid-soYJHp8j7B" id="features4-5i">




        <div class="container">
            <div class="row" style="padding-top: 60px;">
                <div class="card p-3 col-12 col-md-12 col-lg-6">
                    <div class="card-wrapper media-container-row media-container-row">
                        <div class="card-box">
                            <div id="piechart"></div>
                        </div>
                    </div>
                </div>

                <div class="card p-3 col-12 col-md-12 col-lg-6">
                    <?php if(count($data->agents) > 0):?>
                        <?php if($data->agents[0]->totalmoney > 0): ?>
                        <div class="card-box" style="padding-top: 0rem;">
                            <div class="card topagent col-12 pb-5">
                                <div class="card-wrapper topagent media-container-row media-container-row">
                                    <div class="card-box topagent p-3">
                                        <div class="row">
                                            <div class="col-10 col-md-4">
                                                <!--Image-->
                                                <div class="mbr-figure">
                                                <?php if (empty($data->agents[0]->picture)) :?>
                                                <img height="75px;" style="width: auto;" src="<?php echo URLROOT; ?>/assets/images/contactgirl-250x307.png"
                                                    alt="Profile Picture">
                                                <?php else : ?>
                                                <img height="75px;" style="width: auto;" src="<?php echo URLROOT; ?>/uploads/agents/<?php echo $data->agents[0]->picture; ?>"
                                                    alt="Profile Picture">
                                                <?php endif?>
                                                </div>
                                            </div>
                                            <div class="col-10 col-md-8">
                                                <div class="wrapper">
                                                    <div class="top-line pb-3">
                                                        <h4 class="card-title mbr-fonts-style display-4">
                                                            <?php echo $data->agents[0]->name;?>
                                                        </h4>

                                                    </div>
                                                    <div class="bottom-line">
                                                        <p class="mbr-text mbr-fonts-style display-7">
                                                            <?php echo $data->agents[0]->totalmoney.' ETB'; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif?>
                    <?php endif?>
                    <?php if(count($data->agents) > 1):?>
                        <?php if($data->agents[1]->totalmoney > 0): ?>
                        <div class="card-box" style="padding-top: 0rem;">
                            <div class="card topagent col-12 pb-5">
                                <div class="card-wrapper topagent media-container-row media-container-row">
                                    <div class="card-box topagent p-3">
                                        <div class="row">
                                            <div class="col-10 col-md-4">
                                                <!--Image-->
                                                <div class="mbr-figure">
                                                <?php if (empty($data->agents[1]->picture)) :?>
                                                <img height="75px;" style="width: auto;" src="<?php echo URLROOT; ?>/assets/images/contactgirl-250x307.png"
                                                    alt="Profile Picture">
                                                <?php else : ?>
                                                <img height="75px;" style="width: auto;" src="<?php echo URLROOT; ?>/uploads/agents/<?php echo $data->agents[1]->picture; ?>"
                                                    alt="Profile Picture">
                                                <?php endif?>
                                                </div>
                                            </div>
                                            <div class="col-10 col-md-8">
                                                <div class="wrapper">
                                                <div class="top-line pb-3">
                                                        <h4 class="card-title mbr-fonts-style display-4">
                                                            <?php echo $data->agents[1]->name;?>
                                                        </h4>

                                                    </div>
                                                    <div class="bottom-line">
                                                        <p class="mbr-text mbr-fonts-style display-7">
                                                            <?php echo $data->agents[1]->totalmoney.' ETB'; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif?>
                    <?php endif?>
                    <?php if(count($data->agents) > 2):?>
                        <?php if($data->agents[2]->totalmoney > 0): ?>
                        <div class="card-box" style="padding-top: 0rem;">
                            <div class="card topagent col-12 pb-5">
                                <div class="card-wrapper topagent media-container-row media-container-row">
                                    <div class="card-box topagent p-3">
                                        <div class="row">
                                            <div class="col-10 col-md-4">
                                                <!--Image-->
                                                <div class="mbr-figure">
                                                <?php if (empty($data->agents[2]->picture)) :?>
                                                <img height="75px;" style="width: auto;" src="<?php echo URLROOT; ?>/assets/images/contactgirl-250x307.png"
                                                    alt="Profile Picture">
                                                <?php else : ?>
                                                <img height="75px;" style="width: auto;" src="<?php echo URLROOT; ?>/uploads/agents/<?php echo $data->agents[2]->picture; ?>"
                                                    alt="Profile Picture">
                                                <?php endif?>
                                                </div>
                                            </div>
                                            <div class="col-10 col-md-8">
                                                <div class="wrapper">
                                                <div class="top-line pb-3">
                                                        <h4 class="card-title mbr-fonts-style display-4">
                                                            <?php echo $data->agents[2]->name;?>
                                                        </h4>

                                                    </div>
                                                    <div class="bottom-line">
                                                        <p class="mbr-text mbr-fonts-style display-7">
                                                            <?php echo $data->agents[2]->totalmoney.' ETB'; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif?>
                    <?php endif?>
                </div>
            </div>
        </div>
    </section>
    <section class="features3 cid-sovs9AugAr" id="features3-4v">
    <div class="container">
    <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
               <h2 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-4">
               <?php  $td =  new DateTime('NOW');
               echo count($data->tasks).' Reported Tasks For '. $td->format('Y-m-d');
               ?>  
                </h2>
                <?php if(count($data->tasks) == 0 ) : ?>
                    <h2 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2">
                        0 Tasks Submitted
                </h2>
                <?php endif?>
            </div>
        </div>
        <div class="container">
        <div class="row">
        <?php foreach($data->tasks as $task) : ?>
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
    <?php require APPROOT . '/views/inc/c_footer.php'; ?>