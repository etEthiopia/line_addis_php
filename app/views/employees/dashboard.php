<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.10.3, mobirise.com">
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:image:src" content="<?php echo URLROOT; ?>/assets/images/index-meta.jpg">
    <meta property="og:image" content="<?php echo URLROOT; ?>/assets/images/index-meta.jpg">
    <meta name="twitter:title" content="LineAddis-Login">  
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/images/line-addis-logo-122x54.png" type="image/x-icon">

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
<?php require APPROOT . '/views/inc/emp_header.php'; ?>
<section class="features3 cid-sovs9AugAr" id="features3-4v">

    

    
    <div class="container">
    <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
               <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
               <?php  $td =  new DateTime('NOW');
               echo 'Reported Tasks For '. $td->format('Y-m-d');
               ?>  
                </h3>
                <?php if(count($data['tasks']) == 0 ) : ?>
                    <h2 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                        0 Tasks Submitted
                </h2>
                <?php endif?>
            </div>
        </div>
        <div class="container">
        <div class="row">
        <?php foreach($data['tasks'] as $task) : ?>
            <div class="card p-3 col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-7">
                            <?php echo $task->title?>
                        </h4>
                       
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
                    <div class="mbr-section-btn text-center"><a href="<?php echo URLROOT; ?>/employees/openmytask/<?php echo $task->id ?>" class="btn btn-primary display-4">MORE</a></div>
                </div>
            </div>             
        <?php endforeach; ?>
                        </div>
        </div>
       
    </div>
</section>

<section class="mbr-section form1 cid-sovsf3SbAS" id="form1-4w">

    

    
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                   Add Task
                </h2>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                    Support Your Task With Written Description, Documents, Recorded Voice, And Images.
                </h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                <!---Formbuilder Form--->
                <form action="<?php echo URLROOT; ?>/employees/dashboard/#form1-4w" method="POST" enctype="multipart/form-data" class="mbr-form form-with-styler" data-form-title="Mobirise Form"><input type="hidden" name="email" data-form-email="true" value="M7G7o4+NJmQdMjR9SKlv+fymevoe5dX1BnJc94g82QIbmECFcBrBJnbPijcacBk1VY+t9YuLqYPfZyyZze69nkQm4Xk3vD9Es6Wdr9JcWjM/aurg+ubJ69NW2Cnhqgky">
                    <div class="row">
                        <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
                        <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                        </div>
                    </div>
                    <div class="dragArea row">
                        <div class="col-md-12  form-group" data-for="title">
                            <label for="title-form1-4w" class="form-control-label mbr-fonts-style display-7">Title</label>
                            <input type="text" name="title" data-form-field="Title" required="required" class="form-control display-7" id="name-form1-4w">
                            <p style="color: red; font-size: large;">
                                    <?php echo ($data['title_err'])?>
                            </p>
                            <small class="errorReq"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                <p style="color: red; font-size: large;">Title is
                                    required</p>
                            </small>
                            <small class="errorTitle"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                <p style="color: red; font-size: large;">Title
                                    is not valid</p>
                            </small>
                        </div>
                        
                        
                        <div data-for="description" class="col-md-12 form-group">
                            <label for="description-form1-4w" class="form-control-label mbr-fonts-style display-7">Description</label>
                            <textarea name="description" data-form-field="Description" class="form-control display-7" id="description-form1-4w"></textarea>
                            <p style="color: red; font-size: large;">
                                    <?php echo ($data['description_err'])?>
                            </p>
                            <small class="errorReq"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                <p style="color: red; font-size: large;">Description is
                                    required</p>
                            </small>
                            <small class="errorDescription"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                <p style="color: red; font-size: large;">Description
                                    is not valid</p>
                            </small>
                        </div>
                        <div class="col-md-12 form-group filesfield" data-for="files[]">
                                <label for="filesfield" class="form-control-label mbr-fonts-style display-7">Upload Voice Memo, Documents, And Images</label>
                                <input type="file" name="files[]" id="filesfield" multiple="" data-form-field="Docs"
                                    data-files class="form-control display-7">
                                <p style="color: red; font-size: large;">
                                    <?php echo ($data['files_err'])?>
                                </p>
                                <small class="errorDocs"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                                    <p style="color: red; font-size: large;">Files are
                                        not valid</p>
                                </small>
                        </div>
                        
                        <div class="col-md-12 input-group-btn align-center">
                            <button type="submit" class="btn btn-primary btn-form display-4">SUBMIT TASK</button>
                        </div>
                    </div>
                </form><!---Formbuilder Form--->
            </div>
        </div>
    </div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>