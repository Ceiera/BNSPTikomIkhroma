<?= $this->extend('/Statis/template');?>
<?= $this->section('content');?>
<body>
<nav class="navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php if (session()->has('admin')) {
            echo base_url('home');
        }else{
            echo base_url('user');
        }?>" class="nav-link">Home</a>
      </li>
      <?php if (session()->has('admin')) {?>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=base_url()?>sertifikasi" class="nav-link">Sertifikasi</a>
        </li>
      <?php }?>
      <?php if (session()->has('admin')) {?>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=base_url()?>logout" class="nav-link">Logout</a>
        </li>
      <?php }else {?>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url()?>login" class="nav-link">Login</a>
      </li>
      <?php }?>
    </ul>
    
</nav>
  <!-- /.navbar -->
<!-- body -->

<div class="">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">Search</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <?php if (session()->has('admin')) {
                        echo form_open('home/cari');
                    }else{
                        echo form_open('user/cari');
                    }
                    ?>
                    <?= csrf_field()?> 
                        <div class="input-group">
                            <input type="search" name="cari" id="cari" class="form-control form-control-lg" placeholder="Cari Berdasarkan Nama">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    <?= form_close()?>
                </div>
            </div>
            <br>
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
                        <th>ID Peserta</th>
                        <th>Kode Skema</th>
                        <th>Nama Peserta</th>
                        <th>Jekel</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <?php if (session()->has('admin')) {?>
                            <th>Edit</th>
                            <th>Hapus</th>
                        <?php }?>
                        
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key) {?>
                            <tr>
                                <td><?= $key['id_peserta']?></td>
                                <td><?= $key['kd_skema']?></td>
                                <td><?= $key['nm_peserta']?></td>
                                <td><?= $key['jekel']?></td>
                                <td><?= $key['alamat']?></td>
                                <td><?= $key['no_hp']?></td>
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
                                            <div class="col-3">ID</div>
                                            <div class="col-1">:</div>
                                            <div class="col-8"><input class="form-control" type="text" name="id" id="id" readonly></div>
                                        </div>
                                        <div class="row py-2">
                                            <div class="col-3">KD_SKEMA</div>
                                            <div class="col-1">:</div>
                                            <div class="col-8"><select class="input-group" name="kd_skema" id="kd_skema">
                                                <?php foreach ($anu as $key) {
                                                ?>
                                                <option value="<?= $key['kd_skema']?>"><?= $key['kd_skema']?></option> 
                                                <?php } ?>
                                            </select></div>
                                        </div>
                                        <div class="row py-2">
                                            <div class="col-3">NAMA PESERTA</div>
                                            <div class="col-1">:</div>
                                            <div class="col-8"><input class="form-control" type="text" name="nm_peserta" id="nm_peserta" required></div>
                                        </div>
                                        <div class="row py-2">
                                            <div class="col-3">JENIS KELAMIN</div>
                                            <div class="col-1">:</div>
                                            <div class="col-8"><select class="form-control" name="jekel" id="jekel" required>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select></div>
                                        </div>
                                        <div class="row py-2">
                                            <div class="col-3">ALAMAT</div>
                                            <div class="col-1">:</div>
                                            <div class="col-8"><textarea class= "form-control" name="alamat" id="alamat" cols="30" rows="3" required></textarea></div>
                                        </div>
                                        <div class="row py-2">
                                            <div class="col-3">NO HP</div>
                                            <div class="col-1">:</div>
                                            <div class="col-8">
                                                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="082xxxxxx" required>
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
        let admin = '<?= session()->get('admin')?>'
        if (admin=='') {
            $('#tambah').hide();
            $('.edit').hide();
            $('.hapus').hide();
        }
        $('#tambah').click(function (e) { 
            $('#modalId').modal('show');
            $('#modalTitleId').text('Tambah Peserta');
            $('#lanjut').click(function () {
                let form = $('#myForm').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url()?>tambah/kirim",
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
            let row = $(this).closest('tr');
            let id = row.find('td:eq(0)').text();
            $.ajax({
                type: "POST",
                url: "<?= base_url()?>edit",
                data: {ids:id},
                success: function (response) {
                    let data = JSON.parse(response);
                    $('#id').val(data.id_peserta);
                    $('#kd_skema').val(data.kd_skema);
                    $('#nm_peserta').val(data.nm_peserta);
                    $('#jekel').val(data.jekel);
                    $('#alamat').val(data.alamat);
                    $('#no_hp').val(data.no_hp);
                    $('#modalId').modal('show');
                    $('#lanjut').click(function () { 
                        let form = $('#myForm').serialize();
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url()?>edit/kirim",
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
                url: "<?= base_url()?>hapus",
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