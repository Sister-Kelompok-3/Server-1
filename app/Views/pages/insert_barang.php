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
        <input type="text" class="form-control" id="formGroupExampleInput2">
    </div>
    <button type="button" class="btn btn-success">Save</button>
</form>
<?= $this->endsection(); ?>