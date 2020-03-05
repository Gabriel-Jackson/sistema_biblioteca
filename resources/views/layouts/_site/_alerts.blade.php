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
@endif
