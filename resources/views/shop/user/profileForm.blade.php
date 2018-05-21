<div class="col-md-9">
    <div class="row">
        <div>
            @if($message)
                <h2 style="text-align: center;">
                    {{$message}}
                </h2>
            @endif
        </div>
        <div class="col-md-12">
            <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="first_name" class="col-md-2 control-label">Имя</label>
                    <div class="col-md-10">
                        <input id="first_name" type="text" class="form-control" name="first_name"
                               value="{{ isset($profile) ? $profile->first_name : old('first_name') }}">
                        @if(count($errors) && !empty($nameErrors = $errors->get('first_name')))
                            <div class="alert alert-danger">
                                @foreach($nameErrors as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="userEmail" class="col-md-2 control-label">Email</label>
                    <div class="col-md-10">
                        <input id="userEmail" type="text" class="form-control" name="userEmail"
                               value="{{ $userEmail }}" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="second_name" class="col-md-2 control-label">Фамилия</label>
                    <div class="col-md-10">
                        <input id="second_name" type="text" class="form-control" name="second_name"
                               value="{{ isset($profile) ? $profile->second_name : old('second_name') }}">
                        @if(count($errors) && !empty($nameErrors = $errors->get('second_name')))
                            <div class="alert alert-danger">
                                @foreach($nameErrors as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone_1" class="col-md-2 control-label">Телефон</label>
                    <div class="col-md-10">
                        <input id="phone_1" type="text" class="form-control" name="phone_1"
                               value="{{ isset($profile) ? $profile->phone_1 : old('phone_1') }}">
                        @if(count($errors) && !empty($nameErrors = $errors->get('phone_1')))
                            <div class="alert alert-danger">
                                @foreach($nameErrors as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="image" class="col-md-2 control-label control-label--foto">Фото</label>
                    <div class="col-md-10">
                        <input id="image" type="file" name="image_field" value="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            Сохранить
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

