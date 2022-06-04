<footer class="footer mt-auto footer-white">
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12 small">Copyright &#xA9;2020-<?= date('Y'); ?> Andriandev</div>
        </div>
    </div>
</footer>

</div>

</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah yakin akan logout ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Dengan menekan tombol logout akan menghapus semua sesi yang ada.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="/logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
<script src="/assets/js/script.js"></script>
<?php include('ajax.php'); ?>

</body>

</html>