<!-- Modal Edit depresi -->
<div class="modal fade modal-fullscreen-md-down" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Depresi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- form --}}
                <form id="edit-depresi" action="" method="post">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id" id="id_depresi">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="kode-depresi" name="kode_depresi" readonly>
                        <label for="kode-depresi">Kode Depresi</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="depresi" name="depresi">
                        <label for="depresi">Depresi</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
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
    document.addEventListener('DOMContentLoaded', function() {
        const namaPenyakitSelect = document.getElementById('nama-penyakit');
        const kodeDepresiInput = document.getElementById('kode-depresi');

        namaPenyakitSelect.addEventListener('change', function() {
            const selectedOption = namaPenyakitSelect.options[namaPenyakitSelect.selectedIndex];
            const kodeDepresi = selectedOption.getAttribute('data-kode');
            kodeDepresiInput.value = kodeDepresi;
        });
    });

    function updateInput(iddepresi, kode, depresi) {
        document.getElementById("kode-depresi").value = kode;
        document.getElementById("depresi").value = depresi;
        document.getElementById("id_depresi").value = iddepresi;
    }

    function actionUbahdepresi(params) {
        const formdepresi = document.getElementById('edit-depresi');
        formdepresi.setAttribute('action', params);
        formdepresi.setAttribute('method', 'POST');
        console.log(formdepresi);
    }
</script>
