<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }} "></script>
<script>
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<footer>
    <div class="container-fluid">
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start mx-5">
                <p>2021 &copy; E-Grownomy</p>
            </div>
            <div class="float-end mx-5">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a>Kelompok 6</a></p>
            </div>
        </div>
    </div>
</footer>
