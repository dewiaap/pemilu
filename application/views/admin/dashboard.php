<div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dashboard
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-users fa-5x"></i>
                                <h3><?= $pemilih_all?></h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                Total Mahasiswa

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-check fa-5x"></i>
                                <h3><?= $pemilih_done?></h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                                Total Suara Digunakan

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Perolehan Suara Berdasarkan Prodi
                            </div>
                            <div class="panel-body">
                                <div id="morris-bar-chart1"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Perolehan Suara Paslon BEM
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Perolehan Suara Calon BPM
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart1"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- /. ROW  -->
				<footer><p>All right reserved. Template by: <a href="<?=base_url();?>http://webthemez.com">WebThemez</a></p></footer>
            </div>
            <script>
    var paslon = [];
    var bpm = [];
      $.getJSON("<?= base_url();?>pemilwa/detildashboard/", function(data){
            for(var i=0;i<data.paslon.length;i++){
                paslon.push({label: data.nama_paslon[i], value: data.paslon[i]});
            }
            for(var i=0;i<data.bpm.length;i++){
            bpm.push({label: data.nama_bpm[i], value: data.bpm[i]});
            }
            console.log(bpm);
			Morris.Donut({
                element: 'morris-donut-chart2',
                data: paslon,
                resize: true
            });   
            Morris.Donut({
                element: 'morris-donut-chart1',
                data: bpm,
                resize: true
            });
        });
         Morris.Bar({
                element: 'morris-bar-chart1',
                data: [{
                    y: '<?= $nama_prodi[0]?>',
                    a: <?= $prodi[0]?>
                }, {
                    y: '<?= $nama_prodi[1]?>',
                    a: <?= $prodi[1]?>
                }, {
                    y: '<?= $nama_prodi[2]?>',
                    a: <?= $prodi[2]?>
                }, {
                    y: '<?= $nama_prodi[3]?>',
                    a: <?= $prodi[3]?>
                }, {
                    y: '<?= $nama_prodi[4]?>',
                    a: <?= $prodi[4]?>
                }],
                xkey: 'y',
                ykeys: ['a'],
                labels: ['Prodi'],
                hideHover: 'auto',
                resize: true
            });

    </script>
