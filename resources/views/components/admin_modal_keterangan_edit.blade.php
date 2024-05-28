<!-- Modal Edit depresi -->
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" action="" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Penyakit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="edit-judul" name="judul"
                            placeholder="Nama Penyakit" required>
                        <label for="edit-judul">Nama Penyakit</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="edit-isi" name="isi" style="height: 100px;" required></textarea>
                        <label for="edit-isi">Detail Penyakit</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- end modal edit depresi --}}

{{-- modal tambah depresi --}}
<div class="modal fade modal-fullscreen-md-down" id="depresiModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Keterangan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- form --}}
                <form id="tambah-depresi" action="{{ route('keterangan.store') }}" method="post">
                    @method('post')
                    @csrf
                    <input type="hidden" name="id" id="id_depresi">
                    <div class="form-floating mb-3">
                        <select class="form-control" id="nama-penyakit" name="kode_depresi" required>
                            <option value="" disabled selected>Pilih Nama Penyakit</option>
                            @foreach ($penyakit as $p)
                                <option value="{{ $p->kode_depresi }}">{{ $p->depresi }}</option>
                            @endforeach
                        </select>
                        <label for="nama-penyakit">Nama Penyakit</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="depresi" name="isi" style="height: 100px;"></textarea>
                        <label for="depresi">Detail Penyakit</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- end modal tambah depresi --}}

<script>
    function updateInput(judul, isi, actionUrl) {
        document.getElementById('edit-judul').value = judul;
        document.getElementById('edit-isi').value = isi;
        document.getElementById('editForm').action = actionUrl;
    }
</script>
