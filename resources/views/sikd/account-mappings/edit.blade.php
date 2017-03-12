@extends('layouts.default')
@section('page-level-styles')
@endsection
@section('content')
    @include('includes.nav-setting')
    <main class="uk-container uk-container-expand sikd-cms">
        <div class="uk-card uk-card-hover uk-card-default uk-card-small uk-animation-fade l3card">
            <div class="uk-card-header uk-grid-small" uk-grid>
                <div class="uk-width-expand@m">
                    <h3 class="uk-card-title sikd-blue-text uk-float-left uk-margin-remove uk-text-uppercase">Edit Mapping Akun</h3>
                </div>
                <div class="uk-width-auto@m">
                    <button class="uk-button uk-button-small uk-button-default" type="button" onclick="history.go(-1);" title="Kembali ke halaman sebelumnya" uk-tooltip="pos: left"><span uk-icon="icon: arrow-left"></span> BACK</button>
                </div>
            </div>
            <div class="uk-card-body">
                {{-- @if($errors->any())
                    <h4>{{ $errors->first() }}</h4>
                @endif --}}
                <form id="edit_account_form" method="POST" action="{!! url('account-mapping/' . $id . '/update') !!}">
                    {!! csrf_field() !!}
                    <div class="uk-margin">
                        <label class="uk-form-label" for="primary_account">Kode akun utama</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="primary_account" name="primary_account" type="text" value="{!! $account->kodeakunutama !!}">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="group_account">Kode akun kelompok</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="group_account" name="group_account" type="text" value="{!! $account->kodeakunkelompok !!}" >
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="account_type">Kode jenis akun</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="account_type" name="account_type" type="text" value="{!! $account->kodeakunjenis !!}" >
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="name">Nama / Uraian akun</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="name" name="name" type="text" value="{!! $account->urakun !!}" >
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="label">Label</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="label" name="label" type="text" value="{!! $account->label !!}" >
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-between">
                        <a href="{!! url('account-mapping') !!}" class="uk-button uk-button-default uk-modal-close">Cancel</a>
                        <button class="uk-button uk-button-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

@section('page-level-scripts')
    <script type="text/javascript">
        var $baseUrl = "{!! url('/') !!}";
    </script>
    <script src="{!! asset('assets/js/lib/jquery.validate.min.js') !!}"></script>
@endsection
