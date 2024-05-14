@extends('home.home_landing')
@section('home')

<div class="page-content">
    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('home.saveCharacterToUser', ['auction'=> $idPersonagem]) }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="d-flex align-items-start col-md-10">  
                                    <img src="{{ $idPersonagem['image'] }}" class="align-self-start wd-100 wd-sm-150 me-3" alt="...">
                                    <div>
                                        <h5 class="mb-2">
                                            {{ $idPersonagem['name'] }}
                                            <input style="display: none;" value="{{ $idPersonagem['id'] }}" type="text" name="id">
                                            <input style="display: none;" value="{{ $idPersonagem['name'] }}" type="text" name="name">
                                            <input style="display: none;" value="{{ $idPersonagem['image'] }}" type="text" name="image">
                                        </h5>
                                        <br>
                                        <p>
                                            {{ "Espécie: ". $idPersonagem['species'] }}
                                            <input style="display: none;" value="{{ $idPersonagem['species'] }}" type="text" name="species">
                                        </p>
                                        <p>
                                            {{ "Gênero: ". $idPersonagem['gender'] }}
                                            <input style="display: none;" value="{{ $idPersonagem['gender'] }}" type="text" name="gender">
                                        </p>
                                        <p>
                                            {{ "Local: ". $idPersonagem['location']['name'] }}
                                            <input style="display: none;" value="{{ $idPersonagem['location']['name'] }}" type="text" name="location">
                                        </p>
                                        <p>
                                            {{ "Url: ". $idPersonagem['url'] }}
                                            <input style="display: none;" value="{{ $idPersonagem['url'] }}" type="text" name="url">
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start col-md-2 mt-2">
                                    <div>
                                        <button  type="submit" value="Save"  name="status" class="btn btn-primary">Adicionar</button>
                                    </div>
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