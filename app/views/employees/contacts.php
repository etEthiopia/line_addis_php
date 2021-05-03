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

    <title>Contacts</title>
<?php require APPROOT . '/views/inc/emp_header.php'; ?>
<section class="features3 cid-sovs9AugAr" id="features3-4v">

    

    
    <div class="container">
    <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
               <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
               <?php  $td =  new DateTime('NOW');
               echo 'Saved Contacts in '. $td->format('Y-m-d');
               ?>  
                </h3>
                <?php if(count($data['contacts']) == 0 ) : ?>
                    <h2 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                        0 Contacts Saved
                </h2>
                <?php endif?>
                <div class="col-md-12 input-group-btn align-center mbr-section-btn">
                <a class="btn btn-md btn-success display-4" href="<?php echo URLROOT; ?>/employees/contacts#form1-4w">ADD CONTACT</a>
                </div>
            </div>
        </div>
        <div class="container">
        <div class="row">
        <?php foreach($data['contacts'] as $contact) : ?>
            <?php if(substr($contact->created_at, 0, 10) == $td->format('Y-m-d')) : ?>
            <div class="card p-3 col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-box">
                    <p class="mbr-text mbr-fonts-style display-7">Name</p>
                        <h4 class="card-title mbr-fonts-style display-7" style="padding-top: 0rem;">
                            <?php echo $contact->name?>
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">Phone</p>
                        <h4 class="card-title mbr-fonts-style display-7" style="padding-top: 0rem;">
                            <?php echo $contact->phone?>
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">Type</p>
                        <h4 class="card-title mbr-fonts-style display-7" style="padding-top: 0rem;">
                            <?php if($contact->type == 1) : ?>
                                Bureau
                            <?php elseif($contact->type == 2) : ?>
                                Phone
                            <?php elseif($contact->type == 3) : ?>
                                Telegram
                            <?php elseif($contact->type == 4) : ?>
                                Website
                            <?php else : ?>
                                Unknown
                            <?php endif?>
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                        <?php if(strlen($contact->reason) > 27) : ?>
                            <?php echo substr($contact->reason, 0, 27).'...'?>
                        <?php else : ?>
                            <?php echo $contact->reason.str_repeat(' ', (30 - strlen($contact->reason)))?>
                        <?php endif?>
                        </p>
                        <p class="card-subtitle mbr-fonts-style display-7" style="text-align:right;">
                            <?php echo substr($contact->created_at, 10)?>
                        </p>
                        
                    </div>
                    <div class="mbr-section-btn text-center"><a href="<?php echo URLROOT; ?>/employees/openmycontact/<?php echo $contact->id ?>" class="btn btn-primary display-4">MORE</a></div>
                </div>
            </div>      
            <?php endif?>       
        <?php endforeach; ?>
                        </div>
        </div>
       
    </div>
</section>

<section class="section-table cid-snya0qf97J" id="table1-4l">
        <div class="container container-table">
            <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-5">
                All Contacts</h2>
            <div class="table-wrapper">
                <div class="container">
                </div>

                <div class="container scroll">
                    <table class="table table-striped table-bordered" id="my_contacts_table" cellspacing="0"
                        data-empty="No matching records found">
                        <thead>
                            <tr class="table-heads ">
                                <th class="head-item mbr-fonts-style display-7">
                                    NAME</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    PHONE</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    TYPE</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    REASON</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    DATE & TIME</th>
                                    <th class="head-item mbr-fonts-style display-7"></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($data['contacts'] as $contact) : ?>
                            <tr>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo $contact->name; ?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo $contact->phone; ?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php if($contact->type == 1) : ?>
                                    Bureau
                                    <?php elseif($contact->type == 2) : ?>
                                    Phone
                                    <?php elseif($contact->type == 3) : ?>
                                    Telegram
                                    <?php elseif($contact->type == 4) : ?>
                                    Website
                                    <?php else : ?>
                                    Unknown
                                    <?php endif?>
                                </td>
                                
                                <td class="body-item mbr-fonts-style display-7">
                                <?php if(strlen($contact->reason) > 27) : ?>
                                    <?php echo substr($contact->reason, 0, 27).'...'?>
                                <?php else : ?>
                                    <?php echo $contact->reason?>
                                <?php endif?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo $contact->created_at;?>
                                </td>
                                <td>
                              <a class=" link text-primary display-7" href="<?php echo URLROOT; ?>/employees/openmycontact/<?php echo $contact->id ?>">More</a>
            
                                </td>
                               
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>
                
                
            </div>
        </div>
    </section>
<section class="mbr-section form1 cid-sovsf3SbAS" id="form1-4w">

    

    
<div class="container">
    <div class="row justify-content-center">
        <div class="title col-12 col-lg-8">
            <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
               Add Contact
            </h2>
            <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                Save Each Person You Talked To.
            </h3>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="media-container-column col-lg-8" data-form-type="formoid">
            <!---Formbuilder Form--->
            <form action="<?php echo URLROOT; ?>/employees/contacts/" method="POST" class="mbr-form form-with-styler" data-form-title="Mobirise Form"><input type="hidden" name="email" data-form-email="true" value="M7G7o4+NJmQdMjR9SKlv+fymevoe5dX1BnJc94g82QIbmECFcBrBJnbPijcacBk1VY+t9YuLqYPfZyyZze69nkQm4Xk3vD9Es6Wdr9JcWjM/aurg+ubJ69NW2Cnhqgky">
                <div class="row">
                    <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
                    <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                    </div>
                </div>
                <div class="dragArea row">
                    <div class="col-md-8  form-group" data-for="name">
                        <label for="title-form1-4w" class="form-control-label mbr-fonts-style display-7">Name</label>
                        <input type="text" name="name" data-form-field="Name" class="form-control display-7" id="name-form1-4w">
                        <p style="color: red; font-size: large;">
                                <?php echo ($data['name_err'])?>
                        </p>
                        <small class="errorName"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                            <p style="color: red; font-size: large;">Name
                                is not valid</p>
                        </small>
                    </div>
                    <div class="col-md-4 form-group typefield" data-for="type">
                        <label for="typefield" class="form-control-label mbr-fonts-style display-7">Contact Type</label>
                        <select id="typefield" name="type" class="form-control display-7">
                            <option value=1>Bureau</option>
                            <option value=2>Phone</option>
                            <option value=3>Telegram</option>
                            <option value=4>Website</option>
                        </select>      
                    </div>
                    
                    <div class="col-md-12  form-group" data-for="address">
                        <label for="title-form1-4w" class="form-control-label mbr-fonts-style display-7">Address</label>
                        <input type="text" name="address" data-form-field="Address" class="form-control display-7" id="name-form1-4w">
                        <p style="color: red; font-size: large;">
                                <?php echo ($data['address_err'])?>
                        </p>
                        <small class="errorName"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                            <p style="color: red; font-size: large;">Address
                                is not valid</p>
                        </small>
                    </div>
                    
                    
                    <div data-for="reason" class="col-md-12 form-group">
                        <label for="reason-form1-4w" class="form-control-label mbr-fonts-style display-7">Reason</label>
                        <textarea name="reason" data-form-field="Reason" class="form-control display-7" id="reason-form1-4w"></textarea>
                        <p style="color: red; font-size: large;">
                                <?php echo ($data['reason_err'])?>
                        </p>
                        <small class="errorReq"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                            <p style="color: red; font-size: large;">Reason is
                                required</p>
                        </small>
                        <small class="errorReason"><i class="formerror fa fa-asterisk" aria-hidden="true"></i>
                            <p style="color: red; font-size: large;">Reason
                                is not valid</p>
                        </small>
                    </div>
                    
                    <div class="col-md-12 input-group-btn align-center">
                        <button type="submit" class="btn btn-success btn-form display-4">SAVE CONTACT</button>
                    </div>
                </div>
            </form><!---Formbuilder Form--->
        </div>
    </div>
</div>
</section>

<?php require APPROOT . '/views/inc/emp_footer.php'; ?>