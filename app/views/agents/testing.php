<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.10.3, mobirise.com">
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:image:src" content="<?php echo URLROOT; ?>/assets/images/index-meta.jpg">
    <meta property="og:image" content="<?php echo URLROOT; ?>/assets/images/index-meta.jpg">
    <meta name="twitter:title" content="LineAddis-Sub Agents">  
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/images/line-addis-logo-122x54.png" type="image/x-icon">

    <meta name="description" content="Work With Us, Be Our Sub Agent" />

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

    <title>Line Addis - Agents</title>
<?php require APPROOT . '/views/inc/header.php'; ?>
<section class="header15 cid-sm2PmvGcof mbr-fullscreen mbr-parallax-background" id="header15-4f">



<div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(35, 35, 35);"></div>

<div class="container align-right">
    <div class="row">

        <div class="col-lg-4 col-md-5">
            <div class="form-container">
                <div class="media-container-column" data-form-type="formoid">
                    <!---Formbuilder Form--->
                    <form action="<?php echo URLROOT; ?>/agents/testing" method="POST" class="mbr-form form-with-styler"
                        data-form-title="Mobirise Form"><input type="hidden" name="email" data-form-email="true"
                            value="PbiWxZ2FUtXxkc5JnbKyEs8wQdvjgreL+u2eHBtQ+IchG9fJwmi4SknaZdNryNt+aLDo/kN/J98hn1MJjAeLxKkwUaAfCftimTIued3RI6h+YBI9v92Lqbm3v6xOnn9N">
                        <div class="row">
                            <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks
                                for filling out the form!</div>
                            <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                            </div>
                        </div>
                        <div class="dragArea row">

                            <div class="col-md-12 form-group align-center" >
                            <img src="<?php echo URLROOT; ?>/assets/images/line_addis_full.png" alt="LINE ADDIS" title=""
                                style="height: 4.8rem;">
                            </div>

                            <div class="col-md-12 form-group " data-for="email">
                                <input type="email" name="name" placeholder="Name" data-form-field="Email"
                                     class="form-control px-3 display-7"
                                    id="email-header15-4f">
                            </div>
                            <div data-for="password" class="col-md-12 form-group ">
                                <input type="text" name="phone" placeholder="Phone" data-form-field="Password"
                                    class="form-control px-3 display-7" id="phone-header15-4f">


                            </div>
                            <p class="mbr-text mb-4 mbr-fonts-style display-2">
                                <?php echo $data['email_message']?>
                            </p>
                            <div class="col-md-12 input-group-btn">
                                <button type="submit" class="btn btn-secondary btn-form display-4">SEARCH</button>
                            </div>
                        </div>
                    </form>
                    <!---Formbuilder Form--->
                </div>
            </div>
        </div>

        
    </div>
</div>

</section>
<!-- <section class="section-table cid-snya0qf97J" id="table1-4l">



        <div class="container container-table">
            <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-5">
                Agents</h2>
            <div class="table-wrapper">
                <div class="container">
                    <div class="row search">
                        <div class="col-md-6">
                            <div class="dataTables_filter">
                                <label class="searchInfo mbr-fonts-style display-7">Search:</label>
                                <input class="form-control input-sm" disabled="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container scroll">
                    <table class="table isSearch" id="students_table" pageLength=5 cellspacing="0"
                        data-empty="No matching records found">
                        <thead>
                            <tr class="table-heads ">
                                <th class="head-item mbr-fonts-style display-7">
                                    NAME</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    SIMILAR DIGITS</th>
                                <th class="head-item mbr-fonts-style display-7">
                                    SIMILARITY SCORE</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($data['students'] as $student) : ?>
                            <tr>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo $student->name; ?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo $student->digits; ?>
                                </td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo $student->similarity;?>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
                <div class="container table-info-container">
                    <div class="row info">
                        <div class="col-md-6">
                            <div class="dataTables_info mbr-fonts-style display-7">
                                <span class="infoBefore">Showing</span>
                                <span class="inactive infoRows"></span>
                                <span class="infoAfter">entries</span>
                                <span class="infoFilteredBefore">(filtered from</span>
                                <span class="inactive infoRows"></span>
                                <span class="infoFilteredAfter"> total entries)</span>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
                <div class="col-md-12 input-group-btn align-right mbr-section-btn"><a
                        class="btn btn-md btn-secondary display-4" href="javascript:OpenModal('ADD-STUDENT')">ADD</a>
                </div>
            </div>
        </div>
    </section> -->

<?php require APPROOT . '/views/inc/footer.php'; ?>