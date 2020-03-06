@if (\Session::has('mensagem'))
    <div class="container">
        <div class="row">
            <div class="card {{Session::get('mensagem')['class']}} ">
                <div class="card-content">
                    {{Session::get('mensagem')['msg']}}
                </div>
            </div>
        </div>
    </div>
@elseif ($errors->any())
    <div class="container">
        @foreach ($errors->all() as $error)
            <div class="row">
                <div class="card red white-text ">
                    <div class="card-content">
                        {{$error}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

