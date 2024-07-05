<!-- Modal Edit depresi -->
<!-- Modal -->
<style>
    .label {
        width: 100%;
        height: 100%;
        text-align: start;
        font-size: .8rem;
    }
</style>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Artikel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="edit-judul" name="judul"
                            placeholder="Nama Penyakit" required>
                        <label for="edit-judul">Nama Penyakit</label>
                    </div>
                    <input type="hidden" name="oldImage" id="oldImage" value="">
                    <div class="mb-3 my-0">
                        <div class="label mx-1 my-0">
                            <label for="image" class="form-label">Upload Gambar Baru</label>
                        </div>
                        <img src="" alt="gambar artikel" class="img-fluid" id="edit-image">
                        <input class="form-control" type="file" id="image" name="url_gambar">
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="edit-isi" name="isi" style="height: 100px;" required></textarea>
                        <label for="edit-isi">Detail Penyakit</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="edit-saran" name="saran" style="height: 100px;" required></textarea>
                        <label for="edit-saran">Saran</label>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Artikel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- form --}}
                <form id="tambah-depresi" action="{{ route('keterangan.store') }}" method="post"
                    enctype="multipart/form-data">
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

                    <div class="mb-3 my-0">
                        <div class="label mx-1 my-0">
                            <label for="image" class="form-label">Upload Gambar</label>
                        </div>
                        <input class="form-control" type="file" id="image" name="url_gambar">
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="depresi" name="isi" style="height: 100px;" required></textarea>
                        <label for="depresi">Detail Penyakit</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="depresi" name="saran" style="height: 100px;" required></textarea>
                        <label for="depresi">Saran</label>
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
    function updateInput(judul, isi, saran, image, actionUrl) {
        document.getElementById('edit-judul').value = judul;
        document.getElementById('edit-isi').value = isi;
        document.getElementById('edit-saran').value = saran;
        document.getElementById('oldImage').value = image;
        document.getElementById('edit-image').src = 'storage/' + image;
        document.getElementById('editForm').action = actionUrl;
    }
</script>
