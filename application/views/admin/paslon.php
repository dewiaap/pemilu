<div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                        Data Paslon BEM
                        </h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <a class="btn btn-success float-right" href="<?=base_url()?>pemilwa/viewaddpaslon">Tambah Paslon BEM</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>Nama Pasang</th>
                                        <th>Gambar</td>
                                        <th>Nim Ketua</th>
                                        <th>Prodi Ketua</th>
                                        <th>Nim Wakil</th>
                                        <th>Prodi Wakil</th>
                                        <th>Visi</th>
                                        <th>Misi</th>
                                        <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($bem as $b){?>
    <tr>
    <td><?= $b->nama_pasangan?></td>
    <td><img src="<?=base_url()?>/assets/image/paslon/<?=strtolower($b->gambar)?>"></td>
	<td><?= $b->nim_ketua?></td>
    <td><?= $prodi[$b->id_prodi_ketua-1]->prodi?></td>
	<td><?= $b->nim_wakil?></td>
	<td><?= $prodi[$b->id_prodi_wakil-1]->prodi?></td>
    <td><?= $b->visi?></td>
    <td><?= $b->misi?></td>
    <td>
    <a data-placement="bottom" class="btn btn-warning" rel="tooltip" title="Edit" href="<?= base_url();?>pemilwa/viewupdatepaslon/<?= $b->no_urut?>"><i class="fa fa-pencil"></i></a>
		<a data-placement="bottom" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus?')" href="<?= base_url();?>pemilwa/deletepaslon/<?= $b->no_urut?>" rel="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
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