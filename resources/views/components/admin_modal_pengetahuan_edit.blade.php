<!-- Modal Edit Depresi -->
<div class="modal fade modal-fullscreen-md-down" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Keputusan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- form --}}
                <form id="edit-depresi" action="" method="post">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id" id="id_depresi">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="kode-depresi" name="kode_depresi">
                            <option value="" selected disabled>Pilih Penyakit</option>
                            {{-- Loop through penyakit options --}}
                            @foreach ($penyakit as $p)
                                <option value="{{ $p->kode_depresi }}">{{ $p->depresi }}</option>
                            @endforeach
                        </select>
                        <label for="kode-depresi">Penyakit</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="depresi" name="kode_gejala">
                            <option value="" selected disabled>Pilih Gejala</option>
                            {{-- Loop through gejala options --}}
                            @foreach ($gejala as $g)
                                <option value="{{ $g->kode_gejala }}">{{ $g->gejala }}</option>
                            @endforeach
                        </select>
                        <label for="depresi">Gejala</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="mb" name="mb" placeholder="MB"
                            required>
                        <label for="mb">MB</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="md" name="md" placeholder="MD"
                            required>
                        <label for="md">MD</label>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Depresi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- form tambah --}}
                <form id="tambah-depresi" action="{{ route('depresi.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id_depresi">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="kode-depresi" name="kode_depresi"
                            placeholder="Kode Depresi" required>
                        <label for="kode-depresi">Kode Depresi</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="depresi" name="depresi" placeholder="Depresi"
                            required>
                        <label for="depresi">Depresi</label>
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
    function updateInput(penyakit, gejala, mb, md) {
        document.getElementById("kode-depresi").value = penyakit;
        document.getElementById("depresi").value = gejala;
        // document.getElementById("id_depresi").value = iddepresi;
        document.getElementById("mb").value = mb;
        document.getElementById("md").value = md;
    }

    function actionUbahdepresi(params) {
        const formdepresi = document.getElementById('edit-depresi');
        formdepresi.setAttribute('action', params);
        formdepresi.setAttribute('method', 'POST');
        console.log(formdepresi);
    }
</script>
