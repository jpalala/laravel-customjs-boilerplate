@extends('layouts.sveltemaster')

@push('scripts')
<!-- Scripts -->
<script src="{{ asset('js/app.js')}}"></script>
@endpush


@section('content')
<div class="container">
   <div class="row">   

      <div class="col-8">
                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ url('/auth/github') }}" class="btn btn-warning">
                                    {{ __('Login with Github') }}
                                </a>
                            </div>
                        </div>
       </div>
  </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

