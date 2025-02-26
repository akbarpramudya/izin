<x-master-layout>
    <div class="card">
        <div class="card-header">List Pengajuan Cuti</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <button class="btn btn-primary" data-action ="{{ route('pengajuan.cuti.create')}}">Tambah</button>
                        </div>
                    </div>
                    {{$dataTable -> table()}}
                </div>
            </div>
        </div>
    </div>
    
    @push('jsModule')
        @vite(['resources/js/pages/pengajuan/cuti.js'])
    @endpush
    @push('js')
        {{$dataTable -> scripts(attributes: ['type' => 'module'])}}
    @endpush
</x-master-layout>