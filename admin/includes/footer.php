<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; DFilm 2021</div>
            <div>
                <span>FAHMI DERBALI&nbsp;&nbsp;&nbsp;&nbsp;Cegep Ahuntsic</span>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/admin/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>

<?php
$current_file = $_SERVER["REQUEST_URI"];
if (preg_match("/add_film|edit_film|add_admin|edit_admin/", $current_file)) {
    echo '<script src="/admin/js/form_add_film.js"></script>';
} elseif (preg_match("/index|ventes/", $current_file)) {
    echo '<script src="assets/demo/chart-area-demo.js"></script>';
    echo '<script src="assets/demo/chart-bar-demo.js"></script>';
    echo '<script src="assets/demo/chart-pie-demo.js"></script>';
} elseif (preg_match("/liste_.*\.php/", $current_file)) {
    echo '<script src="assets/demo/datatables-demo.js"></script>';
}
?>
</body>

</html>