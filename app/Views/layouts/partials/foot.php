<!-- JAVASCRIPT -->
<script src=<?= base_url("assets/libs/jquery/jquery.min.js")?>></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src=<?= base_url("assets/libs/bootstrap/js/bootstrap.bundle.min.js")?>></script>
<script src=<?= base_url("assets/libs/metismenu/metisMenu.min.js")?>></script>
<script src=<?= base_url("assets/libs/simplebar/simplebar.min.js")?>></script>
<script src=<?= base_url("assets/libs/node-waves/waves.min.js")?>></script>
<script src=<?= base_url("assets/libs/datatables.net/js/jquery.dataTables.min.js")?>></script>
<script src=<?= base_url("assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js")?>></script>
<script src=<?= base_url("assets/libs/jszip/jszip.min.js")?>></script>
<script src=<?= base_url("assets/libs/pdfmake/build/pdfmake.min.js")?>></script>
<script src=<?= base_url("assets/libs/pdfmake/build/vfs_fonts.js")?>></script>
<script src=<?= base_url("assets/libs/datatables.net-buttons/js/buttons.html5.min.js")?>></script>
<script src=<?= base_url("assets/libs/datatables.net-buttons/js/buttons.print.min.js")?>></script>
<script src=<?= base_url("assets/libs/datatables.net-buttons/js/buttons.colVis.min.js")?>></script>

<!-- Responsive examples -->
<script src=<?= base_url("assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js")?>></script>
<script src=<?= base_url("assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js")?>></script>

<script src=<?= base_url("assets/js/pages/datatables.init.js")?>></script>    
<!-- App js -->
<script src=<?= base_url("assets/js/app.js")?>></script>
<script>

    $('#generalTable').DataTable();
    $('#reportTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });

    function addField() {
        $('#input-group-task').append(`
            <div class="input-group mt-2" id="input-group-task">
                <input type="text" class="form-control" name="tasks[]"  aria-describedby="inputGroupFileAddon04" placeholder="Input task" aria-label="Upload">
                <button class="btn btn-danger" type="button" id="btn-remove-task"><i class="bx bx-minus-circle"></i></button>
            </div> 
        `)
    }

    $(document).on('click', '#btn-remove-task', function() {
        $(this).parent().remove()
    })

    function modalDelete(title, name, url, link) {
        $.confirm({
            title: `Delete ${title}?`,
            content: `Are you sure want to delete ${name}`,
            autoClose: 'cancel|8000',
            buttons: {
                delete: {
                    text: 'delete',
                    action: function () {
                        $.ajax({
                            type: 'POST',
                            url: url,
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                "_method": 'delete',
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function (data) {
                                window.location.href = link
                            },
                            error: function (data) {
                                $.alert('Failed!');
                                console.log(data);
                            }
                        });
                    }
                },
                cancel: function () {
                    
                }
            }
        });        
    }

    function logout() {
    $.confirm({
        icon: 'fas fa-sign-out-alt',
        title: 'Logout',
        theme: 'supervan',
        content: 'Are you sure want to logout?',
        autoClose: 'cancel|8000',
        buttons: {
            logout: {
                text: 'logout',
                action: function () {
                    $.ajax({
                        type: 'GET',
                        url: '<?= base_url('logout');?>',
                        success: function (data) {
                            location.reload();
                        },
                        error: function (data) {
                            $.alert('Failed!');
                            console.log(data);
                        }
                    });
                }
            },
            cancel: function () {
                
            }
        }
    });
}
</script>
<?= $this->renderSection('js'); ?>