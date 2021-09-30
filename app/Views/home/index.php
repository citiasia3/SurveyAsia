<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">

    <h1><?php echo $title ?></h1>

   

</div>

<!--footer start-->
<footer class="site-footer">
            <div class="text-center">
                <p>
                    &copy; Copyrights <strong>Survey Asia</strong>. 
                </p>
                <div class="credits">
                   
                    Created with Back End Team
                </div>
                <a href="blank.html#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->
    </section>
<?= $this->endSection(); ?>