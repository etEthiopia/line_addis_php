<section once="footers" class="cid-rYSE4KmgOJ" id="footer6-m">





<div class="container">
    <div class="media-container-row align-center mbr-white">
        <div class="col-12">
            <p class="mbr-text mb-0 mbr-fonts-style display-7">
                © Copyright 2020 Line Addis - All Rights Reserved
            </p>
        </div>
    </div>
</div>
</section>


<script>
     $(document).ready( 
         function () {
                $('#c_students_table').DataTable({
                    "order": [[ 4, "desc" ]],
                    "pageLength": 25
                });
                $('#c_agents_table').DataTable({
                    "order": [[ 4, "desc" ]],
                    "pageLength": 25
                });
                $('#my_tasks_table').DataTable({
                    "order": [[ 3, "desc" ]],
                    "pageLength": 25
                }); 
                $('#students_table').DataTable({
                    "order": [],  
                });   
        }
        
    );

   
   
    
    
</script>

<script src="<?php echo URLROOT; ?>/assets/popper/popper.min.js"></script>
<script src="<?php echo URLROOT; ?>/assets/tether/tether.min.js"></script>
<script src="<?php echo URLROOT; ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo URLROOT; ?>/assets/smoothscroll/smooth-scroll.js"></script>
<script src="<?php echo URLROOT; ?>/assets/masonry/masonry.pkgd.min.js"></script>
<script src="<?php echo URLROOT; ?>/assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo URLROOT; ?>/assets/dropdown/js/script.min.js"></script>
<script src="<?php echo URLROOT; ?>/assets/touchswipe/jquery.touch-swipe.min.js"></script>
<script src="<?php echo URLROOT; ?>/assets/parallax/jarallax.min.js"></script>
<script src="<?php echo URLROOT; ?>/assets/viewportchecker/jquery.viewportchecker.js"></script>
<script src="<?php echo URLROOT; ?>/assets/theme/js/script.js"></script>
<script src="<?php echo URLROOT; ?>/assets/gallery/script.js"></script>
<script src="<?php echo URLROOT; ?>/assets/gallery/player.min.js"></script>
<script src="<?php echo URLROOT; ?>/assets/formoid/validation.js"></script>

<!-- <script type="text/javascript" charset="utf8" src="<?php echo URLROOT; ?>/assets/datatables/datatables.js"></script> -->
    <!-- <script src="<?php echo URLROOT; ?>/assets/formoid/formoid.min.js"></script> -->
    
<!-- <script src="<?php echo URLROOT; ?>/assets/datatables/jquery.data-tables.min.js"></script>  
<script src="<?php echo URLROOT; ?>/assets/datatables/data-tables.bootstrap4.min.js"></script> -->

<div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i
        class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
</body>

</html>