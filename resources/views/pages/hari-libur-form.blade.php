<div>
    <!-- It is never too late to be what you might have been. - George Eliot -->
</div>
<x-modal title="Form Hari Libur" action="{{ $action }}">
    @if ($data->id)
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-forms.input label="Nama" name="nama" value="{{ $data->nama ?? '' }}" />
        </div>
        <div class="col-md-12">
            <x-forms.datepicker-range label="Tanggal libur" date_name1="tanggal_awal" date_name2="tanggal_akhir" date_value1="{{ convertDate($data->tanggal_awal, 'd-m-Y') }}" date_value2="{{ convertDate($data->tanggal_akhir, 'd-m-Y') }}" />
        </div>
        <div class="col-md-12">
            <x-forms.switch name="delete" label="delete"/>
        </div>
    </div>
</x-modal>