@extends('home.home_landing')
@section('home')

<div class="page-content">
    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('home.deleteCharacterFromUser', ['character'=> $personagem]) }}" method="POST">
                                @csrf
                                @method('post')
                                
                                <div class="d-flex align-items-start col-md-10 mt-2">  
                                    <h1>
                                    </h1>
                                    <img src="{{ $personagem['image'] }}" class="align-self-start wd-100 wd-sm-150 me-3" alt="...">
                                    <div>
                                        <h5 class="mb-2 mt-4">
                                            {{ $personagem['name'] }}
                                            <input style="display: none;" value="{{ $personagem['name'] }}" type="text" name="name">
                                            <input style="display: none;" value="{{ $personagem['user_id'] }}" type="text" name="name">
                                        </h5>
                                        <br>
                                        <p>
                                            {{ "Espécie: ". $personagem['species'] }}
                                            <input style="display: none;" value="{{ $personagem['species'] }}" type="text" name="species">
                                        </p>
                                        <p>
                                            {{ "Url: ". $personagem['url'] }}
                                            <input style="display: none;" value="{{ $personagem['url'] }}" type="text" name="url">
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start col-md-2 mt-2">
                                    <button type="submit" value="Delete"  name="status" class="btn btn-danger me-3">Deletar</button>  
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>

@endsection