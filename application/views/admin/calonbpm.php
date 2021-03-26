<div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                        Data Calon BPM
                        </h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <a class="btn btn-success float-right" href="<?=base_url()?>pemilwa/viewaddbpm">Tambah Calon BPM</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>Nama Lengkap</th>
    <th>Gambar</td>
    <th>Nim</th>
    <th>Prodi</th>
    <th>Visi</th>
    <th>Misi</th>
    <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($bpm as $b){?>
    <tr>
    <td><?= $b->nama_lengkap?></td>
    <td><img src="<?=base_url()?>/assets/image/bpm/<?=$b->gambar?>" width="100" heigth="100"></td>
	<td><?= $b->nim?></td>
    <td><?= $prodi[$b->id_prodi-1]->singkatan?></td>
    <td><?= $b->visi?></td>
    <td><?= $b->misi?></td>
    <td>
    <a data-placement="bottom" class="btn btn-warning" rel="tooltip" title="Edit" href="<?= base_url();?>pemilwa/viewupdatebpm/<?= $b->no_urut?>"><i class="fa fa-pencil"></i></a>
		<a data-placement="bottom" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus?')" href="<?= base_url();?>pemilwa/deletebpm/<?= $b->no_urut?>" rel="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
    </td>
    </tr>
    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
				<footer><p>All right reserved. Template by: <a href="<?=base_url();?>http://webthemez.com">WebThemez</a></p></footer>
</div>
<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>