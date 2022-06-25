<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>
<form class="m-5">
    <div class="form-group">
        <label for="formGroupExampleInput">Nama Barang</label>
        <input type="text" class="form-control" id="formGroupExampleInput">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Satuan</label>
        <input type="text" class="form-control" id="formGroupExampleInput2">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Stok</label>
        <input type="text" <?= $this->extend('template/layout'); ?> <?= $this->section('content'); ?> <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mt-2">
                    Daftar Barang
                </h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">
                                #
                            </th>
                            <th scope="col">
                                Nama
                            </th>
                            <th scope="col">
                                Satuan
                            </th>
                            <th scope="col">
                                Stok
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <?= $this->endsection(); ?>