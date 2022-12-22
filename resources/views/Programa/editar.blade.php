@extends("templates.app")

@section("body")


<div class="container" style="display: flex; justify-content: center; align-items: center; margin-top: 1em; margin-bottom:10px">

    @if (session('sucesso'))
        <div class="alert alert-success">
            {{session('sucesso')}}
        </div>
    @endif
    <br>
    <div style="background: #FFFFFF; box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.25); border-radius: 20px; padding: 34px; width: 65%";>
        <h1 style="font-weight: 600; font-size: 30px; line-height: 47px; display: flex; align-items: center; color: #131833;">
            Editar Programa</h1>
            <hr>

        <form action="{{url("/programas/$programa->id")}}" method="post">
            @csrf
            @method("PUT")
            <label for="nome" style="display:flex; font-weight: 600; font-size: 20px; line-height: 28px; color: #131833;">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{$programa->nome}}"
            style="background: #F5F5F5; border-radius: 13px; border: 1px #D3D3D3; width: 100%; padding: 5px;
            box-shadow: inset 0px 3px 6px rgba(0, 0, 0, 0.25);"><br><br>

            <label for="servidores" style="display:flex; font-weight: 600; font-size: 20px; line-height: 28px; color: #131833;">Servidores:</label>

            <select name="servidores[]" id="servidores" multiple style="width: 100%">
                <option value=""></option>
                @foreach ($servidores as $servidor)
                    <option value="{{$servidor->id}}" {{in_array($servidor->id, $idsServidoresDoPrograma) ? 'selected' : ''}} style="color: white;"> {{$servidor->user->name}} </option>
                @endforeach
            </select>

            <br><br>


            <input type="submit" value="Salvar" style="background: #34A853; box-shadow: 4px 5px 7px rgba(0, 0, 0, 0.25);
            display: inline-block; border-radius: 13px; color: #FFFFFF; border: #34A853; font-style: normal;
            font-weight: 400; font-size: 24px; line-height: 29px; text-align: center; padding: 5px 15px;">

        </form>
    </div>
</div>

    <script>

        $("#servidores").chosen({
        placeholder_text_multiple: "Selecione um servidor",
        // max_shown_results : 5,
        no_results_text: "Não possui alunos."
    });
    </script>

@endsection
