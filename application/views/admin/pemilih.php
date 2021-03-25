<div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                        Data Pemilih
                        </h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <a class="btn btn-success float-right" href="<?=base_url()?>pemilwa/viewaddpemilih">Tambah Pemilih</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>Nama Lengkap</th>
    <th>Nim</th>
    <th>Prodi</th>
    <th>Angkatan</th>
    <th>Status</th>
    <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($pemilih as $p){?>
    <tr>
    <td><?= $p->nama_lengkap?></td>
	<td><?= $p->nim?></td>
    <td><?= $prodi[$p->id_prodi-1]->prodi?></td>
    <td><?= $p->angkatan?></td>
    <td><?php if($p->no_pilihan_pasangan==null&&$p->no_pilihan_bpm==null){echo "belum memilih";}else{echo "sudah memilih";}?></td>
    <td>
    <a data-placement="bottom" class="btn btn-warning" rel="tooltip" title="Edit" href="<?= base_url();?>pemilwa/viewupdatepemilih/<?= $p->nim?>"><i class="fa fa-pencil"></i></a>
		<a data-placement="bottom" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus?')" href="<?= base_url();?>pemilwa/deletepemilih/<?= $p->nim?>" rel="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
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