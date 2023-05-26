<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ url('tambah-mitra/mitra') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'Nama'
                },
                {
                    data: 'username',
                    name: 'Username'
                },
                {
                    data: 'aksi',
                    name: 'Aksi'
                }
            ]
        });

        // GLOBAL SETUP 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // 02_PROSES SIMPAN 
        $('body').on('click', '.tombol-tambah', function(e) {
            e.preventDefault();
            $('#exampleModal').modal('show');
            $('.tombol-simpan').click(function() {
                simpan();
            });
        });

        // 03_PROSES EDIT 
        $('body').on('click', '.tombol-edit', function(e) {
            var id = $(this).data('id');
            $.ajax({
                url: 'tambah-mitra/mitra/' + id + '/edit',
                type: 'GET',
                success: function(response) {
                    $('#exampleModal').modal('show');
                    $('#name').val(response.result.nama);
                    $('#uname').val(response.result.username);
                    console.log(response.result);
                    $('.tombol-simpan').click(function() {
                        simpan(id);
                    });
                }
            });
        });

        // 04_PROSES Delete 
        $('body').on('click', '.tombol-del', function(e) {
            Swal.fire({
                title: "Yakin ingin menghapus data ini?",
                text: "Ketika data terhapus, anda tidak bisa mengembalikan data tersebut!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
            }).then((result) => {
                if (result.value) {
                    var id = $(this).data('id');
                    $.ajax({
                        url: 'tambah-mitra/mitra/' + id,
                        type: 'DELETE',
                        success: function() {
                            $('#myTable').DataTable().ajax.reload();
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Data berhasil dihapus',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }
            });
        });

        // fungsi simpan dan update
        function simpan(id = '') {
            if (id == '') {
                var var_url = 'tambah-mitra/mitra';
                var var_type = 'POST';
            } else {
                var var_url = 'tambahmitra/mitra/' + id;
                var var_type = 'PUT';
            }
            $.ajax({
                url: var_url,
                type: var_type,
                data: {
                    nama: $('#name').val(),
                    username: $('#uname').val()
                },
                success: function(response) {
                    if (response.errors) {
                        console.log(response.errors);
                        $('.alert-danger').removeClass('d-none');
                        $('.alert-danger').html("<ul>");
                        $.each(response.errors, function(key, value) {
                            $('.alert-danger').find('ul').append("<li>" + value +
                                "</li>");
                        });
                        $('.alert-danger').append("</ul>");
                    } else {
                        $('.alert-success').removeClass('d-none');
                        $('.alert-success').html(response.success);
                    }
                    $('#myTable').DataTable().ajax.reload();
                }
            });
        }

        $('#exampleModal').on('hidden.bs.modal', function() {
            $('#name').val('');
            $('#uname').val('');

            $('.alert-danger').addClass('d-none');
            $('.alert-danger').html('');

            $('.alert-success').addClass('d-none');
            $('.alert-success').html('');
        });
    });
</script>
