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
<?php require APPROOT . '/views/inc/c_header.php'; ?>
<section class="section-table cid-snya0qf97J" id="table1-4l">
        <div class="container container-table">
            <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-5">
                All Contacts</h2>
            <div class="table-wrapper">
                <div class="container">
                </div>

                <div class="container scroll">
                    <table class="table table-striped table-bordered" id="contacts_table" cellspacing="0"
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
                                    <th class="head-item mbr-fonts-style display-7">
                                    EMPLOYEE</th>
                                    <th class="head-item mbr-fonts-style display-7"></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($data as $contact) : ?>
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
                              <a class=" link text-primary display-7" href="<?php echo URLROOT; ?>/controls/openemployee/<?php echo $contact->emp_id ?>"><?php echo $contact->emp_name;?></a>
            
                                </td>
                                <td>
                              <a class=" link text-primary display-7" href="<?php echo URLROOT; ?>/controls/opencontact/<?php echo $contact->id ?>">More</a>
            
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