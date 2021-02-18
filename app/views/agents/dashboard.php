<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.10.3, mobirise.com">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image:src" content="<?php echo URLROOT; ?>/assets/images/index-meta.jpg">
    <meta property="og:image" content="<?php echo URLROOT; ?>/assets/images/index-meta.jpg">
    <meta name="twitter:title" content="LineAddis-Sub Agents">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/images/line-addis-logo-122x54.png"
        type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    


    <meta name="description" content="Follow Up Your Status" />

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

    <title>Line Addis - Dashboard</title>
    <?php require APPROOT . '/views/inc/agent_header.php'; ?>

    <section class="info2 cid-sny9bYeRmQ" id="info2-4k">

        <h2 style="color: red;" class="mbr-section-title align-center pb-3 mbr-fonts-style display-5">
            <?php echo ($data['student_err'])?>
        </h2>
        <div class="align-center container-fluid">
            <div class="row justify-content-center">
                <div class="card col-12 col-lg-6">
                    <div class="wrapper">
                        <h3 class="mbr-section-title mb-4 mbr-fonts-style display-5">
                            My Students Who Got Visa</h3>
                        <p class="mbr-text mb-4 mbr-fonts-style display-2">
                            <?php echo $data['visa_students']?>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="wrapper">
                        <h3 class="mbr-section-title mbr-fonts-style mb-4 display-5">
                            Total Money Made&nbsp;</h3>
                        <p class="mbr-text mbr-fonts-style mb-4 display-2">
                            <?php echo $data['total_money']?> <span class="mbr-text mbr-fonts-style mb-4 display-5">
                                ETB</span>
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="align-center container-fluid">
            <div class="row justify-content-center">
                <div class="card col-12 col-lg-6">
                    <div class="wrapper">
                        <h3 class="mbr-text pb-3 mbr-fonts-style display-4">
                            PromoCode</h3>
                        <p class="mbr-text mb-4 mbr-fonts-style display-5">
                            <strong id="dashboard_promocode">
                                <?php echo $data['promocode']?>
                            </strong>
                            &nbsp;
                            <a onclick="return copyPromoCodeFromDashboard()"><img style="height: 1.5rem;" src="<?php echo URLROOT; ?>/assets/images/copy_white.png"
                            alt="Copy"></a>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="wrapper">
                        <h3 class="mbr-text pb-3 mbr-fonts-style display-4">
                            Affliliate Link&nbsp;</h3>
                        <p class="mbr-text mbr-fonts-style mb-4 display-5">
                            <span id="dashboard_affiliate">https://lineaddis.com/students/register/<?php echo $data['affiliate']?></span>
                            &nbsp;
                            <a onclick="return copyAffiliateFromDashboard()"><img style="height: 1.5rem;" src="<?php echo URLROOT; ?>/assets/images/copy_white.png"
                            alt="Copy"></a>
                        </p>

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
                                    &nbsp;REGISTRATION</th>
                                <th class="head-item mbr-fonts-style display-7"></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($data['students'] as $student) : ?>
                            <tr>
                                <td class="body-item mbr-fonts-style display-7">
                                    <?php echo $student->name; ?>
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
                                <td style="padding:.75rem;">
                                <li class="list-inline-item">
                                <?php if($student->recruit_type == 5) : ?>
                                    <a href = "<?php echo URLROOT; ?>/agents/delete_students/<?php echo $student->id; ?>" style="border-radius:3px !important; margin:0px; background-color: red !important; padding: 0.2rem" class="btn btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><img style="height: 0.8rem;" src="<?php echo URLROOT; ?>/assets/images/delete.png"/></a>
                                    <?php endif?>
                                </li>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>
                
                <div class="col-md-12 input-group-btn align-right mbr-section-btn"><a
                        class="btn btn-md btn-secondary display-4" href="javascript:OpenModal('ADD-STUDENT')">ADD</a>
                </div>
            </div>
        </div>
    </section>

    <section class="mbr-section" id="witsec-modal-window-block-4o" data-rv-view="232">

        <style>
            /* Let's not animate the contents of modal windows */
            .no-anim {
                -webkit-animation: none !important;
                -moz-animation: none !important;
                -o-animation: none !important;
                -ms-animation: none !important;
                animation: none !important;
            }
        </style>



        <div>
            <div class="modal fade" id="ADD-STUDENT" tabindex="-1" role="dialog" aria-labelledby="ADD-STUDENTLabel"
                aria-hidden="true">
                <div class="modal-dialog  " style="height:auto" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="no-anim modal-title mbr-bold mbr-fonts-style display-4" id="ADD-STUDENTLabel">
                                Add Students</h5> <a href="#" class="no-anim close" data-dismiss="modal"
                                aria-label="Close"><span aria-hidden="true">×</span></a>
                        </div>
                        <div class="modal-body" id="ADD-STUDENT_body">
                            <form name="subagentsfrom" method="POST" class="mbr-form form-with-styler"
                                action="<?php echo URLROOT; ?>/agents/dashboard" data-form-title="Mobirise Form"><input
                                    type="hidden" name="email" data-form-email="true"
                                    value="itqHswTGJnR4vxsbSj9Q00FS4RNWSJ1hJ83/W9MbsIrqg8RuQJ0VZnMmN3/Qk2MiCAg1can/Nc1uCaqESFEzZmNyNwfF/QoC7+lrKHiOIPZYcryWvWw8TFIZTL90/xDz">
                                <div class="dragArea row">
                                    <div class="col-md-6 form-group namefield" data-for="name">
                                        <label for="namefield" class="form-control-label mbr-fonts-style display-7">Full
                                            Name</label>
                                        <input type="text" name="name_1" id="namefield1" data-form-field="Name"
                                            class="form-control display-7" data-required>
                                        <small class="errorReq"><i class="formerror fa fa-asterisk"
                                                aria-hidden="true"></i>
                                            <p style="color: red; font-size: large;">Name is
                                                requred</p>
                                        </small>
                                    </div>
                                    <div data-for="phone" class="col-md-6 phonefield form-group">
                                        <label for="phonefield"
                                            class="form-control-label mbr-fonts-style display-7">Phone (Optional)</label>

                                        <input type="tel" name="phone_1" data-form-field="Phone" id="phonefield1"
                                            data-number maxlength="10" class="form-control display-7">

                                    </div>

                                    <div class="title col-12 col-lg-12 align-right">
                                        <h3 class="mbr-text pb-3 mbr-fonts-style display-4">
                                            <a href="#" onclick="return addAnotherStudent(2);">
                                                Add Second Student</a>
                                        </h3>
                                    </div>
                                </div>
                                <div style="display:none;" id="secondStudent">
                                    <div class="dragArea row">
                                        <div class="col-md-6 form-group namefield" data-for="name">
                                            <label for="namefield"
                                                class="form-control-label mbr-fonts-style display-7">Full Name</label>
                                            <input type="text" name="name_2" id="namefield2" data-form-field="Name"
                                                data-name class="form-control display-7">
                                            <small class="errorReq"><i class="formerror fa fa-asterisk"
                                                    aria-hidden="true"></i>
                                                <p style="color: red; font-size: large;">Name is
                                                    requred</p>
                                            </small>
                                        </div>
                                        <div data-for="phone" class="col-md-6 phonefield form-group">
                                            <label for="phonefield"
                                                class="form-control-label mbr-fonts-style display-7">Phone (Optional)</label>

                                            <input type="tel" name="phone_2" data-form-field="Phone" id="phonefield2"
                                                data-number maxlength="10" class="form-control display-7">
                                        </div>

                                        <div class="title col-12 col-lg-12 align-right">

                                            <h3 class="mbr-text pb-3 mbr-fonts-style display-4">
                                                <a href="#" onclick="return cancelStudent(2);">
                                                    Cancel </a>
                                                &nbsp;
                                                <a href="#" onclick="return addAnotherStudent(3);">
                                                    Add Third Student</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div style="display:none;" id="thirdStudent">
                                    <div class="dragArea row">
                                        <div class="col-md-6 form-group namefield" data-for="name">
                                            <label for="namefield"
                                                class="form-control-label mbr-fonts-style display-7">Full Name</label>
                                            <input type="text" name="name_3" id="namefield3" data-form-field="Name"
                                                data-name class="form-control display-7">
                                            <small class="errorReq"><i class="formerror fa fa-asterisk"
                                                    aria-hidden="true"></i>
                                                <p style="color: red; font-size: large;">Name is
                                                    requred</p>
                                            </small>
                                        </div>
                                        <div data-for="phone" class="col-md-6 phonefield form-group">
                                            <label for="phonefield"
                                                class="form-control-label mbr-fonts-style display-7">Phone (Optional)</label>

                                            <input type="tel" name="phone_3" data-form-field="Phone" id="phonefield3"
                                                data-number maxlength="10" class="form-control display-7">



                                        </div>

                                        <div class="title col-12 col-lg-12 align-right">

                                            <h3 class="mbr-text pb-3 mbr-fonts-style display-4">
                                                <a href="#" onclick="return cancelStudent(3);">
                                                    Cancel </a>
                                            </h3>
                                        </div>
                                    </div>
                                </diV>
                                <div class="col-md-12 input-group-btn align-center modal-footer">
                                    <button type="submit" id="addstudent"
                                        class="btn btn-primary btn-form display-4">SUBMIT</button>
                                </div>

                                <!-- <div class="col-md-12 input-group-btn align-center"><button type="button" onclick="toTermsandConditions()" id="to_terms_and_conditions"
                                class="btn btn-primary btn-form display-4">NEXT</button></div> -->


                        </div>
                        </form>


                    </div>
                </div>
            </div>
            <script>document.addEventListener("DOMContentLoaded", function () { $("#ADD-STUDENT").on("hidden.bs.modal", function () { var html = $("#ADD-STUDENT_body").html(); $("#ADD-STUDENT_body").empty(); $("#ADD-STUDENT_body").append(html); }) });</script>
        </div>

        <script>
            if (typeof OpenModal === 'undefined') {
                OpenModal = function (modalName) {
                    if ($('#' + modalName).length)
                        $('#' + modalName).modal('show');
                    else
                        alert("Sorry, but there is no modal for " + modalName);
                }
            }

            function modalSetCookie(cname, cvalue, exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                var expires = "expires=" + d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }

            function modalGetCookie(cname) {
                var name = cname + "=";
                var decodedCookie = decodeURIComponent(document.cookie);
                var ca = decodedCookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }

            function addAnotherStudent(number) {
                if (number == 2) {
                    var st2 = document.getElementById('namefield2');
                    document.getElementById('secondStudent').style.display = 'block';
                    var att = document.createAttribute("data-required");
                    st2.setAttributeNode(att);
                } else if (number == 3) {
                    var st3 = document.getElementById('namefield3');
                    document.getElementById('thirdStudent').style.display = 'block';
                    var att = document.createAttribute("data-required");
                    st3.setAttributeNode(att);
                }
                return false;
            }
            

            function cancelStudent(number) {
                if (number == 2) {
                    var st2 = document.getElementById('namefield2');
                    var pw2 = document.getElementById('phonefield2');
                    document.getElementById('secondStudent').style.display = 'none';
                    st2.value = '';
                    pw2.value = '';
                    st2.removeAttribute("data-required");
                } else if (number == 3) {
                    var st3 = document.getElementById('namefield3');
                    var pw3 = document.getElementById('phonefield3');
                    document.getElementById('thirdStudent').style.display = 'none';
                    st3.value = '';
                    pw3.value = '';
                    st3.removeAttribute("data-required");
                }
                return false;
            }

            function copyPromoCodeFromDashboard() {
	            var copyText = document.getElementById('dashboard_promocode');
	            var $temp = $('<input>');
	            $('body').append($temp);
	            document.execCommand('copy');
	            $temp.remove();
	            return false;
            }

            function copyAffiliateFromDashboard() {
            	var copyText = document.getElementById('dashboard_affiliate');
            	var $temp = $('<input>');
            	$('body').append($temp);
            	$temp.val($(copyText).text()).select();
            	document.execCommand('copy');
            	$temp.remove();
            	return false;
            }

           
            


        </script>

       
    </section>

    <?php require APPROOT . '/views/inc/agent_footer.php'; ?>