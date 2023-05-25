<?= $this->extend('/Statis/template');?>
<?= $this->section('content');?>
<body>
<nav class="navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url()?>home" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url()?>sertifikasi" class="nav-link">Sertifikasi</a>
      </li>
    </ul>
    
</nav>
  <!-- /.navbar -->
<!-- body -->

<div class="">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="offset-md-2">
                <button type="button" class="btn btn-primary btn-lg" id="tambah" data-bs-toggle="modal" data-bs-target="#modalId">
                    Tambah
                </button>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <table class="table" style="text-align: center;">
                    <thead>
                        <th>KD SKEMA</th>
                        <th>NAMA SKEMA</th>
                        <th>JENIS</th>
                        <th>JUMLAH UNIT</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key) {?>
                            <tr>
                                <td><?= $key['kd_skema']?></td>
                                <td><?= $key['nm_skema']?></td>
                                <td><?= $key['jenis']?></td>
                                <td><?= $key['jml_unit']?></td>
                                <td><button class="edit btn btn-primary">Edit</button></td>
                                <td><button class="hapus btn btn-danger">Hapus</button></td>
                            </tr>                     
                        <?php }?>
                    </tbody>
                    </table>
                </div>
            </div>
            <!-- Button trigger modal -->
           
            
            <!-- Modal -->
            <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">Tambah Peserta</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <form id="myForm">
                                <div>
                                        <div class="row py-2">
                                            <div class="col-3">KODE SKEMA</div>
                                            <div class="col-1">:</div>
                                            <div class="col-8"><input class="form-control" type="text" name="kd_skema" id="kd_skema"></div>
                                        </div>
                                        <div class="row py-2">
                                            <div class="col-3">NAMA SKEMA</div>
                                            <div class="col-1">:</div>
                                            <div class="col-8"><input class="form-control" type="text" name="nm_skema" id="nm_skema" required></div>
                                        </div>
                                        <div class="row py-2">
                                            <div class="col-3">JENIS</div>
                                            <div class="col-1">:</div>
                                            <div class="col-8"><input class="form-control" type="text" name="jenis" id="jenis" required></div>
                                        </div>
                                        <div class="row py-2">
                                            <div class="col-3">JUMLAH UNIT</div>
                                            <div class="col-1">:</div>
                                            <div class="col-8">
                                                <input type="text" name="jml_unit" id="jml_unit" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="lanjut">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- <script>
                var modalId = document.getElementById('modalId');
            
                modalId.addEventListener('show.bs.modal', function (event) {
                      // Button that triggered the modal
                      let button = event.relatedTarget;
                      // Extract info from data-bs-* attributes
                      let recipient = button.getAttribute('data-bs-whatever');
            
                    // Use above variables to manipulate the DOM
                });
            </script>
             -->
        </div>
    </section>
  </div>

<script>
    $(document).ready(function () {
        $('#tambah').click(function (e) { 
            $('#kd_skema').removeAttr('readonly');
            $('#modalId').modal('show');
            $('#modalTitleId').text('Tambah Peserta');
            $('#lanjut').click(function () {
                let form = $('#myForm').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url()?>tambahSertifikasi/kirim",
                    data: form,
                    success: function (response) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle the error response
                        console.log(xhr.responseText);
                        // You can display an error message or take any other appropriate action.
                    }
                });
            });
        });
        $('.edit').click(function () { 
            $('#kd_skema').prop('readonly', 'readonly');
            let row = $(this).closest('tr');
            let id = row.find('td:eq(0)').text();
            $.ajax({
                type: "POST",
                url: "<?= base_url()?>editSertifikasi",
                data: {ids:id},
                success: function (response) {
                    let data = JSON.parse(response);
                    $('#kd_skema').val(data.kd_skema);
                    $('#nm_skema').val(data.nm_skema);
                    $('#jenis').val(data.jenis);
                    $('#jml_unit').val(data.jml_unit);
                    $('#modalId').modal('show');
                    $('#lanjut').click(function () { 
                        let form = $('#myForm').serialize();
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url()?>editSertifikasi/kirim",
                            data: form,
                            success: function (response) {
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                // Handle the error response
                                console.log(xhr.responseText);
                                // You can display an error message or take any other appropriate action.
                            }
                        });
                    });
                },
                error: function(xhr, status, error) {
                    // Handle the error response
                    console.log(xhr.responseText);
                    // You can display an error message or take any other appropriate action.
                }
            });            
        });
        
        $('.hapus').click(function () { 
            let row = $(this).closest('tr');
            let id = row.find('td:eq(0)').text();
            $.ajax({
                type: "POST",
                url: "<?= base_url()?>hapusSertifikasi",
                data: {ids:id},
                success: function (response) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle the error response
                    console.log(xhr.responseText);
                    // You can display an error message or take any other appropriate action.
                }
            });
        });
        let error = "<?= session()->getFlashdata('Error')?>";
        if (error == 'Tidak Ditemukan') {
            alert('Tidak Ditemukan');
        };
    });
    
</script>
<?= $this->endSection();?>