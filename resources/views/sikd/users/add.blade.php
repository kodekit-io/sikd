@extends('layouts.default')
@section('page-level-styles')
@endsection
@section('content')
@include('includes.nav-setting')
    <main class="uk-container uk-container-expand sikd-cms">
        <div class="uk-card uk-card-hover uk-card-default uk-card-small uk-animation-fade l3card">
            <div class="uk-card-header uk-grid-small" uk-grid>
                <div class="uk-width-expand@m">
                    <h3 class="uk-card-title sikd-blue-text uk-float-left uk-margin-remove uk-text-uppercase">Tambah Pengguna</h3>
                </div>
                <div class="uk-width-auto@m">
                    <button class="uk-button uk-button-small uk-button-default" type="button" onclick="history.go(-1);" title="Kembali ke halaman sebelumnya" uk-tooltip="pos: left"><span uk-icon="icon: arrow-left"></span> BACK</button>
                </div>
            </div>
            <div class="uk-card-body">
                @if($errors->any())
                    <h4>{{ $errors->first() }}</h4>
                @endif
                <form id="edit_account_form" method="POST" action="{!! url('user/create') !!}">
                    {!! csrf_field() !!}
                    <div class="uk-margin">
                        <label class="uk-form-label" for="name">Nama</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="name" name="name" type="text" placeholder="Nama">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="email">Email</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="email" name="email" type="text" placeholder="email@domain.name">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="password">Password</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="password" name="password" type="password">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="role">Role</label>
                        <div class="uk-form-controls" uk-grid>
                            {{-- <select name="role" class="uk-input">
                                <option value="admin">Admin</option>
                                <option value="user">Home</option>
                                <option value="user">Level 1</option>
                                <option value="user">level 2</option>
                                <option value="user">level 3</option>
                            </select> --}}
                            <label><input class="uk-checkbox" type="checkbox" value="admin"> Admin</label>
    						<label><input class="uk-checkbox" type="checkbox" value="home"> Home</label>
    						<label><input class="uk-checkbox" type="checkbox" value="level-1"> Level 1</label>
    						<label><input class="uk-checkbox" type="checkbox" value="level-2"> Level 2</label>
    						<label><input class="uk-checkbox" type="checkbox" value="level-3"> Level 3</label>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-between">
                        <a href="{!! url('user') !!}" class="uk-button uk-button-default uk-modal-close">Cancel</a>
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
    <script src="{!! asset('assets/js/pages/manage-account.js') !!}"></script>
@endsection
