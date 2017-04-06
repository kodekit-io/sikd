@extends('layouts.default')
@section('page-level-styles')
@endsection
@section('content')
    @include('includes.nav-setting')
    <main class="uk-container uk-container-expand sikd-cms">
        <div class="uk-card uk-card-hover uk-card-default uk-card-small uk-animation-fade l3card">
            <div class="uk-card-header uk-grid-small" uk-grid>
                <div class="uk-width-expand@m">
                    <h3 class="uk-card-title sikd-blue-text uk-float-left uk-margin-remove uk-text-uppercase">Tambah Postur TKDD</h3>
                </div>
                <div class="uk-width-auto@m">
                    <button class="uk-button uk-button-small uk-button-default" type="button" onclick="history.go(-1);" title="Kembali ke halaman sebelumnya" uk-tooltip="pos: left"><span uk-icon="icon: arrow-left"></span> BACK</button>
                </div>
            </div>
            <div class="uk-card-body">
                @if($errors->any())
                    <h4>{{ $errors->first() }}</h4>
                @endif
                <form id="edit_account_form" method="POST" action="{!! url('tkdd-posture/create') !!}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="uk-margin">
                        <label class="uk-form-label" for="id_posture">ID Postur</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="id_posture" name="id_posture" type="text" placeholder="">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="code">Kode Postur</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="code" name="code" type="text" placeholder="">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="posture_desc">Uraian Postur</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="posture_desc" name="posture_desc" type="text">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="posture_short_desc">Uraian Postur Singkat</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="posture_short_desc" name="posture_short_desc" type="text">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="parent_id">ID Induk</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="parent_id" name="parent_id" type="text">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <input type="checkbox" name="have_account" value="1" /> <label class="uk-form-label" for="have_account">Ada Account ?</label>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="level">Level</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="level" name="level" type="text">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="group">Group</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="group" name="group" type="text">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="icon_image">Icon Image</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="icon_image" name="icon_image" type="file">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="icon">Icon</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="icon" name="icon" type="text">
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-between">
                        <a href="{!! url('tkdd-posture') !!}" class="uk-button uk-button-default uk-modal-close">Cancel</a>
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
