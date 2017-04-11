@extends('layouts.default')
@section('page-level-styles')
@endsection
@section('content')
    @include('includes.nav-setting')
    <main class="uk-container uk-container-expand sikd-cms">
        <div class="uk-card uk-card-hover uk-card-default uk-card-small uk-animation-fade l3card">
            <div class="uk-card-header uk-grid-small" uk-grid>
                <div class="uk-width-expand@m">
                    <h3 class="uk-card-title sikd-blue-text uk-float-left uk-margin-remove uk-text-uppercase">Edit Postur APBD</h3>
                </div>
                <div class="uk-width-auto@m">
                    <button class="uk-button uk-button-small uk-button-default" type="button" onclick="history.go(-1);" title="Kembali ke halaman sebelumnya" uk-tooltip="pos: left"><span uk-icon="icon: arrow-left"></span> BACK</button>
                </div>
            </div>
            <div class="uk-card-body">
                @if($errors->any())
                    <h4>{{ $errors->first() }}</h4>
                @endif
                <form id="edit_account_form" method="POST" action="{!! url('apbd-posture/' . $id . '/update') !!}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="uk-child-width-1-4 uk-margin" uk-grid>
                        <div class="">
                            <label class="uk-form-label" for="name">Name</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="name" name="name" type="text" value="{!! $posture->name !!}">
                            </div>
                        </div>

                        <div class="">
                            <label class="uk-form-label" for="group">Group</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="group" name="group" type="text" value="{!! $posture->group !!}">
                            </div>
                        </div>
                        {{-- <div class="">
                            <input type="checkbox" name="is_active" value="1" @if($posture->active == 'true') checked @endif /> <label class="uk-form-label" for="is_active">Active ?</label>
                        </div> --}}
                        <div class="">
                            <label class="uk-form-label" for="is_active">Active ?</label>
                            <div class="uk-form-controls">
                                <label><input class="uk-checkbox" type="checkbox" name="is_active" value="1" @if($posture->active == 'true') checked @endif /> Ya</label>
                            </div>
                        </div>
                        <div class="uk-width-1-1">
                            <label class="uk-form-label" for="id_map">ID Map</label>
                            <div class="uk-grid-small uk-child-width-1-3@m" uk-grid>
                                @foreach($maps as $map)
                                    @php
                                    $checked = in_array($map->id, $mapIds) ? 'checked' : '';
                                    @endphp
                                    <div class="uk-form-controls">
                                        <label><input class="uk-checkbox" type="checkbox" name="maps[]" value="{!! $map->id !!}" {!! $checked !!}> {!! $map->urakun !!}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- <div class="">
                            <label class="uk-form-label" for="icon_image">Icon Image</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="icon_image" name="icon_image" type="file">
                            </div>
                        </div> --}}
                        <div class="">
                            <label class="uk-form-label" for="icon">Icon Text</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="icon" name="icon" type="text" value="{!! $posture->icon !!}">
                            </div>
                        </div>
                        <div class="uk-width-expand">
                            <label class="uk-form-label" for="icon_image">Icon Image (Rekomendasi ukuran 24x24 px format .png)</label>
                            <div class="uk-form-controls">
                                @if(isset($posture->icon_path))
                                    <img src="{!! $posture->icon_path !!}" /><br>
                                @endif
                                <input class="" id="icon_image" name="icon_image" type="file">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="uk-flex uk-flex-between">
                        <a href="{!! url('apbd-posture') !!}" class="uk-button uk-button-default uk-modal-close">Cancel</a>
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
