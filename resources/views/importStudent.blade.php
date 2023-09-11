<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>E-Library | Import</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<div class="container d-flex justify-center-content">

    <div class="card">
        <div class="card-body">
            <div class="card-title">Import Student</div>

            {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('import.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">@lang('Department')</label>
                    <div class="form-select">
                        <select class="form-control" name="department">
                            <option value="">Select </option>
                            @foreach (\App\Models\Department::all() as $b)
                                <option value="{{ $b->id }}" @selected($b->id === old('department'))>
                                    {{ $b->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('department')
                        <p class='text-sm text-danger'>{{ $message }}</p>
                    @enderror

                </div>
                
                <label class="form-label">@lang('File')</label>
                <input type="file" name="csv_file">


                @error('csv_file')
                    <p class='text-sm text-danger'>{{ $message }}</p>
                @enderror
                <button type="submit" class="btn btn-primary">@lang('Save')</button>

            </form>


        </div>
    </div>
</div>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</html>
