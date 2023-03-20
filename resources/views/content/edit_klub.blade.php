<form action="{{ route('klub.update', $klub->id) }}" method="POST" id="form_edit_klub" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="form-group">
                    <label>Nama Klub&nbsp;<span style="color: red;">(*)</span></label>
                    <input type="text" class="form-control" name="nama" id="nama"
                        value="{{ $klub->nama_klub }}" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label>Kota Klub&nbsp;<span style="color: red;">(*)</span></label>
                    <input type="text" class="form-control" name="kota" id="kota"
                        value="{{ $klub->kota_klub }}" required>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btn-save">Save changes</button>
    </div>
</form>
